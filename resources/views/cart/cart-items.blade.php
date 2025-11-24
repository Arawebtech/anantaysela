@php
    $totalAmount = 0;
@endphp

@foreach ($cartItems as $item)
    @php
        $product = $item->product ?? null;
        $productName = $product ? $product->name ?? '' : '';
        $productImage = $product ? $product->image ?? null : null;

        if (!$productImage) {
            $productImage = asset('frontend/assets/images/no-image.png');
        } else {
            if (!str_starts_with($productImage, 'http')) {
                $productImage = \Illuminate\Support\Facades\Storage::url($productImage);
            }
        }
        $itemTotal = ($item->price ?? 0) * ($item->quantity ?? 0);
        $totalAmount += $itemTotal;
    @endphp

    <div class="flex items-center gap-3 mb-3 border-b pb-3">
        <img src="{{ $productImage }}" class="size-[115px] rounded object-cover border" alt="{{ $productName }}">
        <div class="flex-1">
            <p class="text-sm font-semibold">{{ $productName }}</p>
            <p class="text-xs text-gray-600">₹{{ number_format($item->price ?? 0, 2) }}</p>
            <p class="text-xs text-gray-800">Qty: {{ $item->quantity ?? 0 }}</p>
        </div>
    </div>
@endforeach


<div class="subtotal mt-3 pt-3 border-t flex justify-between font-semibold text-lg">
    <span>Sub Total:</span>
    <span>₹{{ number_format($totalAmount, 2) }}</span>
</div>

<div class="mt-4 flex gap-3">
    <a href="{{ route('cart.index') }}"
        class="flex-1 text-center bg-gray-200 text-gray-900 py-2 rounded hover:bg-gray-300 transition">
        Cart
    </a>

    <a href="{{ route('checkout') }}"
        class="flex-1 text-center bg-[#CD2C58] text-white py-2 rounded hover:bg-[#b7254b] transition">
        Checkout
    </a>
</div>
