@extends('layouts.frontend')

@section('title', 'Categories - ANANTA YSELA')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-serif font-bold text-gray-900 mb-8 text-center">Shop by Category</h1>

    @forelse($categories as $category)
    <div class="mb-12">
        <h2 class="text-2xl font-serif font-bold text-gray-900 mb-6">{{ $category }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($categoryProducts[$category] ?? [] as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                <a href="{{ route('shop.show', $product->id) }}">
                    <div class="relative">
                        @if($product->image)
                            @if(str_starts_with($product->image, 'http'))
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                            @else
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                            @endif
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No Image</span>
                            </div>
                        @endif
                    </div>
                </a>
                <div class="p-4">
                    <a href="{{ route('shop.show', $product->id) }}">
                        <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2 hover:text-pink-600">{{ $product->name }}</h3>
                    </a>
                    <p class="text-pink-600 font-bold mb-4">₹{{ number_format($product->current_price, 2) }}</p>
                    <form action="{{ route('cart.store') }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 transition w-full flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-6">
            <a href="{{ route('shop.index', ['category' => $category]) }}" class="text-pink-600 hover:text-pink-800 font-semibold">
                View All {{ $category }} →
            </a>
        </div>
    </div>
    @empty
    <div class="text-center py-12">
        <p class="text-gray-500">No categories available yet.</p>
    </div>
    @endforelse
</div>
@endsection

