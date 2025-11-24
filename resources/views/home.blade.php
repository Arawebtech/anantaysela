@extends('layouts.frontend')

@section('title', 'ANANTA YSELA - Fashion Store')

@section('content')
<!-- Include Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- HERO SECTION on Mobile -->
<section class="relative w-full h-[600px] md:h-[800px] flex flex-col justify-end p-6 overflow-hidden sm:block md:block lg:hidden">
  <img src="{{ asset('theme/imgs/bnnrImgs/mobileBnnr.png') }}" alt="Banner" class="absolute inset-0 w-full h-full object-fill -z-10">

  <div class="absolute bottom-[15rem] sm:bottom-[20rem] left-6 bg-[#FFBDC0] text-[#262222] px-6 py-2 font-medium border-b border-r border-[#3D3D3D]
    hover:bg-[#FFA8AC] transition-all duration-200
    shadow-[3px_3px_0_0_rgba(61,61,61,1)] hover:shadow-[4px_4px_0_0_rgba(61,61,61,1)] w-fit z-10">
    <a href="{{ route('shop.index') }}">SHOP NOW</a>
  </div>

  <div class="absolute bottom-[3rem] left-6 bg-white/80 backdrop-blur-sm p-2 sm:p-4 rounded-lg shadow-md flex flex-col items-start gap-2 max-w-[260px]">
    <h4 class="font-jost sm:text-[20px] text-[16px] font-semibold text-[#222]">Also available on</h4>
    <div class="grid grid-cols-2 gap-4">
      <img src="{{ asset('theme/imgs/flipkart.png') }}" alt="Flipkart" class="w-20 h-auto object-contain mx-auto">
      <img src="{{ asset('theme/imgs/amazon.png') }}" alt="Amazon" class="w-20 h-auto object-contain mx-auto">
    </div>
  </div>
</section>

<!-- HERO SECTION Desktop -->
<section class="relative hidden lg:block w-full overflow-hidden bg-cover bg-no-repeat bg-center pt-[130px] pb-20"
  style="background-image: url('{{ asset('theme/imgs/bnnrImgs/hero.png') }}');">

  <h1 style="letter-spacing: 20px;" class="text-6xl md:text-[100px] playfair-display text-center mt-8 text-[#000000]">
    ANANTA YSELA</h1>
  <div class="relative z-10 container mx-auto flex flex-col md:flex-row items-start justify-start gap-10 px-6 md:px-12">

    <div class="max-w-md space-y-6 mt-8">
      <div onclick="window.location.href='{{ route('shop.index') }}'"
        class="flex items-end justify-center cursor-pointer">
        <div class="bg-[#FFA8AC] max-w-[280px] w-full p-3 py-2 shadow-md shadow-[#00000040] flex items-center gap-3">
          <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?auto=format&fit=crop&w=100&q=80"
            class="w-16 h-16 object-cover rounded" alt="Product">

          <div class="flex-1">
            <h4 class="text-[13px] leading-4 text-[#000000] fanwood font-medium">
              Elegant Long Sleeve V-Neck Wrap Dress With Front Slit
            </h4>
            <p class="text-[14px] leading-5 text-[#000000] font-medium mt-1">$23.89</p>

            <div class="flex gap-1 mt-1 text-[#1B1B1B] text-[14px]">
              <img src="{{ asset('theme/imgs/icons/star.png') }}" alt="img">
              <img src="{{ asset('theme/imgs/icons/star.png') }}" alt="img">
              <img src="{{ asset('theme/imgs/icons/star.png') }}" alt="img">
              <img src="{{ asset('theme/imgs/icons/star.png') }}" alt="img">
              <img src="{{ asset('theme/imgs/icons/star.png') }}" alt="img">
            </div>
          </div>
        </div>
      </div>

      <p class="text-[#AFAFAF] leading-relaxed">
        Elevate your wardrobe and make a statement with our fashion-forward pieces. Step into a realm of endless
        possibilities and discover the perfect outfit that speaks to your unique style. Get ready to turn heads and
        exude confidence with every step you take. Your fashion journey starts here.
      </p>
      <a href="{{ route('shop.index') }}" class="inline-block bg-[#FFBDC0] text-[#262222] px-6 py-2 md:px-8 md:py-3 font-medium border-b border-r border-[#3D3D3D]
          hover:bg-[#FFA8AC] transition-all duration-200
          shadow-[3px_3px_0_0_rgba(61,61,61,1)] hover:shadow-[4px_4px_0_0_rgba(61,61,61,1)]">
        SHOP NOW
      </a>
    </div>

    <div onclick="window.location.href='{{ route('shop.index') }}'" class="relative cursor-pointer flex flex-col items-start" style="width: inherit;">
      <img src="{{ asset('theme/imgs/bnnrImgs/bnnr1.png') }}" alt="Model" class="w-[220px] md:w-[280px] md:h-[390px] relative z-10">

      <div class="absolute bottom-44 right-[9rem] bg-[#FFE1E2] p-3 py-2 shadow-md shadow-[#00000040] flex items-center gap-3 max-w-[280px]">
        <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?auto=format&fit=crop&w=100&q=80"
          class="w-16 h-16 object-cover rounded" alt="Product">

        <div class="flex-1">
          <h4 class="text-[13px] leading-4 text-[#000000] fanwood font-medium">
            Elegant Long Sleeve V-Neck Wrap Dress With Front Slit
          </h4>
          <p class="text-[14px] leading-5 text-[#000000] font-medium mt-1">$23.89</p>

          <div class="flex gap-1 mt-1 text-[#1B1B1B] text-[14px]">
            <img src="{{ asset('theme/imgs/icons/star.png') }}" alt="img">
            <img src="{{ asset('theme/imgs/icons/star.png') }}" alt="img">
            <img src="{{ asset('theme/imgs/icons/star.png') }}" alt="img">
            <img src="{{ asset('theme/imgs/icons/star.png') }}" alt="img">
            <img src="{{ asset('theme/imgs/icons/star.png') }}" alt="img">
          </div>
        </div>
      </div>

      <div class="absolute bottom-12 right-[9rem] p-3 py-2 flex flex-col items-start gap-1 max-w-[280px]">
        <h4 class="jost text-[22px] font-semibold text-[#222]">Also available on</h4>
        <div class="flex items-end gap-4">
          <img src="{{ asset('theme/imgs/flipkart.png') }}" alt="Flipkart" class="object-contain">
          <img src="{{ asset('theme/imgs/amazon.png') }}" alt="Amazon" class="object-contain">
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Product Highlights Section -->
<section class="md:py-24 md:pt-3 py-14 bg-gradient-to-r from-[#f7e4e5] via-white to-[#f7e4e5] text-center">
  <h2 class="text-3xl md:text-[50px] leading-[100px] py-0 mt-0 text-[#000000] tracking-wide jost">Product Highlights</h2>
  <p class="text-[#AFAFAF] mb-16 text-[16px] poppins-light">Discover the perfect outfit that speaks to your unique style.</p>

  <!-- Desktop layout -->
  <div class="hidden md:flex justify-center items-end flex-wrap gap-4 px-2 md:px-6">
    <!-- Card 1 -->
    <div onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer relative w-[180px] md:mb-5 md:w-[230px] h-[316px] overflow-hidden rounded-t-[200px] bg-[#e5c0b8] flex items-end justify-center">
      <img src="{{ asset('theme/imgs/home/11.png') }}" alt="Model 1" class="absolute bottom-0 pt-5 w-full h-full object-cover" />
    </div>

    <!-- Card 2 -->
    <div onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer relative w-[180px] md:mb-16 md:w-[230px] h-[390px] overflow-hidden rounded-t-[200px] bg-[#FFE0E2] flex items-end justify-center">
      <img src="{{ asset('theme/imgs/home/2.png') }}" alt="Model 2" class="absolute bottom-0 pt-5 w-full h-full object-cover" />
    </div>

    <!-- Card 3 -->
    <div onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer relative w-[200px] md:w-[250px] h-[420px] overflow-visible rounded-t-[200px] bg-[#e5c0b8] flex items-end justify-center">
      <img src="{{ asset('theme/imgs/home/4.png') }}" alt="Model 3" class="absolute bottom-0 w-full h-[480px] object-cover" />
    </div>

    <!-- Card 4 -->
    <div onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer relative w-[180px] md:w-[230px] mb-16 h-[390px] overflow-hidden rounded-t-[200px] bg-[#FFE0E2] flex items-end justify-center">
      <img src="{{ asset('theme/imgs/home/3.png') }}" alt="Model 4" class="absolute pt-5 bottom-0 w-full h-full object-cover" />
    </div>

    <!-- Card 5 -->
    <div onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer relative w-[180px] md:w-[230px] mb-5 h-[300px] overflow-hidden rounded-t-[200px] bg-[#e5c0b8] flex items-end justify-center">
      <img src="{{ asset('theme/imgs/home/5.png') }}" alt="Model 5" class="absolute pt-5 bottom-0 w-full h-full object-cover" />
    </div>
  </div>

  <!-- Mobile Slider -->
  <div class="swiper mySwiperMobile inline md:!hidden px-6">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="relative w-[230px] h-[390px] overflow-hidden rounded-t-[200px] bg-[#e5c0b8] flex items-end justify-center mx-auto">
          <img src="{{ asset('theme/imgs/home/11.png') }}" alt="Model 1" class="absolute bottom-0 pt-5 w-full h-full object-cover" />
        </div>
      </div>
      <div class="swiper-slide">
        <div class="relative w-[230px] h-[390px] overflow-hidden rounded-t-[200px] bg-[#c71f1a] flex items-end justify-center mx-auto">
          <img src="{{ asset('theme/imgs/home/2.png') }}" alt="Model 2" class="absolute bottom-0 pt-5 w-full h-full object-cover" />
        </div>
      </div>
      <div class="swiper-slide">
        <div class="relative w-[230px] h-[390px] overflow-hidden rounded-t-[200px] bg-gray-800 flex items-end justify-center mx-auto">
          <img src="{{ asset('theme/imgs/home/4.png') }}" alt="Model 3" class="absolute bottom-0 pt-5 w-full h-full object-cover" />
        </div>
      </div>
      <div class="swiper-slide">
        <div class="relative w-[230px] h-[390px] overflow-hidden rounded-t-[200px] bg-[#d3c9c2] flex items-end justify-center mx-auto">
          <img src="{{ asset('theme/imgs/home/3.png') }}" alt="Model 4" class="absolute bottom-0 pt-5 w-full h-full object-cover" />
        </div>
      </div>
      <div class="swiper-slide">
        <div class="relative w-[230px] h-[300px] overflow-hidden rounded-t-[200px] bg-[#7b0d22] flex items-end justify-center mx-auto">
          <img src="{{ asset('theme/imgs/home/5.png') }}" alt="Model 5" class="absolute pt-5 bottom-0 w-full h-full object-cover" />
        </div>
      </div>
    </div>
  </div>

</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiperMobile = new Swiper(".mySwiperMobile", {
    loop: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    slidesPerView: 1,
    spaceBetween: 30,
  });
</script>

<!-- Featured Products -->
<div class="py-12 px-4 lg:px-16">
  <h2 class="text-2xl md:text-3xl text-[#222222] mb-6 jost text-center text-[34px] leading-[34px]">Featured Products</h2>

  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 md:gap-6">

    <!-- Product Card 1 -->
     @foreach ($featuredProducts as $product)
      <div class="flex flex-col items-center relative">
          <div class="bg-gray-50 cursor-pointer p-4 pb-0 relative rounded-lg overflow-hidden">
              @if ($product->discount_percentage)
              <span class="absolute text-sm top-2 left-2 bg-[#C26E72] text-white md:px-2 md:py-1 p-1 rounded">
                -{{ $product->discount_percentage }}%
              </span>
              @endif

              @auth
                <form action="{{ route('wishlist.store') }}" method="POST" 
                      class="absolute top-2 right-2 wishlist-form"
                      data-product-id="{{ $product->id }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" onclick="event.stopPropagation();" 
                        class="bg-white md:size-[30px] size-[20px] rounded-full shadow-md hover:bg-[#ffe8e8] transition wishlist-btn">
                        <i class="ri-heart-line text-[#C26E72] text-[12px] md:text-[18px]"></i>
                    </button>
                </form>
              @endauth
               <img  src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="cursor-pointer w-full h-[260px] md:h-[300px] object-contain bg-white p-2 rounded"
                    onclick="window.location.href='{{ url('shop/'.$product->id) }}'">
          </div>

          <div class="p-4">
              <p onclick="window.location.href='{{ url('shop/'.$product->id) }}'" class="text-start cursor-pointer text-[16px] mb-2 jost line-clamp-2">
                {{ $product->name }}
              </p>
              <div class="flex mb-2 bg-white">
                  @php
                      $rating = floor($product->rating);
                  @endphp

                  @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $rating)
                          <i class="ri-star-fill text-yellow-400 text-sm md:text-xl"></i>
                      @else
                          <i class="ri-star-line text-yellow-400 text-sm md:text-xl"></i>
                      @endif
                  @endfor
              </div>
              <span class="md:text-lg text-md font-semibold">
                  @if ($product->original_price > $product->price)
                      <span class="line-through text-gray-500">₹{{ $product->original_price }}</span>
                  @endif
                  <span class="text-[#E01A2B] font-medium ml-1">₹{{ $product->price }}</span>
              </span>
          </div>
      </div>
    @endforeach
    {{-- <div class="flex flex-col items-center relative">
      <div class="bg-gray-50 cursor-pointer p-4 pb-0 relative rounded-lg overflow-hidden">
        <span class="absolute text-sm top-2 left-2 bg-[#C26E72] text-white md:px-2 md:py-1 p-1 rounded">-4%</span>
        @auth
          <form action="{{ route('wishlist.store') }}" method="POST" class="absolute top-2 right-2 wishlist-form" data-product-id="{{ $featuredProducts[0]->id ?? 1 }}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $featuredProducts[0]->id ?? 1 }}">
            <button type="submit" onclick="event.stopPropagation();" class="bg-white md:size-[30px] size-[20px] rounded-full shadow-md hover:bg-[#ffe8e8] transition wishlist-btn" aria-label="Add to Wishlist">
              <i class="ri-heart-line text-[#C26E72] text-[12px] md:text-[18px] wishlist-icon"></i>
            </button>
          </form>
        @endauth
        <img src="{{ asset('theme/imgs/home/7.png') }}" alt="img" class="w-full h-auto object-contain" onclick="window.location.href='{{ route('shop.index') }}'">
      </div>
      <div class="p-4">
        <p onclick="window.location.href='{{ route('shop.index') }}'" class="text-start cursor-pointer text-[16px] mb-2 jost line-clamp-2">
          New Classynest Purple Floral Peplum Top
        </p>
        <div class="flex mb-2 bg-white">
          <i class="ri-star-fill text-yellow-400 text-sm md:text-xl"></i>
          <i class="ri-star-fill text-yellow-400 text-sm md:text-xl"></i>
          <i class="ri-star-fill text-yellow-400 text-sm md:text-xl"></i>
          <i class="ri-star-fill text-yellow-400 text-sm md:text-xl"></i>
          <i class="ri-star-line text-yellow-400 text-sm md:text-xl"></i>
        </div>
        <span class="md:text-lg text-md font-semibold">
          <span class="line-through text-gray-500">$26</span>
          <span class="text-[#E01A2B] font-medium ml-1">$25</span>
        </span>
      </div>
    </div> --}}

  </div>
</div>

<!-- Testimonial Section -->
<section class="bg-[#EDF2F9] md:py-16 py-10 text-center text-gray-900">
  <div class="max-w-4xl mx-auto">
    <div class="tiny-slider">
      <div class="p-6">
        <div class="text-3xl mb-6">
          <span class="text-[55px] text-transparent stroke-current stroke-1" style="-webkit-text-stroke: 2px #4B5563;">❝</span>
        </div>
        <p class="text-lg leading-relaxed mb-6 max-w-[800px]">
          Eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum suspendisse ultrices gravida risus commodo.
        </p>
        <p class="font-semibold text-gray-800">Patricia Gilbert</p>
        <p class="text-sm text-gray-700 mb-4">Graphic Designer</p>
      </div>

      <div class="p-6">
        <div class="text-3xl mb-6">
          <span class="text-[55px] text-transparent stroke-current stroke-1" style="-webkit-text-stroke: 2px #4B5563;">❝</span>
        </div>
        <p class="text-lg leading-relaxed mb-6">
          Another amazing testimonial goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>
        <p class="font-semibold text-gray-800">John Doe</p>
        <p class="text-sm text-gray-700 mb-4">UI/UX Designer</p>
      </div>

      <div class="p-6">
        <div class="text-3xl mb-6">
          <span class="text-[55px] text-transparent stroke-current stroke-1" style="-webkit-text-stroke: 2px #4B5563;">❝</span>
        </div>
        <p class="text-lg leading-relaxed mb-6 max-w-[800px]">
          Eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum suspendisse ultrices gravida risus commodo.
        </p>
        <p class="font-semibold text-gray-800">Patricia Gilbert</p>
        <p class="text-sm text-gray-700 mb-4">Graphic Designer</p>
      </div>
    </div>
  </div>
</section>

<script>
  var slider = tns({
    container: '.tiny-slider',
    items: 1,
    slideBy: 'page',
    autoplay: true,
    autoplayButtonOutput: false,
    controls: false,
    nav: true,
    navPosition: 'bottom',
    autoplayTimeout: 5000,
    speed: 400,
  });
</script>

<style>
  .tns-nav {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 1.5rem;
  }

  .tns-nav button {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #cbd5e1;
    border: none;
    padding: 0;
    transition: all 0.3s;
  }

  .tns-nav .tns-nav-active {
    background-color: #E01A2B;
    transform: scale(1.2);
  }
</style>

<!-- Benefits Section -->
<section class="bg-gray-50 py-10">
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

<!-- Latest Products -->
<div class="py-12 px-4 lg:px-16">
  <h2 class="text-2xl md:text-3xl text-[#222222] mb-6 jost text-center text-[34px] leading-[34px]">Latest Products</h2>

  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 md:gap-6">
    <!-- Product Card 1 -->
    @foreach ($latestProducts as $product)
      <div class="flex flex-col items-center relative">
          <div class="bg-gray-50 p-4 pb-0 relative rounded-lg overflow-hidden">
              @if ($product->discount_percentage)
              <span class="absolute top-2 left-2 text-sm bg-[#E01A2B] text-white md:px-2 p-1 md:py-1 rounded">
                -{{ $product->discount_percentage }}%
              </span>
              @endif

              @auth
              <form action="{{ route('wishlist.store') }}" method="POST"
                    class="absolute top-2 right-2 wishlist-form"
                    data-product-id="{{ $product->id }}">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <button type="submit" onclick="event.stopPropagation();"
                      class="bg-white size-[20px] md:size-[30px] flex items-center justify-center rounded-full shadow-md hover:bg-[#ffe8e8] transition wishlist-btn">
                      <i class="ri-heart-line text-[#C26E72] text-[12px] md:text-[18px] wishlist-icon"></i>
                  </button>
              </form>
              @endauth

                <img  src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="cursor-pointer w-full h-[260px] md:h-[300px] object-contain bg-white p-2 rounded"
                    onclick="window.location.href='{{ url('shop/'.$product->id) }}'">


             {{-- <img src="{{ Str::startsWith($image, 'http') ? $image : asset('storage/' . $image) }}" alt="{{ $product->name }}" onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer w-full h-auto object-contain" width="100%" height="100%"> --}}
          </div>

          <div class="p-4">
              <p onclick="window.location.href='{{ url('shop/'.$product->id) }}'" class="cursor-pointer text-start text-[16px] mb-2 jost line-clamp-2">
                  {{ $product->name }}
              </p>

              <div class="flex mb-2 bg-white">
                  @php $rating = floor($product->rating); @endphp
                  @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $rating)
                          <i class="ri-star-fill text-yellow-400 text-sm md:text-xl"></i>
                      @else
                          <i class="ri-star-line text-yellow-400 text-sm md:text-xl"></i>
                      @endif
                  @endfor
              </div>

              <span class="md:text-lg text-md font-semibold">
                  @if ($product->original_price > $product->price)
                      <span class="line-through text-gray-500">₹{{ $product->original_price }}</span>
                  @endif
                  <span class="text-[#E01A2B] font-medium ml-1">₹{{ $product->price }}</span>
              </span>
          </div>
      </div>
    @endforeach
    
    {{-- <!-- Product Card 2 -->
    <div class="flex flex-col items-center relative">
      <div class="bg-gray-50 p-4 pb-0 relative">
        @auth
          <form action="{{ route('wishlist.store') }}" method="POST" class="absolute top-2 right-2 wishlist-form" data-product-id="{{ $latestProducts[1]->id ?? 2 }}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $latestProducts[1]->id ?? 2 }}">
            <button type="submit" onclick="event.stopPropagation();" class="bg-white size-[20px] md:size-[30px] flex items-center justify-center rounded-full shadow-md hover:bg-[#ffe8e8] transition wishlist-btn">
              <i class="ri-heart-line text-[#C26E72] text-[12px] md:text-[18px] wishlist-icon"></i>
            </button>
          </form>
        @endauth
        <img src="{{ asset('theme/imgs/home/11.png') }}" alt="img" onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer">
      </div>
      <div class="p-4">
        <p onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer text-start text-[16px] mb-2 jost line-clamp-2">New Classynest Purple Floral Peplum Top</p>
        <div class="flex mb-2 bg-white">
          <i class="ri-star-fill text-yellow-400 text-sm md:text-xl"></i>
          <i class="ri-star-fill text-yellow-400 text-sm md:text-xl"></i>
          <i class="ri-star-fill text-yellow-400 text-sm md:text-xl"></i>
          <i class="ri-star-fill text-yellow-400 text-sm md:text-xl"></i>
          <i class="ri-star-line text-yellow-400 text-sm md:text-xl"></i>
        </div>
        <span class="md:text-lg text-md font-semibold">
          <span class="line-through text-gray-500">$26</span>
          <span class="text-[#E01A2B] font-medium ml-1">$25</span>
        </span>
      </div>
    </div> --}}

  </div>
</div>

<!-- Best Collection -->
<div class="flex flex-wrap gap-6 lg:p-16 p-4 justify-center align-center">
  <!-- Banner 1 -->
  <div class="bg-[#EBEBEB] flex-1 flex flex-row items-end min-w-[300px]">
    <div class="text-left md:w-1/2 md:space-y-4 space-y-1 md:p-6 p-4">
      <h2 onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer md:text-lg text-sm jost-medium text-[#000000]">BEST COLLECTION</h2>
      <h4 onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer md:text-xl text-md text-gray-700 fanwood">
        Elegant long sleeves V Neck Wrap Dress with Front Slit
      </h4>
      <p onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer text-gray-800">
        Starting At <span class="font-medium text-[#E01A2B] text-[18px] md:text-[22px]">$29.00</span>
      </p>
      <button onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer mt-2 md:px-4 px-3 py-1 md:py-2 border-b border-red-600 text-[#E01A2B] hover:bg-red-600 hover:text-white transition">
        Shop Now
      </button>
    </div>
    <div class="md:w-1/2 flex justify-center">
      <img src="{{ asset('theme/imgs/home/4.png') }}" alt="img" onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer w-[268px] object-contain">
    </div>
  </div>

  <!-- Banner 2 -->
  <div class="bg-[#EBEBEB] flex-1 flex flex-row items-end min-w-[300px]">
    <div class="text-left md:w-1/2 md:space-y-4 space-y-1 md:p-6 p-4">
      <h2 onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer md:text-lg text-sm jost-medium text-[#000000]">BEST COLLECTION</h2>
      <h4 onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer md:text-xl text-md text-gray-700 fanwood">
        Elegant long sleeves V Neck Wrap Dress with Front Slit
      </h4>
      <p onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer text-gray-800">
        Starting At <span class="font-medium text-[#E01A2B] text-[18px] md:text-[22px]">$29.00</span>
      </p>
      <button onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer mt-2 md:px-4 px-3 py-1 md:py-2 border-b border-red-600 text-[#E01A2B] hover:bg-red-600 hover:text-white transition">
        Shop Now
      </button>
    </div>
    <div onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer md:w-1/2 w-auto flex justify-center">
      <img src="{{ asset('theme/imgs/home/5.png') }}" alt="img" class="w-[268px] object-contain">
    </div>
  </div>
</div>

<!-- New Collection -->
<div class="bg-[#EBEBEB] flex flex-col md:flex-row items-center md:items-center p-6 mx-auto ml-3 mr-3 lg:ml-16 lg:mr-16 pb-0 mb-0">
  <div class="text-center md:text-left md:w-1/2 space-y-4 p-4 md:p-6">
    <h2 class="text-lg font-medium jost text-[#000000]">NEW COLLECTION</h2>
    <h4 style="line-height: 100%" onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer text-3xl sm:text-4xl md:text-[48px] fanwood text-[#000000]">Neck Wrap Dress With Front Slit</h4>
    <p class="text-gray-800 text-base">
      Starting At <span class="font-medium text-[#E01A2B] text-[22px]">$29.00</span>
    </p>
    <p onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer text-[14px] sm:text-[16px] leading-relaxed">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, doloremque officia autem consequatur placeat dolor
      praesentium possimus et aliquid aut alias nostrum minus numquam architecto commodi tempora quisquam. Beatae, vitae.
    </p>
    <button onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer mt-4 px-4 sm:px-6 py-2 bg-gray-800 text-white hover:bg-gray-900 transition">Shop Now</button>
  </div>

  <div class="mt-4 md:mt-0 md:w-1/2 flex justify-center">
    <img src="{{ asset('theme/imgs/bnnrImgs/bnnr1.png') }}" alt="img" onclick="window.location.href='{{ route('shop.index') }}'" class="cursor-pointer w-[250px] sm:w-[300px] md:w-[337px] h-auto max-w-full object-contain">
  </div>
</div>

<!-- Brand Icons -->
<div class="flex flex-wrap justify-around p-6 my-8 gap-4 md:gap-6 lg:flex-nowrap">
  <img src="{{ asset('theme/imgs/icons/group1.png') }}" alt="brand">
  <img src="{{ asset('theme/imgs/icons/group2.png') }}" alt="brand">
  <img src="{{ asset('theme/imgs/icons/group3.png') }}" alt="brand">
  <img src="{{ asset('theme/imgs/icons/group4.png') }}" alt="brand">
  <img src="{{ asset('theme/imgs/icons/group5.png') }}" alt="brand">
  <img src="{{ asset('theme/imgs/icons/group6.png') }}" alt="brand">
</div>

<!-- Latest Blog -->
<div class="py-10 px-4 lg:px-16 mb-3">
  <h2 class="text-[34px] leading-[34px] py-2 text-center mb-8 jost text-[#222222]">Our Latest Blog</h2>
  <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
    <div class="bg-white overflow-hidden transition">
      <a href="{{ route('blog') }}">
        <img src="https://picsum.photos/400/250?random=1" alt="Blog Image" class="w-full h-56 object-cover">
      </a>
      <div class="p-5 md:space-y-3 md:space-y-1.5">
        <h4 class="text-[#E01A2B] font-medium">February 9, 2025 · By editor</h4>
        <h3 class="text-[#222222] jost-medium text-[20px] leading-[28px] tracking-wide">How to Write a Blog Post Your Readers Will Love in 5 Steps</h3>
        <p class="jost text-[#666666] text-[16px] leading-[25px]">Why the world would end without travel coupons. The 16 worst songs about spa deals...</p>
        <a href="{{ route('blog') }}" class="text-[#E01A2B] border-b border-[#E01A2B] hover:text-[#E01A2B] inline-block">Read More</a>
      </div>
    </div>

    <div class="bg-white overflow-hidden transition">
      <a href="{{ route('blog') }}">
        <img src="https://picsum.photos/400/250?random=2" alt="Blog Image" class="w-full h-56 object-cover">
      </a>
      <div class="p-5 md:space-y-3 md:space-y-1.5">
        <h4 class="text-[#E01A2B] font-medium">February 9, 2025 · By editor</h4>
        <h3 class="text-[#222222] jost-medium text-[20px] leading-[28px] tracking-wide">Top 10 Tips for Writing Engaging Blog Titles</h3>
        <p class="jost text-[#666666] text-[16px] leading-[25px]">Discover how catchy headlines can boost your blog traffic instantly...</p>
        <a href="{{ route('blog') }}" class="text-[#E01A2B] border-b border-[#E01A2B] hover:text-[#E01A2B] inline-block">Read More</a>
      </div>
    </div>

    <div class="bg-white overflow-hidden transition">
      <a href="{{ route('blog') }}">
        <img src="https://picsum.photos/400/250?random=3" alt="Blog Image" class="w-full h-56 object-cover">
      </a>
      <div class="p-5 md:space-y-3 md:space-y-1.5">
        <h4 class="text-[#E01A2B] font-medium">February 9, 2025 · By editor</h4>
        <h3 class="text-[#222222] jost-medium text-[20px] leading-[28px] tracking-wide">Boost Your Blog with Better Visuals and Layout</h3>
        <p class="jost text-[#666666] text-[16px] leading-[25px]">Learn the design secrets that make readers stay longer on your posts...</p>
        <a href="{{ route('blog') }}" class="text-[#E01A2B] border-b border-[#E01A2B] hover:text-[#E01A2B] inline-block">Read More</a>
      </div>
    </div>
  </div>
</div>

<!-- Women Empowerment -->
<div class="bg-[#F3B2B5] flex flex-col items-center justify-end text-center p-8 pb-0">
  <h2 class="fanwood font-medium text-[32px] md:text-[44px] leading-tight text-[#222] mb-6">
    Empowering Women. Empowering the Future.
  </h2>
  <div class="text-center my-3">
    <button class="bg-[#CD2C58] text-white px-4 py-3 jost-medium">Know More</button>
  </div>
  <img src="{{ asset('theme/imgs/womenEmpowerment.png') }}" alt="Women Empowerment" class="object-contain">
</div>

<!-- Wishlist AJAX Script -->
@auth
<script>
document.addEventListener('DOMContentLoaded', function() {
  const wishlistForms = document.querySelectorAll('.wishlist-form');

  wishlistForms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      e.stopPropagation();

      const formData = new FormData(form);
      const submitBtn = form.querySelector('.wishlist-btn');
      const icon = form.querySelector('.wishlist-icon');
      const productId = form.dataset.productId;

      // Disable button during request
      submitBtn.disabled = true;

      fetch('{{ route("wishlist.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // Change icon to filled heart
          icon.classList.remove('ri-heart-line');
          icon.classList.add('ri-heart-fill');
          icon.style.color = '#E01A2B';

          // Show success message
          showNotification('Product added to wishlist!', 'success');

          // Update wishlist count
          updateWishlistCount();
        } else if (data.error) {
          showNotification(data.error, 'error');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        showNotification('Something went wrong. Please try again.', 'error');
      })
      .finally(() => {
        submitBtn.disabled = false;
      });
    });
  });

  function showNotification(message, type) {
    // Remove existing notification if any
    const existing = document.querySelector('.wishlist-notification');
    if (existing) existing.remove();

    const notification = document.createElement('div');
    notification.className = `wishlist-notification fixed top-20 right-4 z-50 px-4 py-3 rounded-lg shadow-lg ${
      type === 'success' ? 'bg-green-500' : 'bg-red-500'
    } text-white font-medium`;
    notification.textContent = message;
    document.body.appendChild(notification);

    setTimeout(() => {
      notification.style.opacity = '0';
      notification.style.transition = 'opacity 0.3s';
      setTimeout(() => notification.remove(), 300);
    }, 3000);
  }

  function updateWishlistCount() {
    fetch('{{ route("wishlist.count") }}')
      .then(response => response.json())
      .then(data => {
        const badges = document.querySelectorAll('#wishlist-badge, #wishlist-badge-mobile');
        badges.forEach(badge => {
          if (badge) {
            const count = data.count || 0;
            badge.textContent = count;
            badge.style.display = count > 0 ? 'flex' : 'none';
          }
        });
      })
      .catch(error => console.error('Error updating wishlist count:', error));
  }
});
</script>
@endauth
@endsection
