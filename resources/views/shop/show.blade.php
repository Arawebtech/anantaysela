@extends('layouts.frontend')

@section('title', $product->name . ' - ANANTA YSELA')

@section('content')
<style>
  .custom-scroll::-webkit-scrollbar {
    width: 6px;
  }
  .custom-scroll::-webkit-scrollbar-thumb {
    background: #CD2C58;
    border-radius: 10px;
  }
  .custom-scroll::-webkit-scrollbar-track {
    background: #ffe1e7;
  }
</style>

<!-- Banner Section -->
<section class="relative text-center w-full">
  <img src="{{ asset('theme/imgs/bnnrImgs/ProductDetails.png') }}" alt="Banner" class="w-full h-auto">
  <div class="absolute inset-0 flex items-center justify-center">
    <h1 class="text-[#222] text-xl md:text-5xl font-bold drop-shadow-lg">Product Details</h1>
  </div>
</section>

<section class="max-w-7xl mx-auto py-10 px-4 sm:px-6 flex flex-col lg:flex-row gap-6 md:gap-10">
  <!-- Left Image Section -->
  <div class="w-full lg:w-1/2 flex flex-col-reverse md:flex-row gap-4 md:gap-6">
    <!-- Thumbnails -->
    <div class="flex justify-start md:flex-col gap-3 md:gap-4 mt-4 md:mt-0">
      @if($product->image)
        @if(str_starts_with($product->image, 'http'))
          <img src="{{ $product->image }}" alt="Product Thumbnail" onclick="changeMainImage(this.src)" class="size-[100px] md:size-[140px] bg-gray-100 object-cover border rounded cursor-pointer hover:border-[#CD2C58]">
        @else
          <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="Product Thumbnail" onclick="changeMainImage(this.src)" class="size-[100px] md:size-[140px] bg-gray-100 object-cover border rounded cursor-pointer hover:border-[#CD2C58]">
        @endif
      @endif
      @php
          $thumbnails = explode(',', $product->thumbnail_image);
      @endphp

      @foreach($thumbnails as $thumb)
          @php $thumb = trim($thumb); @endphp
          @if($thumb)
              <img src="{{ Storage::url($thumb) }}" alt="Product Thumbnail"
                  onclick="changeMainImage(this.src)"
                  class="size-[100px] md:size-[140px] bg-gray-100 object-cover border rounded cursor-pointer hover:border-[#CD2C58]">
          @endif
      @endforeach

    </div>
    <!-- Main Image -->
    <div class="flex-1">
      @if($product->image)
        @if(str_starts_with($product->image, 'http'))
          <img id="mainImage" src="{{ $product->image }}" alt="Main Product" class="w-full bg-gray-100 rounded-lg shadow-md transition-all duration-300">
        @else
          <img id="mainImage" src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="Main Product" class="w-full bg-gray-100 rounded-lg shadow-md transition-all duration-300">
        @endif
      @else
        <img id="mainImage" src="{{ asset('theme/imgs/home/3.png') }}" alt="Main Product" class="w-full bg-gray-100 rounded-lg shadow-md transition-all duration-300">
      @endif
    </div>
  </div>

  <!-- Right Detail Section -->
  <div class="w-full lg:w-1/2 space-y-4 mt-8 md:mt-0">
    @if($product->original_price && $product->original_price > $product->current_price)
      <span class="bg-[#E01A2B] text-white px-2 py-1 text-xs">
        -{{ round((($product->original_price - $product->current_price) / $product->original_price) * 100) }}%
      </span>
    @endif
    <h2 class="text-[22px] md:text-[28px] text-[#222222] leading-[32px] md:leading-[38px] jost tracking-wider">
      {{ $product->name }}
    </h2>

    <div class="flex items-center flex-wrap gap-2 md:gap-3">
      @if($product->original_price && $product->original_price > $product->current_price)
        <p class="text-[#666666] text-[20px] md:text-[22px] line-through jost-medium">₹{{ number_format($product->original_price, 2) }}</p>
      @endif
      <p class="text-[#E01A2B] text-[20px] md:text-[22px] jost font-semibold">₹{{ number_format($product->current_price, 2) }}</p>
      <div class="flex items-center gap-1">
        @for($i = 0; $i < 5; $i++)
          <i class="ri-star{{ $i < floor($product->rating ?? 4) ? '-fill' : '-line' }} text-yellow-500 text-[15px] md:text-[16px]"></i>
        @endfor
        <span class="text-[#E01A2B] text-[15px] md:text-[16px] ml-1">({{ $product->rating_count ?? 1 }} review)</span>
      </div>
    </div>

    <p class="text-[#DA3F3F] tracking-wider text-sm md:text-[16px] jost">
      <i class="ri-fire-fill text-[18px]"></i> {{ $product->stock ?? 16 }} products sold in last 11 hours
    </p>

    <p class="text-[#666666] text-sm md:text-[16px] leading-relaxed jost tracking-wider">
      {{ $product->description ?? 'Comfort & Style : Best Fashionably Comfortable that you have wore till now. Fabric is so soft over the skin. You can use this sweatshirt for jogging. Fabric is 100% Pure Cotton.' }}
    </p>

    <!-- Color -->
    <div>
      <h4 class="font-medium text-[#222222] jost-medium mb-1">Color</h4>
      <div class="flex gap-3" id="colorButtons">
        <button class="w-6 h-6 bg-pink-400 border rounded cursor-pointer" onclick="selectColor(this)"></button>
        <button class="w-6 h-6 bg-purple-900 border rounded cursor-pointer" onclick="selectColor(this)"></button>
      </div>
    </div>

    <!-- Size -->
        @php
          // DB se aane wale sizes (example: ["M","L","XL"])
          $selectedSizes = $product->size ? (is_array($product->size) ? $product->size : json_decode($product->size, true)) : [];
          // Mapping: short → long text
          $map = [
              'S' => 'Small',
              'M' => 'Medium',
              'L' => 'Large',
              'XL' => 'Extra Large',
              'XXL' => 'XXL',
              'XXXL' => '3XL',
          ];
      @endphp

      <div class="flex flex-wrap gap-2 md:gap-3" id="sizeButtons">
        @foreach($selectedSizes as $size)
            @php
                $label = $map[$size] ?? $size; // full name else same
            @endphp
            <button class="px-3 md:px-4 py-1 border text-[#222222] jost text-[14px] md:text-[16px] border-gray-300 rounded cursor-pointer hover:border-[#CD2C58]"
                onclick="selectSize(this)"
                data-value="{{ $size }}">
                {{ $label }}
            </button>
        @endforeach
      </div>



    <!-- Quantity & Add to Cart -->
    <div class="flex flex-col gap-4">
      <div class="flex gap-3 md:gap-4 items-center">
        <div class="flex items-center border border-gray-300 rounded overflow-hidden">
          <button id="decrease" class="px-3 py-2" type="button">-</button>
          <input id="quantity" type="text" value="1" class="w-10 md:w-12 text-center border-x border-gray-300" readonly>
          <button id="increase" class="px-3 py-2" type="button">+</button>
        </div>
        <form id="addToCartForm" action="{{ route('cart.store') }}" method="POST" class="flex-1 hidden md:block">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <input type="hidden" name="quantity" id="quantityInput" value="1">
          <button type="submit" id="addToCartBtn" class="w-full tracking-wider jost-medium bg-[#CD2C58] text-white py-3 hover:bg-[#b7254b] transition-colors">
            ADD TO CART
          </button>
        </form>

      </div>

      <form action="{{ route('cart.store') }}" method="POST" class="md:hidden">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="quantity" id="quantityInputMobile" value="1">
        <button type="submit" class="w-full jost-medium text-[16px] bg-[#CD2C58] text-white py-2 hover:bg-[#b7254b] transition-colors">
          ADD TO CART
        </button>
      </form>
      
      <a href="{{ route('checkout') }}" class="w-full border text-center border-[#222222] text-[16px] jost-medium text-[#222222] py-3 hover:bg-[#222222] hover:text-white transition-colors">
        BUY NOW
      </a>
    </div>

    <!-- Options -->
    <div class="flex flex-wrap gap-3 md:gap-4 items-center text-sm text-[#222222]">
      <div class="flex items-center gap-2 cursor-pointer hover:text-[#CD2C58]">
        <i class="ri-exchange-line text-[18px]"></i>
        <span class="jost-medium tracking-wider">Compare</span>
      </div>
      @auth
        <form action="{{ route('wishlist.store') }}" method="POST" class="inline">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <button type="submit" class="flex items-center gap-2 cursor-pointer hover:text-[#CD2C58]">
            <i class="ri-heart-line text-[18px]"></i>
            <span class="jost-medium tracking-wider">Wishlist</span>
          </button>
        </form>
      @else
        <a href="{{ route('login') }}" class="flex items-center gap-2 cursor-pointer hover:text-[#CD2C58]">
          <i class="ri-heart-line text-[18px]"></i>
          <span class="jost-medium tracking-wider">Wishlist</span>
        </a>
      @endauth
      <div class="flex items-center gap-2 cursor-pointer hover:text-[#CD2C58]">
        <i class="ri-mail-line text-[18px]"></i>
        <span class="jost-medium tracking-wider">Ask Us</span>
      </div>
      <div class="flex items-center gap-2 cursor-pointer hover:text-[#CD2C58]">
        <i class="ri-share-line text-[18px]"></i>
        <span class="jost-medium tracking-wider">Share</span>
      </div>
    </div>

    <!-- Details -->
    <div class="space-y-2 text-sm text-[#666666] border-t pt-4">
      <p class="flex items-center gap-2 text-gray-700 jost">
        <i class="ri-eye-line text-[18px]"></i>
        <span class="font-semibold">24</span> People are viewing this right now
      </p>
      <p class="flex items-center gap-2 text-gray-700">
        <i class="ri-truck-line text-[18px]"></i>
        <span class="jost">Estimated Delivery: Up to 4 business days</span>
      </p>
      <p class="flex items-center gap-2 text-gray-700">
        <i class="ri-coupon-line text-[18px]"></i>
        <span class="jost">Free Shipping & Returns: On all orders over $200</span>
      </p>
    </div>

    <!-- Payment -->
    <div class="border-t pt-4 text-sm text-center bg-gray-100 px-2 py-5">
      <p class="font-medium jost text-[#222222] tracking-wider text-[15px] leading-[25px]">
        Guaranteed Safe And Secure Checkout
      </p>
      <div class="flex justify-center items-center gap-3 md:gap-4 mt-3">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa" class="h-4">
        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png" alt="MasterCard" class="h-4">
        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="h-4">
      </div>
    </div>
  </div>
</section>

<!-- Related Products -->
@if(isset($relatedProducts) && $relatedProducts->count() > 0)
<div class="py-12 px-4 lg:px-16">
  <h2 class="text-2xl md:text-3xl text-[#222222] mb-6 jost text-start text-[34px] leading-[34px]">Related Products</h2>

  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 md:gap-6">
    @foreach($relatedProducts as $relatedProduct)
      <div class="flex flex-col items-center relative">
        <div class="bg-gray-50 p-4 pb-0 relative">
          @if($relatedProduct->original_price && $relatedProduct->original_price > $relatedProduct->current_price)
            <span class="absolute top-2 left-2 text-sm bg-[#E01A2B] text-white md:px-2 p-1 md:py-1">
              -{{ round((($relatedProduct->original_price - $relatedProduct->current_price) / $relatedProduct->original_price) * 100) }}%
            </span>
          @endif
          
          @auth
            <form action="{{ route('wishlist.store') }}" method="POST" class="absolute top-2 right-2">
              @csrf
              <input type="hidden" name="product_id" value="{{ $relatedProduct->id }}">
              <button type="submit" class="bg-white size-[20px] md:size-[30px] flex items-center justify-center rounded-full shadow-md hover:bg-[#ffe8e8] transition">
                <i class="ri-heart-line text-[#C26E72] text-[12px] md:text-[18px]"></i>
              </button>
            </form>
          @endauth

          <a href="{{ route('shop.show', $relatedProduct->id) }}">
            @if($relatedProduct->image)
              @if(str_starts_with($relatedProduct->image, 'http'))
                <img src="{{ $relatedProduct->image }}" alt="{{ $relatedProduct->name }}" class="cursor-pointer w-full h-auto object-contain">
              @else
                <img src="{{ \Illuminate\Support\Facades\Storage::url($relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="cursor-pointer w-full h-auto object-contain">
              @endif
            @else
              <img src="{{ asset('theme/imgs/home/13.png') }}" alt="img" class="cursor-pointer w-full h-auto object-contain">
            @endif
          </a>
        </div>

        <div class="p-4">
          <a href="{{ route('shop.show', $relatedProduct->id) }}" class="text-start text-[16px] mb-2 jost line-clamp-2 block">{{ $relatedProduct->name }}</a>
          <div class="flex mb-2 bg-white">
            @for($i = 0; $i < 5; $i++)
              <i class="ri-star{{ $i < floor($relatedProduct->rating ?? 4) ? '-fill' : '-line' }} text-yellow-400 text-sm md:text-xl"></i>
            @endfor
          </div>
          <span class="md:text-lg text-md">
            @if($relatedProduct->original_price && $relatedProduct->original_price > $relatedProduct->current_price)
              <span class="line-through text-gray-500">₹{{ number_format($relatedProduct->original_price, 2) }}</span>
            @endif
            <span class="text-[#E01A2B] font-medium ml-1">₹{{ number_format($relatedProduct->current_price, 2) }}</span>
          </span>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    document.getElementById('closeCart').addEventListener('click', function () {
        document.getElementById('cartSidebar').classList.add('translate-x-full');
        document.getElementById('overlay').classList.add('hidden');
    });

    document.getElementById('overlay').addEventListener('click', function () {
        document.getElementById('cartSidebar').classList.add('translate-x-full');
        this.classList.add('hidden');
    });

    $("#addToCartForm").on("submit", function(e) {
        e.preventDefault();
        
        let formData = $(this).serialize();

        $.ajax({
            url: $(this).attr("action"),
            method: "POST",
            data: formData,
            success: function(response) {
              
                $("#cartSidebarBody").html(response.cart_html);
                $("#cartSidebar").removeClass("translate-x-full");
                $("#overlay").removeClass("hidden");

                if (response.cart_count !== undefined) {
                    $("#cart-badge").text(response.cart_count);
                }
                if (response.cart_total !== undefined) {
                    $("#cart-total").text(response.cart_total);
                }
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });

  function changeMainImage(src) {
    const mainImage = document.getElementById("mainImage");
    if (mainImage) {
      mainImage.classList.add("opacity-0");
      setTimeout(() => {
        mainImage.src = src;
        mainImage.classList.remove("opacity-0");
      }, 150);
    }
  }

  function selectColor(el) {
    document.querySelectorAll("#colorButtons button").forEach(btn => btn.classList.remove("ring-2", "ring-[#CD2C58]"));
    el.classList.add("ring-2", "ring-[#CD2C58]");
  }

  function selectSize(el) {
    document.querySelectorAll("#sizeButtons button").forEach(btn => btn.classList.remove("border-[#CD2C58]", "text-[#CD2C58]", "bg-[#CD2C58]", "text-white"));
    el.classList.add("border-[#CD2C58]", "text-[#CD2C58]", "bg-[#CD2C58]", "text-white");
  }

  // Quantity controls
  const quantityInput = document.getElementById('quantity');
  const quantityInputHidden = document.getElementById('quantityInput');
  const quantityInputMobile = document.getElementById('quantityInputMobile');
  const increaseBtn = document.getElementById('increase');
  const decreaseBtn = document.getElementById('decrease');
  const maxStock = {{ $product->stock ?? 999 }};

  function updateQuantity(value) {
    const qty = Math.max(1, Math.min(value, maxStock));
    if (quantityInput) quantityInput.value = qty;
    if (quantityInputHidden) quantityInputHidden.value = qty;
    if (quantityInputMobile) quantityInputMobile.value = qty;
  }

  if (increaseBtn) {
    increaseBtn.addEventListener('click', () => {
      const current = parseInt(quantityInput.value) || 1;
      updateQuantity(current + 1);
    });
  }

  if (decreaseBtn) {
    decreaseBtn.addEventListener('click', () => {
      const current = parseInt(quantityInput.value) || 1;
      updateQuantity(current - 1);
    });
  }
</script>
@endsection
