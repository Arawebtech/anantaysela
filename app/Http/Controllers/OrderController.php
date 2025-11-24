<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('customer_id', Auth::guard('customer')->id())
            ->with('items.product')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('customer_id', Auth::guard('customer')->id())
            ->with('items.product')
            ->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    public function adminShow($id)
    {
        $order = Order::with('items.product', 'user')
            ->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'billing_address' => 'nullable|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'notes' => 'nullable|string',
        ]);

        $cartItems = Cart::where('customer_id', Auth::guard('customer')->id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        DB::beginTransaction();
        try {
            $total = $cartItems->sum(function ($item) {
                return $item->total;
            });

            $order = Order::create([
                'customer_id' => Auth::guard('customer')->id(),
                'total_amount' => $total,
                'shipping_address' => $request->shipping_address,
                'billing_address' => $request->billing_address ?? $request->shipping_address,
                'phone' => $request->phone,
                'email' => $request->email,
                'notes' => $request->notes,
                'status' => 'pending',
                'payment_status' => 'pending',
            ]);

            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'product_name' => $cartItem->product->name,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->price,
                    'total' => $cartItem->total,
                ]);
            }

            if ($customer = Auth::guard('customer')->user()) {
                $customer->update([
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'email'      => $request->email,
                    'phone_number' => $request->phone,
                    'address' => $request->shipping_address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip_code' => $request->zip_code,
                ]);
            }
            // Clear cart
            Cart::where('customer_id', Auth::guard('customer')->id())->delete();

            DB::commit();

            return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', 'Failed to place order. Please try again. (See logs)');
        }
    }


    public function checkout()
    {
        // Check if user is authenticated
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('login')->with('error', 'Please login to proceed to checkout.');
        }

        $cartItems = Cart::where('customer_id', Auth::guard('customer')->id())
            ->with('product')
            ->get();

        // Also check session cart for guest items (in case they just logged in)
        $sessionCart = session('cart', []);
        if (!empty($sessionCart) && $cartItems->isEmpty()) {
            // Merge session cart to database cart
            foreach ($sessionCart as $item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    $existingCart = Cart::where('customer_id', Auth::guard('customer')->id())
                        ->where('product_id', $item['product_id'])
                        ->first();

                    if ($existingCart) {
                        $existingCart->quantity += $item['quantity'];
                        $existingCart->save();
                    } else {
                        Cart::create([
                            'customer_id' => Auth::guard('customer')->id(),
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'price' => $item['price'],
                        ]);
                    }
                }
            }
            session()->forget('cart');
            $cartItems = Cart::where('customer_id', Auth::guard('customer')->id())->with('product')->get();
        }

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->total;
        });

        return view('orders.checkout', compact('cartItems', 'total'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,completed,cancelled',
            'payment_status' => 'nullable|in:pending,paid,failed,refunded',
        ]);

        $order = Order::findOrFail($id);

        $order->status = $request->status;
        if ($request->has('payment_status')) {
            $order->payment_status = $request->payment_status;
        }
        $order->save();

        return back()->with('success', 'Order status updated successfully!');
    }
}
