@extends('layouts.frontend')

@section('title', 'FAQs - ANANTA YSELA')

@section('content')
<!-- Banner Section -->
<section class="relative text-center w-full">
  <img src="{{ asset('theme/imgs/bnnrImgs/faq.png') }}" alt="Banner" class="w-full h-auto">
  <div class="absolute inset-0 flex items-center justify-center">
    <h1 class="text-[#222] text-xl md:text-5xl font-bold drop-shadow-lg">Faq</h1>
  </div>
</section>

<section class="py-16 bg-gray-50 jost">
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
    <!-- Left Column -->
    <div class="text-center lg:text-left">
      <h4 class="text-[#CD2C58] text-sm uppercase tracking-widest jost-medium mb-2">FAQs</h4>
      <h2 class="text-[30px] sm:text-[34px] font-semibold jost text-[#222] mb-6">Frequently Asked Questions</h2>
      <p class="text-gray-600 leading-relaxed text-[16px] mb-6">
        Have questions? We're here to help! Find answers to the most common queries about our products and services below.
      </p>
      <img src="{{ asset('theme/imgs/faq.png') }}" alt="FAQ" class="w-full max-w-md mx-auto lg:mx-0">
    </div>

    <!-- Right Column -->
    <div class="space-y-0">
      <div class="p-5">
        <h3 class="text-[24px] tracking-wide text-[#222] mb-1 jost">How can we help you?</h3>
        <p class="text-gray-600 leading-relaxed text-[16px]">We provide 24/7 support for all your queries. Our team is here to assist you anytime.</p>
      </div>
      <div class="p-5">
        <h3 class="text-[24px] tracking-wide jost text-[#222] mb-1">What payment methods do you accept?</h3>
        <p class="text-gray-600 leading-relaxed text-[16px]">We accept all major credit/debit cards, UPI, and net banking options for a smooth checkout.</p>
      </div>
      <div class="p-5">
        <h3 class="text-[24px] tracking-wide jost text-[#222] mb-1">Can I cancel my order?</h3>
        <p class="text-gray-600 leading-relaxed text-[16px]">Yes, you can cancel your order within 24 hours of placing it by visiting your order history.</p>
      </div>
      <div class="p-5">
        <h3 class="text-[24px] tracking-wide jost text-[#222] mb-1">Do you offer international shipping?</h3>
        <p class="text-gray-600 leading-relaxed text-[16px]">Currently, we only ship within India, but international delivery options will be available soon.</p>
      </div>
      <div class="p-5">
        <h3 class="text-[24px] tracking-wide jost text-[#222] mb-1">What is your return policy?</h3>
        <p class="text-gray-600 leading-relaxed text-[16px]">We accept returns within 30 days of purchase. Items must be unworn, unwashed, and in their original packaging.</p>
      </div>
      <div class="p-5">
        <h3 class="text-[24px] tracking-wide jost text-[#222] mb-1">How do I track my order?</h3>
        <p class="text-gray-600 leading-relaxed text-[16px]">Once your order ships, you'll receive a tracking number via email. You can use this to track your package.</p>
      </div>
    </div>
  </div>
</section>

<section class="py-16 pt-6 bg-gray-50 jost">
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
    <div class="rounded-lg shadow-sm p-8 hover:shadow-md transition-all bg-white">
      <div class="flex justify-center mb-4">
        <i class="ri-checkbox-circle-line text-[#CD2C58] text-5xl"></i>
      </div>
      <h3 class="text-xl font-semibold text-[#222] mb-2">Quality Guaranteed</h3>
      <p class="text-gray-600 text-[16px]">We ensure every product meets our high quality standards.</p>
    </div>

    <div class="rounded-lg shadow-sm p-8 hover:shadow-md transition-all bg-white">
      <div class="flex justify-center mb-4">
        <i class="ri-truck-line text-[#CD2C58] text-5xl"></i>
      </div>
      <h3 class="text-xl font-semibold text-[#222] mb-2">Fast Delivery</h3>
      <p class="text-gray-600 text-[16px]">Quick and reliable shipping to get your orders to you fast.</p>
    </div>

    <div class="rounded-lg shadow-sm p-8 hover:shadow-md transition-all bg-white">
      <div class="flex justify-center mb-4">
        <i class="ri-customer-service-2-line text-[#CD2C58] text-5xl"></i>
      </div>
      <h3 class="text-xl font-semibold text-[#222] mb-2">24/7 Support</h3>
      <p class="text-gray-600 text-[16px]">Our customer service team is always here to help you.</p>
    </div>
  </div>
</section>
@endsection
