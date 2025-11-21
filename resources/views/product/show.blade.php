@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">Product Details</h2>
    
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Product Image -->
            <div>
                @if($product->image)
                    @if(str_starts_with($product->image, 'http'))
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full rounded-lg shadow-lg">
                    @else
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full rounded-lg shadow-lg">
                    @endif
                @else
                    <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif
            </div>

            <!-- Product Information -->
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $product->name }}</h3>
                
                <div class="space-y-4 mb-6">
                    <div>
                        <p class="text-sm text-gray-500">Description</p>
                        <p class="text-gray-900">{{ $product->description }}</p>
                    </div>

                    @if($product->details)
                    <div>
                        <p class="text-sm text-gray-500">Details</p>
                        <p class="text-gray-900">{{ $product->details }}</p>
                    </div>
                    @endif

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Price</p>
                            <p class="text-lg font-bold text-pink-600">₹{{ number_format($product->current_price, 2) }}</p>
                            @if($product->original_price && $product->original_price > $product->price)
                                <p class="text-sm text-gray-400 line-through">₹{{ number_format($product->original_price, 2) }}</p>
                            @endif
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Category</p>
                            <p class="text-gray-900">{{ $product->category ?? 'Uncategorized' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Stock</p>
                            <p class="text-gray-900">{{ $product->stock }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Rating</p>
                            <div class="flex items-center">
                                <span class="text-gray-900">{{ number_format($product->rating, 1) }}</span>
                                <div class="ml-2 flex">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4 {{ $i < floor($product->rating) ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="ml-2 text-sm text-gray-500">({{ $product->rating_count }})</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        @if($product->featured)
                            <span class="px-3 py-1 rounded-full text-sm font-semibold bg-pink-100 text-pink-800">
                                Featured
                            </span>
                        @endif
                    </div>
                </div>

                <div class="flex space-x-4">
                    @can('edit-products')
                    <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition">Edit</a>
                    @endcan
                    <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
