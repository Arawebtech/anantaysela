@extends('layouts.frontend')

@section('title', 'Shop - ANANTA YSELA')

@section('content')
<!-- Banner Section -->
<section class="relative text-center w-full">
  <img src="{{ asset('theme/imgs/bnnrImgs/Product.png') }}" alt="Banner" class="w-full h-auto">
  <div class="absolute inset-0 flex items-center justify-center">
    <h1 class="text-[#222] text-xl md:text-5xl font-bold drop-shadow-lg">Product</h1>
  </div>
</section>

<div class="container mx-auto px-4 py-8 md:mb-10 mb-5">
  <div class="flex flex-col lg:flex-row gap-4 md:gap-8">
    <!-- Filter Button (Mobile) -->
    <button style="width:fit-content" id="filterToggle" class="lg:hidden flex items-center gap-2 px-4 py-2 bg-[#CD2C58] text-white rounded-md mb-2 md:mb-4">
      <i class="ri-filter-3-line text-xl"></i> Filter
    </button>

    <!-- Sidebar -->
    <aside id="filterAside" class="w-full lg:w-1/4 bg-white p-3 md:p-6 hidden lg:block rounded-lg shadow-md md:space-y-4 space-y-2">
      <!-- Categories -->
      <div class="border-b pb-4">
        <button type="button" class="w-full flex justify-between items-center px-4 py-2 text-[#222222] text-[18px] font-medium accordion-btn">
          Shop By Categories <span class="text-xl accordion-icon">+</span>
        </button>
        <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300 px-4">
          <form id="categoryFilter" class="space-y-2.5 mt-1">
            <label class="flex items-center jost gap-2 text-[#666] hover:text-red-600 cursor-pointer text-[16px]">
              <input type="checkbox" value="all" class="categoryCheckbox h-4 w-4 text-red-600 rounded" checked>
              All Categories
            </label>
            @foreach($categories ?? [] as $category)
              <label class="flex items-center jost gap-2 text-[#666] hover:text-red-600 cursor-pointer text-[16px]">
                <input type="checkbox" value="{{ $category }}" class="categoryCheckbox h-4 w-4 text-red-600 rounded">
                {{ $category }}
              </label>
            @endforeach
          </form>
        </div>
      </div>

      <!-- Price -->
      <div class="border-b pb-4">
        <button type="button" class="w-full flex justify-between items-center px-4 py-2 text-[#222222] text-[18px] font-medium accordion-btn">
          Price Filter <span class="text-xl accordion-icon">+</span>
        </button>
        <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300 px-4">
          <input type="range" id="priceRange" min="0" max="1000" value="1000" class="w-full mt-2 accent-[#CD2C58]">
          <p class="text-sm mt-1 text-gray-500">Up to $<span id="priceValue">1000</span></p>
        </div>
      </div>

      <!-- Average Rating -->
      <div class="border-b pb-4">
        <button type="button" class="w-full flex justify-between items-center px-4 py-2 text-[#222222] text-[18px] font-medium accordion-btn">
          Average Rating <span class="text-xl accordion-icon">+</span>
        </button>
        <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300 px-4">
          <form id="ratingFilter" class="space-y-2.5 mt-1">
            @for($r = 5; $r >= 1; $r--)
              <div class="flex items-center gap-1 text-yellow-400">
                @for($i = 0; $i < $r; $i++)
                  <i class="ri-star-fill"></i>
                @endfor
                @for($j = 0; $j < 5 - $r; $j++)
                  <i class="ri-star-line"></i>
                @endfor
                <span class="ml-2 text-[#666] text-[16px]">& Up</span>
              </div>
            @endfor
          </form>
        </div>
      </div>
    </aside>

    <!-- Product Grid -->
    <div class="flex-1">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-gray-700 text-lg">Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of {{ $products->total() ?? 0 }} results</h2>
        <form method="GET" action="{{ route('shop.index') }}" class="flex gap-2">
          <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="px-3 py-2 border rounded">
          @if(request('search') || request('category'))
            <a href="{{ route('shop.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Clear</a>
          @endif
        </form>
      </div>

      <main id="productGrid" class="grid grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
          <div class="product-card flex flex-col items-center bg-white relative transition">
            <div class="relative w-full bg-gray-50 rounded overflow-hidden">
              @if($product->original_price && $product->original_price > $product->current_price)
                <span class="absolute top-2 left-2 text-xs md:text-sm bg-[#E01A2B] text-white font-medium px-2 py-1 rounded">
                  -{{ round((($product->original_price - $product->current_price) / $product->original_price) * 100) }}%
                </span>
              @endif
              
              @auth
                <form action="{{ route('wishlist.store') }}" method="POST" class="absolute top-2 right-2 wishlist-form" data-product-id="{{ $product->id }}">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <button type="submit" onclick="event.stopPropagation();" class="bg-white size-[20px] md:size-[30px] flex items-center justify-center rounded-full shadow-md hover:bg-[#ffe8e8] transition wishlist-btn">
                    <i class="ri-heart-line text-[#C26E72] text-center text-[12px] md:text-[18px] wishlist-icon"></i>
                  </button>
                </form>
              @endauth

              <a href="{{ route('shop.show', $product->id) }}">
                @if($product->image)
                  @if(str_starts_with($product->image, 'http'))
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="cursor-pointer w-full max-h-[8rem] md:max-h-72 object-contain">
                  @else
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="{{ $product->name }}" class="cursor-pointer w-full max-h-[8rem] md:max-h-72 object-contain">
                  @endif
                @else
                  <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">No Image</span>
                  </div>
                @endif
              </a>
            </div>
            <div class="w-full mt-4">
              <a href="{{ route('shop.show', $product->id) }}" class="text-start text-[16px] font-medium mb-2 jost line-clamp-2 block">
                {{ $product->name }}
              </a>
              <div class="flex mb-2">
                @for($r = 0; $r < 5; $r++)
                  @if($r < floor($product->rating ?? 4))
                    <i class="ri-star-fill text-yellow-400 text-sm md:text-base"></i>
                  @else
                    <i class="ri-star-line text-yellow-400 text-sm md:text-base"></i>
                  @endif
                @endfor
              </div>
              <div class="flex items-center gap-2">
                <a href="{{ route('shop.show', $product->id) }}" class="md:text-lg text-red-600 text-md font-semibold">
                  ${{ number_format($product->current_price, 2) }}
                </a>
                @if($product->original_price && $product->original_price > $product->current_price)
                  <span class="line-through text-gray-400">${{ number_format($product->original_price, 2) }}</span>
                @endif
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-3 text-center py-12">
            <p class="text-gray-500 text-lg">No products found.</p>
            <a href="{{ route('shop.index') }}" class="inline-block mt-4 bg-[#CD2C58] text-white px-6 py-2 rounded hover:bg-[#b7254b]">
              View All Products
            </a>
          </div>
        @endforelse
      </main>

      <!-- Pagination -->
      @if($products->hasPages())
        <div class="mt-8 text-center">
          {{ $products->links() }}
        </div>
      @endif
    </div>
  </div>
</div>

<script>
  // Accordion functionality
  const accBtns = document.querySelectorAll('.accordion-btn');
  accBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const content = btn.nextElementSibling;
      const icon = btn.querySelector('.accordion-icon');
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
        icon.textContent = '+';
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
        icon.textContent = '-';
      }
    });
  });

  // Mobile filter toggle
  document.getElementById('filterToggle')?.addEventListener('click', () => {
    document.getElementById('filterAside')?.classList.toggle('hidden');
  });

  // Price range filter
  const priceRange = document.getElementById('priceRange');
  const priceValue = document.getElementById('priceValue');
  if (priceRange && priceValue) {
    priceRange.addEventListener('input', (e) => {
      priceValue.textContent = e.target.value;
      filterProducts();
    });
  }

  // Category filter
  document.querySelectorAll('.categoryCheckbox').forEach(cb => {
    cb.addEventListener('change', () => {
      filterProducts();
    });
  });

  function filterProducts() {
    const selectedCategories = Array.from(document.querySelectorAll('.categoryCheckbox:checked')).map(c => c.value);
    const maxPrice = parseInt(priceRange?.value || 1000);
    
    document.querySelectorAll('.product-card').forEach(card => {
      const productPrice = parseFloat(card.querySelector('.text-red-600')?.textContent?.replace('$', '') || 0);
      const productCategory = card.dataset.category || '';
      
      const matchCategory = selectedCategories.length === 0 || selectedCategories.includes('all') || selectedCategories.includes(productCategory);
      const matchPrice = productPrice <= maxPrice;
      
      if (matchCategory && matchPrice) {
        card.style.display = '';
      } else {
        card.style.display = 'none';
      }
    });
  }
</script>

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
          icon.classList.remove('ri-heart-line');
          icon.classList.add('ri-heart-fill');
          icon.style.color = '#E01A2B';
          showNotification('Product added to wishlist!', 'success');
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
