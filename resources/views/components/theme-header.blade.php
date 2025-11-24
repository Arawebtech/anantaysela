@if(!request()->routeIs('home'))
<!-- Theme Header Top Bar -->
<div class="hidden md:flex border-b border-[#E5E5E5] justify-between items-center py-[10px] px-[4rem] text-[#222222] text-sm">
  <!-- Left -->
  <div class="flex items-center gap-2">
    Free Shipping World Wide for all over $199
    <a href="{{ route('shop.index') }}" class="border-b border-gray-800 font-medium jost px-2">Shop Now</a>
  </div>

  <!-- Right -->
  <div class="flex items-center gap-4">
    <a href="{{ route('blog') }}" class="border-r border-gray-300 pr-2">Blog</a>
    <a href="{{ route('contact') }}" class="border-r border-gray-300 pr-2">Contact Us</a>
    <a href="{{ route('faqs') }}">FAQS</a>
  </div>
</div>
@endif

<header class="{{ request()->routeIs('home') ? 'absolute top-0 left-0 bg-transparent' : 'bg-white' }} w-full z-20 {{ request()->routeIs('home') ? 'lg:py-5 pt-2 pb-5' : 'py-4' }} px-4 md:px-[4rem] flex items-center justify-between text-[#000000] text-[15px]">
  
  <!-- ===== DESKTOP HEADER (lg & xl only) ===== -->
  <div class="hidden lg:flex w-full items-center justify-between">
      <div class="flex items-center w-[120px] justify-start relative">
  <!-- Search Icon -->
  <div id="searchIcon" class="cursor-pointer flex items-center justify-center size-[40px] rounded-full hover:bg-gray-100 transition">
    <i class="ri-search-line text-[22px]"></i>
  </div>

  <!-- Search Box -->
  <div id="searchBox" class="hidden absolute right-[-40px] top-1/2 -translate-y-1/2 bg-white shadow-lg border-2 rounded  border border-[#e5c0b8] flex items-center px-3 py-2 w-[210px] transition-all duration-300">
    <i class="ri-search-line text-gray-500 text-[18px]"></i>
    <form action="{{ route('shop.index') }}" method="GET" class="flex-1">
      <input type="text" name="search" placeholder="Search..." class="ml-2 w-full focus:outline-none text-sm text-gray-700" value="{{ request('search') }}" />
    </form>
    <i id="closeSearch" class="ri-close-line text-gray-400 text-[18px] cursor-pointer hover:text-red-500"></i>
  </div>
</div>
 
    <!-- Left Nav -->
    <div class="flex items-center gap-14 text-[16px]">
      <a href="{{ route('home') }}" class="hover:text-gray-700 font-medium">Home</a>
      <a href="{{ route('shop.index') }}" class="hover:text-gray-700">Shop</a>
    </div>

    <!-- LOGO -->
    <div class="text-center">
      <a href="{{ route('home') }}">
        <img src="{{ asset('theme/imgs/logo.png') }}" alt="Logo" class="cursor-pointer h-[50px]" />
      </a>
    </div>

    <!-- Right Nav -->
    <div class="flex items-center gap-14 text-[16px]">
      <div class="relative group">
        <a href="{{ route('categories') }}" class="hover:text-gray-700">Categories</a>
        <div class="dropdown absolute hidden group-hover:flex flex-col bg-white shadow-lg p-3 rounded-lg top-6 left-0">
          <a href="{{ route('shop.index') }}?category=formal" class="flex items-center gap-2 hover:text-[#CD2C58]"><i class="ri-shirt-fill"></i>Formal</a>
          <a href="{{ route('shop.index') }}?category=partywear" class="flex items-center gap-2 hover:text-[#CD2C58]"><i class="ri-gift-fill"></i>Partywear</a>
          <a href="{{ route('shop.index') }}?category=casual" class="flex items-center gap-2 hover:text-[#CD2C58]"><i class="ri-user-3-fill"></i>Casual</a>
          <a href="{{ route('shop.index') }}?category=winter" class="flex items-center gap-2 hover:text-[#CD2C58]"><i class="ri-snowflake-line"></i>Winter</a>
        </div>
      </div>
      <a href="{{ route('about') }}" class="hover:text-gray-700">About</a>

      <!-- Icons -->
      <div class="flex items-center gap-4">
        @if(Auth::guard('customer')->check())
            <a href="{{ route('dashboard') }}" class="ri-user-line text-[22px]"></a>

            <span class="text-gray-800 font-semibold ml-2">
                {{ ucfirst(Auth::guard('customer')->user()->first_name) }}
            </span>

            <a href="{{ route('customerlogout') }}"
                class="flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition btn-sm">
                <i class="ri-logout-box-r-line text-[18px]"></i> Logout
            </a>
        @else
            <a href="{{ route('customer.login') }}" class="ri-user-line text-[22px]"></a>
        @endif

        <a href="{{ route('wishlist') }}" class="ri-heart-line text-[22px] relative">
          <span id="wishlist-badge" class="absolute -top-1 -right-1 w-[14px] h-[14px] bg-[#CD2C58] text-white text-[10px] flex items-center justify-center rounded-full">0</span>
        </a>
        <div class="flex items-center gap-1">
          <a href="{{ route('cart.index') }}" class="ri-handbag-line text-[22px] relative">
            <span id="cart-badge" class="absolute -top-1 -right-1 w-[14px] h-[14px] bg-[#CD2C58] text-white text-[10px] flex items-center justify-center rounded-full">0</span>
          </a>
          <span id="cart-total" class="text-sm">$0.00</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== MOBILE HEADER (sm & md only) ===== -->
  <div class="flex lg:hidden w-full items-center justify-between">
    @if(request()->routeIs('home'))
      <!-- On home page: only menu button -->
      <div></div>
    @else
      <!-- On other pages: Logo on left -->
      <a href="{{ route('home') }}">
        <img src="{{ asset('theme/imgs/logo.png') }}" alt="Logo" class="h-[40px]" />
      </a>
    @endif

    <!-- Menu Button -->
    <button id="mobile-menu-btn" class="text-[#000000] text-2xl">
      <i class="ri-menu-line"></i>
    </button>
  </div>
</header>

<!-- ===== MOBILE MENU ===== -->
<div id="mobile-menu" class="lg:hidden hidden bg-white w-full py-4 {{ request()->routeIs('home') ? 'pt-1' : 'border-t border-[#CD2C58] mt-2 pt-2' }} flex flex-col items-center gap-4 shadow-lg z-50">
  @if(request()->routeIs('home'))
    <!-- Logo inside menu (only on home page) -->
    <a href="{{ route('home') }}" class="flex justify-center">
      <img src="{{ asset('theme/imgs/logo.png') }}" alt="Logo" class="h-[45px]" />
    </a>
  @endif

  <a href="{{ route('home') }}" class="hover:text-gray-700 font-medium text-lg w-full text-center">Home</a>
  <a href="{{ route('shop.index') }}" class="hover:text-gray-700 text-lg w-full text-center">Shop</a>
  <button id="toggleDropdown" class="flex hover:text-gray-700 text-lg w-full text-center justify-center items-center gap-2">
    <span>Categories</span>
    <span id="icon" class="text-xl transition-all duration-200">+</span>
  </button>
  <div id="dropdownMenu" class="hidden flex-col mt-2 bg-white  rounded-xl overflow-hidden">
    <a href="{{ route('shop.index') }}?category=formal" class="flex items-center gap-2 px-4 py-2 hover:bg-[#e5c0b8]"><i class="ri-shirt-fill text-[#d47a6a]"></i>Formal</a>
    <a href="{{ route('shop.index') }}?category=partywear" class="flex items-center gap-2 px-4 py-2 hover:bg-[#e5c0b8]"><i class="ri-gift-fill text-[#d47a6a]"></i>Partywear</a>
    <a href="{{ route('shop.index') }}?category=casual" class="flex items-center gap-2 px-4 py-2 hover:bg-[#e5c0b8]"><i class="ri-user-3-fill text-[#d47a6a]"></i>Casual</a>
    <a href="{{ route('shop.index') }}?category=winter" class="flex items-center gap-2 px-4 py-2 hover:bg-[#e5c0b8]"><i class="ri-snowflake-line text-[#d47a6a]"></i>Winter</a>
  </div>
  <a href="{{ route('about') }}" class="hover:text-gray-700 text-lg w-full text-center">About</a>
    <!-- Icons -->
  <div class="flex items-center gap-6 mt-4">
    @auth
      <a href="{{ route('dashboard') }}" class="ri-user-line text-[22px]"></a>
    @else
      <a href="{{ route('login') }}" class="ri-user-line text-[22px]"></a>
    @endauth
    <a href="{{ route('wishlist') }}" class="relative">
      <i class="ri-heart-line text-[22px]"></i>
      <span id="wishlist-badge-mobile" class="absolute -top-1 -right-1 w-[13px] h-[13px] bg-[#CD2C58] text-white text-[10px] flex items-center justify-center rounded-full">0</span>
    </a>
    <div class="flex items-center gap-1 relative">
      <a href="{{ route('cart.index') }}" class="relative">
        <i class="ri-handbag-line text-[22px]"></i>
        <span id="cart-badge-mobile" class="absolute -top-1 -right-1 w-[13px] h-[13px] bg-[#CD2C58] text-white text-[10px] flex items-center justify-center rounded-full">0</span>
      </a>
      <span id="cart-total-mobile" class="text-sm font-medium">$0.00</span>
    </div>
  </div>
</div>

<!-- ===== JS ===== -->

<!-- Cart Sidebar -->
<div id="cartSidebar" class="fixed top-0 right-0 w-80 h-[60vh] bg-white shadow-xl translate-x-full transition-transform duration-300 z-50 rounded-b-xl flex flex-col">
  <div class="p-4 flex justify-between items-center border-b flex-shrink-0">
    <h2 class="text-lg font-semibold">Your Cart</h2>
    <button id="closeCart" class="text-gray-600 text-xl">&times;</button>
  </div>

  <!-- Scrollable body -->
  <div id="cartSidebarBody" class="p-4 overflow-y-auto flex-grow space-y-4 custom-scroll">
    <p class="text-center text-gray-500">Cart is empty...</p>
  </div>

</div>

<div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 hidden z-40"></div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const toggleDropdown = document.getElementById('toggleDropdown');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const icon = document.getElementById('icon');

    // Ensure mobile menu is hidden on page load
    if (mobileMenu) {
      mobileMenu.classList.add('hidden');
    }

    if (menuBtn && mobileMenu) {
      menuBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        mobileMenu.classList.toggle('hidden');
      });
    }
    
    if (toggleDropdown && dropdownMenu) {
      toggleDropdown.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdownMenu.classList.toggle('hidden');
        if (icon) {
          icon.textContent = dropdownMenu.classList.contains('hidden') ? '+' : '-';
        }
      });
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
      if (mobileMenu && menuBtn && !mobileMenu.contains(e.target) && !menuBtn.contains(e.target)) {
        mobileMenu.classList.add('hidden');
      }
    });

    // Search functionality
    const searchIcon = document.getElementById("searchIcon");
    const searchBox = document.getElementById("searchBox");
    const closeSearch = document.getElementById("closeSearch");

    if (searchIcon && searchBox && closeSearch) {
      searchIcon.onclick = () => {
        searchIcon.classList.add("hidden");
        searchBox.classList.remove("hidden");
        searchBox.classList.add("animate-slideIn");
      };

      closeSearch.onclick = () => {
        searchBox.classList.add("hidden");
        searchIcon.classList.remove("hidden");
      };
    }

    // Update cart and wishlist counts
    function updateCartInfo() {
      fetch('{{ route("cart.count") }}')
        .then(response => response.json())
        .then(data => {
          const badges = document.querySelectorAll('#cart-badge, #cart-badge-mobile');
          badges.forEach(badge => {
            if (badge) {
              const count = data.count || 0;
              badge.textContent = count;
              badge.style.display = count > 0 ? 'flex' : 'none';
            }
          });
        })
        .catch(error => console.error('Error fetching cart count:', error));

      fetch('{{ route("cart.total") }}')
        .then(response => response.json())
        .then(data => {
          const totals = document.querySelectorAll('#cart-total, #cart-total-mobile');
          totals.forEach(total => {
            if (total) {
              total.textContent = '$' + (data.total || '0.00');
            }
          });
        })
        .catch(error => console.error('Error fetching cart total:', error));
    }

    function updateWishlistCount() {
      @auth
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
        .catch(error => {
          const badges = document.querySelectorAll('#wishlist-badge, #wishlist-badge-mobile');
          badges.forEach(badge => {
            if (badge) badge.style.display = 'none';
          });
        });
      @endauth
    }

    // Update on page load
    updateCartInfo();
    updateWishlistCount();
  });
</script>

