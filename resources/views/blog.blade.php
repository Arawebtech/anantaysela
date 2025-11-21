@extends('layouts.frontend')

@section('title', 'Blog - ANANTA YSELA')

@section('content')
<!-- Banner Section -->
<section class="relative text-center w-full">
  <img src="{{ asset('theme/imgs/bnnrImgs/Group187.png') }}" alt="Banner" class="w-full h-auto">
  <div class="absolute inset-0 flex items-center justify-center">
    <h1 class="text-[#222] text-xl md:text-5xl font-bold drop-shadow-lg">Blog</h1>
  </div>
</section>

<div class="py-10 px-4 lg:px-16 mb-3">
  <h2 class="text-[34px] leading-[34px] py-2 text-center mb-8 jost text-[#222222]">Our Latest Blog</h2>
  <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
    <!-- Blog Card -->
    <div class="bg-white overflow-hidden transition">
      <a href="#">
        <img src="https://picsum.photos/400/250?random=1" alt="Blog Image" class="w-full h-56 object-cover">
      </a>
      <div class="p-5 md:space-y-3 md:space-y-1.5">
        <h4 class="text-[#E01A2B] font-medium">February 9, 2025 · By editor</h4>
        <h3 class="text-[#222222] jost-medium text-[20px] leading-[28px] tracking-wide">How to Write a Blog Post Your Readers Will Love in 5 Steps</h3>
        <p class="jost text-[#666666] text-[16px] leading-[25px]">Why the world would end without travel coupons. The 16 worst songs about spa deals...</p>
        <a href="#" class="text-[#E01A2B] border-b border-[#E01A2B] hover:text-[#E01A2B] inline-block">Read More</a>
      </div>
    </div>

    <div class="bg-white overflow-hidden transition">
      <a href="#">
        <img src="https://picsum.photos/400/250?random=2" alt="Blog Image" class="w-full h-56 object-cover">
      </a>
      <div class="p-5 md:space-y-3 md:space-y-1.5">
        <h4 class="text-[#E01A2B] font-medium">February 9, 2025 · By editor</h4>
        <h3 class="text-[#222222] jost-medium text-[20px] leading-[28px] tracking-wide">Top 10 Tips for Writing Engaging Blog Titles</h3>
        <p class="jost text-[#666666] text-[16px] leading-[25px]">Discover how catchy headlines can boost your blog traffic instantly...</p>
        <a href="#" class="text-[#E01A2B] border-b border-[#E01A2B] hover:text-[#E01A2B] inline-block">Read More</a>
      </div>
    </div>

    <div class="bg-white overflow-hidden transition">
      <a href="#">
        <img src="https://picsum.photos/400/250?random=3" alt="Blog Image" class="w-full h-56 object-cover">
      </a>
      <div class="p-5 md:space-y-3 md:space-y-1.5">
        <h4 class="text-[#E01A2B] font-medium">February 9, 2025 · By editor</h4>
        <h3 class="text-[#222222] jost-medium text-[20px] leading-[28px] tracking-wide">Boost Your Blog with Better Visuals and Layout</h3>
        <p class="jost text-[#666666] text-[16px] leading-[25px]">Learn the design secrets that make readers stay longer on your posts...</p>
        <a href="#" class="text-[#E01A2B] border-b border-[#E01A2B] hover:text-[#E01A2B] inline-block">Read More</a>
      </div>
    </div>
  </div>
</div>
@endsection
