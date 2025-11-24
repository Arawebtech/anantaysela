<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
       if (Auth::guard('customer')->check()) {
            $cartItems = Cart::where('customer_id', Auth::guard('customer')->id())->with('product')->get();

            $total = $cartItems->sum(function ($item) {
                return $item->total;
            });
        } else {
            // Guest cart from session
            $cartItems = collect(session('cart', []))->map(function ($item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    return (object) [
                        'id' => $item['product_id'],
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'product' => $product,
                        'total' => $item['price'] * $item['quantity'],
                    ];
                }
                return null;
            })->filter();

            $total = $cartItems->sum('total');
        }

        return view('cart.index', compact('cartItems', 'total'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $product = Product::findOrFail($request->product_id);

    //     if (Auth::check()) {
    //         // Authenticated user - save to database
    //         $cartItem = Cart::where('user_id', Auth::id())
    //             ->where('product_id', $request->product_id)
    //             ->first();

    //         if ($cartItem) {
    //             $cartItem->quantity += $request->quantity;
    //             $cartItem->save();
    //         } else {
    //             Cart::create([
    //                 'user_id' => Auth::id(),
    //                 'product_id' => $request->product_id,
    //                 'quantity' => $request->quantity,
    //                 'price' => $product->current_price,
    //             ]);
    //         }
    //     } else {
    //         // Guest user - save to session
    //         $cart = session('cart', []);
    //         $itemId = uniqid('cart_');

    //         // Check if product already in cart
    //         $existingIndex = null;
    //         foreach ($cart as $index => $item) {
    //             if ($item['product_id'] == $request->product_id) {
    //                 $existingIndex = $index;
    //                 break;
    //             }
    //         }

    //         if ($existingIndex !== null) {
    //             $cart[$existingIndex]['quantity'] += $request->quantity;
    //         } else {
    //             $cart[] = [
    //                 'id' => $itemId,
    //                 'product_id' => $request->product_id,
    //                 'quantity' => $request->quantity,
    //                 'price' => $product->current_price,
    //             ];
    //         }

    //         session(['cart' => $cart]);
    //     }

    //     return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        // dd($product);
        if (Auth::guard('customer')->check()) {
            // Logged in user — Save DB
            $cartItem = Cart::where('customer_id', Auth::guard('customer')->id())->where('product_id', $request->product_id)->first();
          

            if ($cartItem) {
                $cartItem->quantity += $request->quantity;
                $cartItem->save();
            } else {
                Cart::create([
                    'customer_id' => Auth::guard('customer')->id(),
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'price' => $product->current_price,
                ]);
            }

            $cartItems = Cart::with('product')->where('customer_id', Auth::guard('customer')->id())->get();
        
            $cartCount = Cart::where('customer_id', Auth::guard('customer')->id())->sum('quantity');
            $cartTotal = Cart::where('customer_id', Auth::guard('customer')->id())->sum(DB::raw('quantity * price'));
        }
        else {
            // Guest — Session cart
            $cart = session('cart', []);
            $existing = null;

            foreach ($cart as $i => $item) {
                if ($item['product_id'] == $request->product_id) {
                    $existing = $i;
                    break;
                }
            }

            if ($existing !== null) {
                $cart[$existing]['quantity'] += $request->quantity;
            } else {
                $cart[] = [
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'price' => $product->current_price
                ];
            }

            session(['cart' => $cart]);

            $cartItems = collect($cart)->map(function ($item) {
                $product = Product::find($item['product_id']);
                return (object)[
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ];
            });

            $cartCount = collect($cart)->sum('quantity');
            $cartTotal = collect($cart)->sum(fn($i) => $i['quantity'] * $i['price']);
        }

        $cartHtml = view('cart.cart-items', compact('cartItems'))->render();

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart!',
            'cart_count' => $cartCount,
            'cart_total' => '₹' . number_format($cartTotal, 2),
            'cart_html' => $cartHtml
        ]);
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        if (Auth::guard('customer')->check()) {
            $cartItem = Cart::where('customer_id', Auth::guard('customer')->id())
                ->where('id', $id)
                ->firstOrFail();

            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        } else {
            // Guest user - update session
            $cart = session('cart', []);
            foreach ($cart as $index => $item) {
                if ($item['id'] == $id) {
                    $cart[$index]['quantity'] = $request->quantity;
                    break;
                }
            }
            session(['cart' => $cart]);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function destroy($id)
    {
        if (Auth::guard('customer')->check()) {
            $cartItem = Cart::where('customer_id', Auth::guard('customer')->id())
                ->where('id', $id)
                ->firstOrFail();

            $cartItem->delete();
        } else {
            // Guest user - remove from session
            $cart = session('cart', []);
            $cart = array_filter($cart, function ($item) use ($id) {
                return $item['id'] != $id;
            });
            session(['cart' => array_values($cart)]);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    public function getCartCount()
    {
        if (Auth::guard('customer')->check()) {
            $count = Cart::where('customer_id', Auth::guard('customer')->id())->sum('quantity');
        } else {
            $cart = session('cart', []);
            $count = array_sum(array_column($cart, 'quantity'));
        }
        return response()->json(['count' => $count]);
    }

    public function getCartTotal()
    {
        if (Auth::guard('customer')->check()) {
            $cartItems = Cart::where('customer_id', Auth::guard('customer')->id())->with('product')->get();
            $total = $cartItems->sum(function ($item) {
                return $item->total;
            });
        } else {
            $cart = session('cart', []);
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return response()->json(['total' => number_format($total, 2)]);
    }
}
