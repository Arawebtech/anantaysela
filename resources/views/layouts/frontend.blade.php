<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Anantaysela - Fashion Store')</title>
  
  <!-- Remix Icon -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css" rel="stylesheet">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Tiny Slider CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-pVNBfJjXk4MQ9i6zSHc5uML5bW6dIbzpxhksISzZz+U6wWJzYc8nO0DLaXvK6n4eStQeSFiT5VwHuGZ4s+XW9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- Theme CSS -->
  <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}" />
  
  <!-- Swiper CSS (for sliders) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body class="font-sans antialiased">
  <!-- Loader -->
  <div id="loader" class="fixed inset-0 flex flex-col items-center justify-center bg-gradient-to-tr from-white via-[#fff5f8] to-[#ffe6ee] z-50 transition-all duration-700">
    <div class="relative flex items-center justify-center">
      <div class="w-16 h-16 rounded-full bg-[#CD2C58]/10 blur-lg absolute animate-ping"></div>
      <div class="w-12 h-12 rounded-full border-4 border-[#CD2C58] animate-spin border-t-transparent"></div>
    </div>
    <p class="mt-5 text-[#CD2C58] text-sm tracking-widest jost animate-pulse">Please Wait...</p>
  </div>

  <!-- Header -->
  <x-theme-header />

  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <x-theme-footer />

  <!-- Tiny Slider JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
  
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Loader Script -->
  <script>
    window.addEventListener("load", () => {
      const loader = document.getElementById("loader");
      if (loader) {
        loader.style.opacity = "0";
        loader.style.pointerEvents = "none";
        setTimeout(() => loader.remove(), 500);
      }
    });
  </script>

  @stack('scripts')
</body>
</html>
