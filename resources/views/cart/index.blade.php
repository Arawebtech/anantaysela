@extends('layouts.frontend')

@section('title', 'Shopping Cart - ANANTA YSELA')

@section('content')
<!-- Banner Section -->
<section class="relative text-center w-full">
  <img src="{{ asset('theme/imgs/bnnrImgs/Group187.png') }}" alt="Banner" class="w-full h-auto">
  <div class="absolute inset-0 flex items-center justify-center">
    <h1 class="text-[#222] text-xl md:text-5xl font-bold drop-shadow-lg">Cart</h1>
  </div>
</section>

<section class="max-w-6xl mx-auto px-6 py-10 bg-white">
  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  @if($cartItems->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Cart Table -->
      <div class="md:col-span-2 overflow-x-auto">
        <div class="min-w-[700px]">
          <table class="w-full text-sm text-left border-collapse">
            <thead class="bg-[#fcf5ee] text-[#222] text-[15px] tracking-wider jost-medium">
              <tr>
                <th class="p-3 text-center">Product</th>
                <th class="p-3 text-center">Price</th>
                <th class="p-3 text-center">Quantity</th>
                <th class="p-3 text-center">Subtotal</th>
                <th class="p-3 text-center">Action</th>
              </tr>
            </thead>
            <tbody class="border-t">
              @foreach($cartItems as $item)
                @php
                  $product = is_object($item->product) ? $item->product : (isset($item->product) ? $item->product : null);
                  $productImage = $product && isset($product->image) ? $product->image : (is_array($product) && isset($product['image']) ? $product['image'] : null);
                  $productName = $product && isset($product->name) ? $product->name : (is_array($product) && isset($product['name']) ? $product['name'] : 'Product');
                @endphp
                <tr class="border-b text-[16px] poppins">
                  <td class="p-4 flex items-center gap-4">
                    @if($productImage)
                      @if(str_starts_with($productImage, 'http'))
                        <img src="{{ $productImage }}" class="size-[115px] rounded object-cover border" alt="{{ $productName }}">
                      @else
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($productImage) }}" class="size-[115px] rounded object-cover border" alt="{{ $productName }}">
                      @endif
                    @else
                      <div class="size-[115px] rounded bg-gray-200 border flex items-center justify-center">
                        <span class="text-gray-400 text-xs">No Image</span>
                      </div>
                    @endif
                    <p class="text-[#555] jost">{{ $productName }}</p>
                  </td>
                  <td class="p-4 text-center text-[#555]">${{ number_format($item->price, 2) }}</td>
                  <td class="p-4 text-center">
                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="inline-flex items-center">
                      @csrf
                      @method('PUT')
                      <input type="number" name="quantity" min="1" value="{{ $item->quantity }}" class="w-12 border rounded text-center">
                      <button type="submit" class="ml-2 text-[#CD2C58] hover:text-[#b7254b]">
                        <i class="ri-check-line"></i>
                      </button>
                    </form>
                  </td>
                  <td class="p-4 text-center text-[#000000] font-medium">${{ number_format($item->total, 2) }}</td>
                  <td class="p-4 text-center text-[21px] text-[#CD2C58] cursor-pointer">
                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="hover:text-[#b7254b]">
                        <i class="ri-delete-bin-fill"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- Cart Totals -->
      <div class="bg-[#fcf5ee] p-6 rounded-lg shadow-sm h-fit">
        <h3 class="text-xl font-semibold mb-4 poppins text-[32px] leading-[100%] tracking-wider text-[#222]">Cart Totals</h3>
        <div class="flex font-medium justify-between py-2 border-b text-[#333]">
          <p>Subtotal</p>
          <p>${{ number_format($total, 2) }}</p>
        </div>
        <div class="flex justify-between py-2 text-[#CD2C58] font-semibold">
          <p>Total</p>
          <p>${{ number_format($total, 2) }}</p>
        </div>
        @auth
          <a href="{{ route('checkout') }}" class="mt-5 w-full border border-[#222] py-2 rounded hover:bg-[#222] hover:text-white transition block text-center">
            Check Out
          </a>
        @else
          <a href="{{ route('login') }}" class="mt-5 w-full border border-[#222] py-2 rounded hover:bg-[#222] hover:text-white transition block text-center">
            Login to Checkout
          </a>
        @endauth
        <a href="{{ route('shop.index') }}" class="mt-3 w-full text-center text-[#666] hover:text-[#222] transition block">
          Continue Shopping
        </a>
      </div>
    </div>
  @else
    <div class="text-center py-12">
      <i class="ri-shopping-cart-line text-6xl text-gray-400 mb-4"></i>
      <h2 class="text-2xl font-bold text-gray-900 mb-2">Your cart is empty</h2>
      <p class="text-gray-600 mb-6">Start shopping to add items to your cart.</p>
      <a href="{{ route('shop.index') }}" class="inline-block bg-[#CD2C58] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#b7254b] transition">
        Continue Shopping
      </a>
    </div>
  @endif
</section>

<!-- Benefits Section -->
<section class="py-10">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6 text-center text-gray-800">
    <div class="flex flex-col items-center">
      <div class="text-3xl mb-2"><img src="{{ asset('theme/imgs/icons/exchnge.png') }}" class="size-[45px]" alt="img"></div>
      <h4 class="font-semibold mb-1">Exchange Policy</h4>
      <p class="text-sm text-gray-600">Exchange available</p>
    </div>

    <div class="flex flex-col items-center">
      <div class="text-3xl mb-2"><img src="{{ asset('theme/imgs/icons/quality.png') }}" class="size-[45px]" alt="img"></div>
      <h4 class="font-semibold mb-1">Quality Assurance</h4>
      <p class="text-sm text-gray-600">Every product is quality checked</p>
    </div>

    <div class="flex flex-col items-center">
      <div class="text-3xl mb-2"><img src="{{ asset('theme/imgs/icons/SVG (1).png') }}" alt="img"></div>
      <h4 class="font-semibold mb-1">Member Discount</h4>
      <p class="text-sm text-gray-600">On every order over $130.00</p>
    </div>

    <div class="flex flex-col items-center">
      <div class="text-3xl mb-2"><img src="{{ asset('theme/imgs/icons/Container.png') }}" alt="img"></div>
      <h4 class="font-semibold mb-1">Special Gifts</h4>
      <p class="text-sm text-gray-600">Contact us Anytime</p>
    </div>
  </div>
</section>
@endsection
