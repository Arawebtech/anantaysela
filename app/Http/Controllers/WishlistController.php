<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Wishlist::where('customer_id', Auth::guard('customer')->id())
            ->with('product')
            ->get();

        return view('wishlist', compact('wishlistItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $existing = Wishlist::where('customer_id', Auth::guard('customer')->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($existing) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['error' => 'Product already in wishlist!'], 400);
            }
            return back()->with('error', 'Product already in wishlist!');
        }

        Wishlist::create([
            'cusotmer_id' => Auth::guard('customer')->id(),
            'product_id' => $request->product_id,
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Product added to wishlist!']);
        }

        return back()->with('success', 'Product added to wishlist!');
    }

    public function destroy($id)
    {
        $wishlistItem = Wishlist::where('customer_id', Auth::guard('customer')->id())
            ->where('id', $id)
            ->firstOrFail();

        $wishlistItem->delete();

        return back()->with('success', 'Item removed from wishlist!');
    }

    public function getCount()
    {
        $count = Wishlist::where('customer_id', Auth::guard('customer')->id())->count();
        return response()->json(['count' => $count]);
    }
}
