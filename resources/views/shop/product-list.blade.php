 @forelse($products as $product)
     <div class="product-card flex flex-col items-center bg-white relative transition">
         <div class="relative w-full bg-gray-50 rounded overflow-hidden">
             @if ($product->original_price && $product->original_price > $product->current_price)
                 <span
                     class="absolute top-2 left-2 text-xs md:text-sm bg-[#E01A2B] text-white font-medium px-2 py-1 rounded">
                     -{{ round((($product->original_price - $product->current_price) / $product->original_price) * 100) }}%
                 </span>
             @endif

             @auth
                 <form action="{{ route('wishlist.store') }}" method="POST" class="absolute top-2 right-2 wishlist-form"
                     data-product-id="{{ $product->id }}">
                     @csrf
                     <input type="hidden" name="product_id" value="{{ $product->id }}">
                     <button type="submit" onclick="event.stopPropagation();"
                         class="bg-white size-[20px] md:size-[30px] flex items-center justify-center rounded-full shadow-md hover:bg-[#ffe8e8] transition wishlist-btn">
                         <i class="ri-heart-line text-[#C26E72] text-center text-[12px] md:text-[18px] wishlist-icon"></i>
                     </button>
                 </form>
             @endauth

             <a href="{{ route('shop.show', $product->id) }}">
                 @if ($product->image)
                     @if (str_starts_with($product->image, 'http'))
                         <img src="{{ $product->image }}" alt="{{ $product->name }}"
                             class="cursor-pointer w-full max-h-[8rem] md:max-h-72 object-contain">
                     @else
                         <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}"
                             alt="{{ $product->name }}"
                             class="cursor-pointer w-full max-h-[8rem] md:max-h-72 object-contain">
                     @endif
                 @else
                     <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                         <span class="text-gray-400">No Image</span>
                     </div>
                 @endif
             </a>
         </div>

         <div class="w-full mt-4">
             <a href="{{ route('shop.show', $product->id) }}"
                 class="text-start text-[16px] font-medium mb-2 jost line-clamp-2 block">
                 {{ $product->name }}
             </a>
             <div class="flex mb-2">
                 @for ($r = 0; $r < 5; $r++)
                     @if ($r < floor($product->rating ?? 4))
                         <i class="ri-star-fill text-yellow-400 text-sm md:text-base"></i>
                     @else
                         <i class="ri-star-line text-yellow-400 text-sm md:text-base"></i>
                     @endif
                 @endfor
             </div>
             <div class="flex items-center gap-2">
                 <a href="{{ route('shop.show', $product->id) }}"
                     class="md:text-lg text-red-600 text-md font-semibold">
                     ₹{{ number_format($product->price, 2) }}
                 </a>
                 @if ($product->original_price && $product->original_price > $product->original_price)
                     <span class="line-through text-gray-400">${{ number_format($product->original_price, 2) }}</span>
                 @endif
             </div>
         </div>
     </div>
 @empty
     <div class="col-span-3 text-center py-12">
         <p class="text-gray-500 text-lg">No products found.</p>
         <a href="{{ route('shop.index') }}"
             class="inline-block mt-4 bg-[#CD2C58] text-white px-6 py-2 rounded hover:bg-[#b7254b]">
             View All Products
         </a>
     </div>
 @endforelse
