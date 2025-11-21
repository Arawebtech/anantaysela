<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('featured', true)
            ->where('is_active', true)
            ->take(8)
            ->get();

        // If no featured products, get latest products as featured
        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->take(8)
                ->get();
        }

        $latestProducts = Product::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        return view('home', compact('featuredProducts', 'latestProducts'));
    }

    public function shop(Request $request)
    {
        $query = Product::where('is_active', true);

        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(12);
        $categories = Product::where('is_active', true)
            ->distinct()
            ->pluck('category')
            ->filter();

        return view('shop.index', compact('products', 'categories'));
    }

    public function showProduct($id)
    {
        $product = Product::where('is_active', true)->findOrFail($id);
        $relatedProducts = Product::where('is_active', true)
            ->where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('shop.show', compact('product', 'relatedProducts'));
    }

    public function about()
    {
        return view('about');
    }

    public function categories()
    {
        $categories = Product::where('is_active', true)
            ->distinct()
            ->pluck('category')
            ->filter();

        $categoryProducts = [];
        foreach ($categories as $category) {
            $categoryProducts[$category] = Product::where('is_active', true)
                ->where('category', $category)
                ->take(4)
                ->get();
        }

        return view('categories', compact('categories', 'categoryProducts'));
    }

    public function blog()
    {
        return view('blog');
    }

    public function contact()
    {
        return view('contact');
    }

    public function faqs()
    {
        return view('faqs');
    }


    public function logout(Request $request)
    {
         Auth::logout();
        // Session delete
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'User logout successfully!');
       
    }
}
