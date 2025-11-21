@extends('layouts.frontend')

@section('title', 'Contact Us - ANANTA YSELA')

@section('content')
<!-- Banner Section -->
<section class="relative text-center w-full">
  <img src="{{ asset('theme/imgs/bnnrImgs/Contact.png') }}" alt="Banner" class="w-full h-auto">
  <div class="absolute inset-0 flex items-center justify-center">
    <h1 class="text-[#222] text-xl md:text-5xl font-bold drop-shadow-lg">Contact Us</h1>
  </div>
</section>

<section class="max-w-[67rem] mx-auto px-6 py-10 md:py-20">
  <div class="text-center mb-12">
    <h2 class="text-3xl md:text-4xl font-semibold text-[#000000] mb-4 tracking-wide">Get in Touch With Us</h2>
    <p class="text-gray-600 max-w-2xl mx-auto text-[15px] md:leading-relaxed">
      Have questions about our products or services? Feel free to contact us — our team is always ready to assist you with your inquiries.
    </p>
  </div>

  <div class="grid md:grid-cols-2 gap-14 items-start">
    <!-- Contact Info -->
    <div class="space-y-8 max-w-sm">
      <div class="flex items-start gap-4">
        <div class="md:w-12 md:h-12 w-8 h-8 flex items-center justify-center bg-[#FFF0F3] text-[#000000] rounded-full shadow-sm">
          <i class="ri-map-pin-line text-2xl"></i>
        </div>
        <div>
          <h3 class="font-semibold text-[21px] text-[#000000] poppins md:text-[24px] tracking-wide mb-1">Address</h3>
          <p class="text-[#000000] poppins text-[14px] md:text-[16px] md:leading-relaxed">60 29th Street San Homestead, 94110 507-Union Trade Center, United States America</p>
        </div>
      </div>

      <div class="flex items-start gap-4">
        <div class="md:w-12 md:h-12 w-8 h-8 flex items-center justify-center bg-[#FFF0F3] text-[#000000] rounded-full shadow-sm">
          <i class="ri-phone-line text-2xl"></i>
        </div>
        <div>
          <h3 class="font-semibold text-[21px] text-[#000000] poppins md:text-[24px] tracking-wide mb-1">Phone</h3>
          <p class="text-[#000000] poppins text-[14px] md:text-[16px] md:leading-relaxed">+91 917027757051</p>
        </div>
      </div>

      <div class="flex items-start gap-4">
        <div class="md:w-12 md:h-12 w-8 h-8 flex items-center justify-center bg-[#FFF0F3] text-[#000000] rounded-full shadow-sm">
          <i class="ri-time-line text-2xl"></i>
        </div>
        <div>
          <h3 class="font-semibold text-[21px] text-[#000000] poppins md:text-[24px] tracking-wide mb-1">Working Time</h3>
          <p class="text-[#000000] poppins text-[14px] md:text-[16px] md:leading-relaxed">Monday - Friday: 9:00 AM - 10:00 PM</p>
          <p class="text-[#000000] poppins text-[14px] md:text-[16px] md:leading-relaxed">Saturday: 11:00 AM - 12:00 PM</p>
        </div>
      </div>

      <div class="flex items-start gap-4">
        <div class="md:w-12 md:h-12 w-8 h-8 flex items-center justify-center bg-[#FFF0F3] text-[#000000] rounded-full shadow-sm">
          <i class="ri-mail-line text-2xl"></i>
        </div>
        <div>
          <h3 class="font-semibold text-[21px] text-[#000000] poppins md:text-[24px] tracking-wide mb-1">Email</h3>
          <p class="text-[#000000] poppins text-[14px] md:text-[16px] md:leading-relaxed">anantaysela@gmail.com</p>
        </div>
      </div>
    </div>

    <!-- Contact Form -->
    <div class="bg-white rounded-lg shadow-lg p-6 md:p-10">
      <form class="space-y-5">
        <div>
          <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">Name *</label>
          <input type="text" required class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none transition-colors">
        </div>
        <div>
          <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">Email *</label>
          <input type="email" required class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none transition-colors">
        </div>
        <div>
          <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">Subject *</label>
          <input type="text" required class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none transition-colors">
        </div>
        <div>
          <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">Message *</label>
          <textarea rows="5" required class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none transition-colors"></textarea>
        </div>
        <button type="submit" class="w-full bg-[#CD2C58] text-white py-3 rounded-lg font-medium hover:bg-[#b1244c] transition">
          Send Message
        </button>
      </form>
    </div>
  </div>
</section>
@endsection
