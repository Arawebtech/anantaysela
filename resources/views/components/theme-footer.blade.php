<!-- Theme Footer -->
<footer class="bg-[#222222]">
  <!-- Newsletter Section -->
  <div class="py-8 px-6 text-white md:px-16 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
    <div>
      <h2 class="text-[34px] leading-[51px] text-center md:text-left jost">Join Our Newsletter For $10 Off</h2>
      <p class="text-[#B1B1B1] text-[16px] leading-[25px] jost">Subscribe to our latest newsletter to get news about special discounts</p>
    </div>
    <form class="flex flex-col sm:flex-row w-full md:w-1/2 gap-2.5" method="POST" action="#">
      @csrf
      <input 
        type="email" 
        name="email"
        placeholder="Email Address" 
        required
        class="flex-grow px-4 py-2 text-gray-900 focus:outline-none" 
      />
      <button 
        type="submit" 
        class="bg-red-600 px-6 py-2 hover:bg-red-700 transition"
      >
        Subscribe
      </button>
    </form>
  </div>

  <!-- Main Footer Content -->
  <div class="bg-white  py-10 px-6 md:px-16 grid grid-cols-1 md:grid-cols-4 gap-8">
    <!-- About -->
    <div>
      <h3 class="font-semibold mb-3 text-[#222222] tracking-wider text-[18px]">About Our Store</h3>
      <p class=" leading-relaxed text-[#666666] mb-4">
        Welcome to our store, where we pride ourselves on providing exceptional products and unparalleled
        customer service our store style, and innovation.
      </p>
      <div class="flex space-x-3">
        <img src="{{ asset('theme/imgs/footerImg/app-store.png.png') }}" alt="App Store" class="h-8">
        <img src="{{ asset('theme/imgs/footerImg/google-play.png.png') }}" alt="Google Play" class="h-8">
      </div>
    </div>

    <!-- Your Account -->
    <div>
      <h3 class="font-semibold mb-3 text-[#222222] tracking-wider text-[18px]">Your Account</h3>
      <ul class="space-y-2 text-[16px] text-[#666666]">
        <li>
          <a href="#" class="hover:text-gray-800 flex items-center gap-2">
            Product Support
          </a>
        </li>
        <li>
          <a href="{{ route('checkout') }}" class="hover:text-gray-800 flex items-center gap-2">
            Checkout
          </a>
        </li>
        <li>
          <a href="#" class="hover:text-gray-800 flex items-center gap-2">
            License Policy
          </a>
        </li>
        <li>
          <a href="#" class="hover:text-gray-800 flex items-center gap-2">
            Affiliate
          </a>
        </li>
        <li>
          <a href="#" class="hover:text-gray-800 flex items-center gap-2">
            Locality
          </a>
        </li>
      </ul>
    </div>

    <!-- Services -->
    <div>
      <h3 class="font-semibold mb-3 text-[#222222] tracking-wider text-[18px]">Services</h3>
      <ul class="space-y-2 text-[16px] text-[#666666]">
        <li><a href="{{ route('orders.index') }}" class="hover:text-gray-800">Order Status</a></li>
        <li><a href="#" class="hover:text-gray-800">Terms Conditions</a></li>
        <li><a href="#" class="hover:text-gray-800">Policy For Sellers</a></li>
        <li><a href="#" class="hover:text-gray-800">Policy For Buyers</a></li>
        <li><a href="#" class="hover:text-gray-800">Shipping & Refund</a></li>
      </ul>
    </div>

    <!-- Contact -->
    <div>
      <h3 class="font-semibold mb-3 text-[#222222] tracking-wider text-[18px]">Contact Us</h3>
      <ul class="space-y-2 text-[16px] text-[#666666]">
        <li class="flex">
          <i class="ri-map-pin-line text-red-400 mr-1 text-[18px]"></i>
          <span>
            60 29th Street San Homestead, 94110 507-Union Trade Center, United States America
          </span>
        </li>
        <li class="flex items-center">
          <i class="ri-phone-line text-red-400 mr-1 text-[18px]"></i>
          +91 917027757051
        </li>
        <li class="flex items-center">
          <i class="ri-mail-ai-line text-red-400 mr-1 text-[18px]"></i>
          anantaysela@gmail.com
        </li>
      </ul>
    </div>
  </div>

  <!-- Social and Copyright -->
  <div class="bg-white border-t border-gray-200 py-6 px-6 md:px-16 flex flex-col md:flex-row justify-between items-center  text-sm">
    <div class="flex space-x-5 mb-3 md:mb-0 text-gray-900">
      <a href="#" class="hover:text-gray-700 text-[20px] bg-gray-100 rounded-full p-2 font-semibold text-[#222222]"><i class="ri-facebook-line"></i></a>
      <a href="#" class="hover:text-gray-700 text-[20px] bg-gray-100 rounded-full p-2 font-semibold text-[#222222]"><i class="ri-twitter-line"></i></a>
      <a href="#" class="hover:text-gray-700 text-[20px] bg-gray-100 rounded-full p-2 font-semibold text-[#222222]"><i class="ri-instagram-line"></i></a>
      <a href="#" class="hover:text-gray-700 text-[20px] bg-gray-100 rounded-full p-2 font-semibold text-[#222222]"><i class="ri-pinterest-line"></i></a>
      <a href="#" class="hover:text-gray-700 text-[20px] bg-gray-100 rounded-full p-2 font-semibold text-[#222222]"><i class="ri-google-line"></i></a>
    </div>

    <p class="text-center text-[#666666] text-[16px]">© {{ date('Y') }} Anantaysela</p>
    <div class="flex space-x-3 mt-3 md:mt-0">
      <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa" class="h-5">
      <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png" alt="MasterCard" class="h-5">
      <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="h-5">
    </div>
  </div>
</footer>

<script>
  const btn = document.getElementById("toggleDropdown");
  const menu = document.getElementById("dropdownMenu");
  const icon = document.getElementById("icon");

  if (btn && menu && icon) {
    btn.addEventListener("click", (e) => {
      e.stopPropagation();
      menu.classList.toggle("hidden");
      icon.textContent = menu.classList.contains("hidden") ? "+" : "–";
    });

    // Close dropdown when clicked outside
    document.addEventListener("click", (e) => {
      if (!btn.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add("hidden");
        icon.textContent = "+";
      }
    });
  }
</script>

<script>
  function toggleWishlist(event) {
    event.stopPropagation(); // prevent going to product page
    const heart = event.currentTarget.querySelector("i");
    if (heart && heart.classList.contains("ri-heart-line")) {
      heart.classList.remove("ri-heart-line");
      heart.classList.add("ri-heart-fill");
      heart.classList.add("text-[#C26E72]");
    } else if (heart) {
      heart.classList.remove("ri-heart-fill");
      heart.classList.add("ri-heart-line");
      heart.classList.remove("text-[#C26E72]");
    }
  }
</script>

