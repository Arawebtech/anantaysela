@extends('layouts.frontend')

@section('title', 'Wishlist - ANANTA YSELA')

@section('content')
<!-- Banner Section -->
<section class="relative text-center w-full">
  <img src="{{ asset('theme/imgs/bnnrImgs/ProductDetails.png') }}" alt="Banner" class="w-full h-auto">
  <div class="absolute inset-0 flex items-center justify-center">
    <h1 class="text-[#222] text-xl md:text-5xl font-bold drop-shadow-lg">Wishlist</h1>
  </div>
</section>

<section class="py-10">
  <div class="max-w-6xl mx-auto px-4 py-6" id="wishlistContainer">
    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    @if(session('error'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
      </div>
    @endif

    @if(isset($wishlistItems) && $wishlistItems->count() > 0)
      @foreach($wishlistItems as $item)
        <div class="wishlist-item flex flex-col md:flex-row bg-gray-100 px-4 items-center justify-between shadow-sm rounded-2xl mb-4 hover:shadow-md transition-all">
          <div class="flex items-center gap-4">
            <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-[#666666] bg-gray-50 text-2xl hover:text-red-700 px-2 rounded-full">×</button>
            </form>
            @if($item->product->image)
              @if(str_starts_with($item->product->image, 'http'))
                <img src="{{ $item->product->image }}" alt="Product Image" class="w-20 border-2 border-white pt-2 h-[106px] object-cover">
              @else
                <img src="{{ \Illuminate\Support\Facades\Storage::url($item->product->image) }}" alt="Product Image" class="w-20 border-2 border-white pt-2 h-[106px] object-cover">
              @endif
            @else
              <img src="{{ asset('theme/imgs/home/4.png') }}" alt="Product Image" class="w-20 border-2 border-white pt-2 h-[106px] object-cover">
            @endif
            <div>
              <h3 class="text-lg font-semibold text-gray-800">{{ $item->product->name }}</h3>
              <p class="text-[#CD2C58] font-semibold">${{ number_format($item->product->current_price, 2) }}</p>
              <span class="text-sm text-gray-500">{{ $item->created_at->format('F j, Y') }}</span>
            </div>
          </div>
          <a href="{{ route('shop.show', $item->product->id) }}" class="mt-3 md:mt-0 bg-[#CD2C58] text-white px-5 py-2 hover:bg-[#b7254b] transition">View Product</a>
        </div>
      @endforeach
    @else
      <div class="flex flex-col items-center justify-center py-16 text-center space-y-5">
        <div class="p-6 rounded-full bg-gradient-to-r from-[#ffe6e9] to-[#fff0f2]">
          <i class="ri-heart-3-line text-6xl text-[#CD2C58]"></i>
        </div>
        <p class="text-gray-700 text-xl font-semibold">Your wishlist is empty</p>
        <p class="text-gray-500 text-sm max-w-sm">Looks like you haven't added anything yet. Explore our collections and find something you'll love!</p>
        <a href="{{ route('shop.index') }}" class="bg-gradient-to-r from-[#CD2C58] to-[#b7254b] text-white px-6 py-2.5 hover:scale-105 transition-transform shadow-md">
          Explore Products
        </a>
      </div>
    @endif
  </div>
</section>
@endsection
