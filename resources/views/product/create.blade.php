@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">Add Product</h2>
    
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name -->
            <div class="md:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea name="description" id="description" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Details -->
            <div class="md:col-span-2">
                <label for="details" class="block text-sm font-medium text-gray-700 mb-2">Additional Details</label>
                <textarea name="details" id="details" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">{{ old('details') }}</textarea>
                @error('details')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price *</label>
                <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Original Price -->
            <div>
                <label for="original_price" class="block text-sm font-medium text-gray-700 mb-2">Original Price (for discount)</label>
                <input type="number" name="original_price" id="original_price" step="0.01" min="0" value="{{ old('original_price') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                @error('original_price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Discount Percentage -->
            <div>
                <label for="discount_percentage" class="block text-sm font-medium text-gray-700 mb-2">Discount Percentage</label>
                <input type="number" name="discount_percentage" id="discount_percentage" min="0" max="100" value="{{ old('discount_percentage', 0) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                @error('discount_percentage')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <input type="text" name="category" id="category" value="{{ old('category') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Stock -->
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stock *</label>
                <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', 0) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                @error('stock')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Rating -->
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating (0-5)</label>
                <input type="number" name="rating" id="rating" step="0.1" min="0" max="5" value="{{ old('rating', 0) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                @error('rating')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Rating Count -->
            <div>
                <label for="rating_count" class="block text-sm font-medium text-gray-700 mb-2">Rating Count</label>
                <input type="number" name="rating_count" id="rating_count" min="0" value="{{ old('rating_count', 0) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                @error('rating_count')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image -->
            <div class="md:col-span-2">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Featured -->
            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                    <span class="ml-2 text-sm text-gray-700">Featured Product</span>
                </label>
            </div>

            <!-- Active -->
            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="rounded border-gray-300 text-pink-600 focus:ring-pink-500">
                    <span class="ml-2 text-sm text-gray-700">Active</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex space-x-4">
            <button type="submit" class="bg-pink-500 text-white px-6 py-2 rounded-lg hover:bg-pink-600 transition">Create Product</button>
            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
