@extends('layouts.frontend')

@section('title', 'About Us - ANANTA YSELA')

@section('content')
<!-- Banner Section -->
<section class="relative text-center w-full">
  <img src="{{ asset('theme/imgs/bnnrImgs/About Us.png') }}" alt="Banner" class="w-full h-auto">
  <div class="absolute inset-0 flex items-center justify-center">
    <h1 class="text-[#222] text-xl md:text-5xl font-bold drop-shadow-lg">About Us</h1>
  </div>
</section>

<section class="my-5 md:mb-10 px-4 md:px-16">
  <div class="border rounded overflow-hidden bg-white shadow-sm">
    <!-- Tabs -->
    <div class="flex w-full overflow-x-auto whitespace-nowrap border-b bg-[#fafafa] text-center scrollbar-hide px-6 sm:px-10 gap-4">
      <button class="tab-btn relative py-4 px-6 md:px-10 text-[17px] md:text-[19px] font-medium text-[#555] tracking-wide transition-all duration-300 after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[3px] after:bg-gradient-to-r after:from-[#CD2C58] after:to-[#FF7F83] hover:after:w-full hover:text-[#CD2C58] active" data-tab="desc">
        Development
      </button>
      <button class="tab-btn relative py-4 px-6 md:px-10 text-[17px] md:text-[19px] font-medium text-[#555] tracking-wide transition-all duration-300 after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[3px] after:bg-gradient-to-r after:from-[#CD2C58] after:to-[#FF7F83] hover:after:w-full hover:text-[#CD2C58]" data-tab="info">
        Qualified Team
      </button>
      <button class="tab-btn relative py-4 px-6 md:px-10 text-[17px] md:text-[19px] font-medium text-[#555] tracking-wide transition-all duration-300 after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[3px] after:bg-gradient-to-r after:from-[#CD2C58] after:to-[#FF7F83] hover:after:w-full hover:text-[#CD2C58]" data-tab="reviews">
        Strategy
      </button>
    </div>

    <!-- Content -->
    <div class="p-5 md:p-8 text-gray-700 leading-relaxed">
      <!-- Development -->
      <div id="desc" class="tab-content block space-y-5">
        <h2 class="text-2xl font-semibold text-[#CD2C58]">Our Development Process</h2>
        <p class="text-[#555] text-[16px] jost">
          We follow a structured and transparent development process to deliver robust, scalable, and user-friendly digital solutions. Our focus lies in creating web applications that combine functionality, speed, and design excellence.
        </p>
        <ul class="list-disc pl-6 space-y-1 text-[#555] text-[16px] jost">
          <li>Requirement analysis and project planning</li>
          <li>Wireframing, prototyping, and UI/UX design</li>
          <li>Agile development with continuous testing</li>
          <li>Quality assurance and deployment</li>
          <li>Post-launch support and optimization</li>
        </ul>
        <p class="text-[#555] text-[16px] jost">
          Every project goes through multiple review stages to ensure top-notch quality and performance for our clients.
        </p>
      </div>

      <!-- Qualified Team -->
      <div id="info" class="tab-content hidden space-y-5">
        <h2 class="text-2xl font-semibold text-[#CD2C58]">Our Qualified Team</h2>
        <p class="text-[#555] text-[16px] jost">
          Our team consists of experienced professionals who are passionate about delivering exceptional results. We bring together diverse expertise in design, development, and digital marketing.
        </p>
        <ul class="list-disc pl-6 space-y-1 text-[#555] text-[16px] jost">
          <li>Expert designers and developers</li>
          <li>Digital marketing specialists</li>
          <li>Quality assurance professionals</li>
          <li>Customer support team</li>
        </ul>
      </div>

      <!-- Strategy -->
      <div id="reviews" class="tab-content hidden space-y-5">
        <h2 class="text-2xl font-semibold text-[#CD2C58]">Our Strategy</h2>
        <p class="text-[#555] text-[16px] jost">
          We believe in a customer-centric approach that focuses on understanding your needs and delivering solutions that exceed expectations.
        </p>
        <ul class="list-disc pl-6 space-y-1 text-[#555] text-[16px] jost">
          <li>Customer-first mindset</li>
          <li>Innovation and continuous improvement</li>
          <li>Transparent communication</li>
          <li>Long-term partnerships</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<script>
  const tabs = document.querySelectorAll(".tab-btn");
  const contents = document.querySelectorAll(".tab-content");
  
  tabs.forEach(btn => {
    btn.addEventListener("click", () => {
      tabs.forEach(b => {
        b.classList.remove("border-[#CD2C58]", "text-[#CD2C58]", "active");
        b.style.borderBottom = "none";
      });
      contents.forEach(c => c.classList.add("hidden"));
      
      btn.classList.add("border-[#CD2C58]", "text-[#CD2C58]", "active");
      btn.style.borderBottom = "3px solid #CD2C58";
      document.getElementById(btn.dataset.tab).classList.remove("hidden");
    });
  });
</script>
@endsection
