<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:view-products|create-products|edit-products|delete-products', ['only' => ['index','show']]);
        $this->middleware('permission:create-products', ['only' => ['create','store']]);
        $this->middleware('permission:edit-products', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-products', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
             'size' => 'required|array',
            'rating_count' => 'nullable|integer|min:0',
            'featured' => 'boolean',
            'is_active' => 'boolean',
            'stock' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $thumbnailPaths = [];
        if ($request->hasFile('thumbnail_image')) {
            foreach ($request->file('thumbnail_image') as $thumb) {
                $thumbnailPaths[] = $thumb->store('products/thumbnails', 'public');
            }
        }

        $validated['thumbnail_image'] = count($thumbnailPaths) > 0 ? implode(',', $thumbnailPaths) : null;
        $validated['size'] = json_encode($request->size);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  */

    public function deleteThumbnail(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $thumbnails = $product->thumbnail_image ? explode(',', $product->thumbnail_image) : [];

        // Remove selected thumbnail
        $updatedThumbs = array_filter($thumbnails, function ($img) use ($request) {
            return trim($img) != trim($request->image);
        });

        // Delete image file
        Storage::disk('public')->delete($request->image);

        $product->thumbnail_image = count($updatedThumbs) ? implode(',', $updatedThumbs) : null;
        $product->save();

        return response()->json(['success' => true]);
    }


    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'size' => 'required|array',
            'rating_count' => 'nullable|integer|min:0',
            'featured' => 'boolean',
            'is_active' => 'boolean',
            'stock' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        } else {
            unset($validated['image']);
        }

        if ($request->has('size')) {
            $validated['size'] = json_encode($request->size);
        } else {
            $validated['size'] = $product->size;
        }

        $validated['size'] = json_encode($request->size);

        $thumbnailPaths = [];

        // Old thumbnails preserved
        if ($product->thumbnail_image) {
            $thumbnailPaths = explode(',', $product->thumbnail_image);
        }

        // Add new thumbnails (if selected)
        if ($request->hasFile('thumbnail_image')) {
            foreach ($request->file('thumbnail_image') as $thumb) {
                $thumbnailPaths[] = $thumb->store('products/thumbnails', 'public');
            }
        }
        $validated['thumbnail_image'] = count($thumbnailPaths) > 0 ? implode(',', $thumbnailPaths) : null;

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Delete image if exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
