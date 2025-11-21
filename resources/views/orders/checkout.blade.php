@extends('layouts.frontend')

@section('title', 'Checkout - ANANTA YSELA')

@section('content')
<!-- Banner Section -->
<section class="relative text-center w-full">
  <img src="{{ asset('theme/imgs/bnnrImgs/Checkout.png') }}" alt="Banner" class="w-full h-auto">
  <div class="absolute inset-0 flex items-center justify-center">
    <h1 class="text-[#222] text-xl md:text-5xl font-bold drop-shadow-lg">Checkout</h1>
  </div>
</section>

<div class="min-h-screen w-full bg-gradient-to-br from-[#f7f6f3] to-white py-10 px-2 md:px-0">
  <div class="max-w-7xl mx-auto">
    <form action="{{ route('orders.store') }}" method="POST" class="flex flex-col lg:flex-row gap-8 sm:px-4">
      @csrf

      <!-- Checkout Form -->
      <div class="w-full lg:w-2/3">
        <div class="bg-white rounded-lg shadow-lg px-6 md:px-10 py-8 md:py-10 mb-8 border">

          <!-- Billing Information -->
          <div class="mb-8">
            <h3 class="text-[#322e29] text-xl jost-medium mb-6 pb-3 border-b-2 border-[#C26E72] flex items-center">
              <i class="fas fa-user mr-3 text-[#C26E72]"></i>Billing Information
            </h3>
            <div class="flex flex-col md:flex-row gap-4">
              <div class="flex-1">
                <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">First Name *</label>
                <input type="text" name="first_name" value="{{ Auth::user()->name ?? '' }}" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors" required>
              </div>
              <div class="flex-1">
                <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">Last Name *</label>
                <input type="text" name="last_name" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors" required>
              </div>
            </div>
            <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">Email Address *</label>
            <input type="email" name="email" value="{{ Auth::user()->email ?? '' }}" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors" required>
            <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">Phone Number *</label>
            <input type="tel" name="phone" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors" required>
            <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">Address *</label>
            <textarea name="shipping_address" rows="3" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors" required></textarea>
            <div class="flex flex-col md:flex-row gap-4">
              <div class="flex-1">
                <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">City *</label>
                <input type="text" name="city" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors" required>
              </div>
              <div class="flex-1">
                <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">State *</label>
                <input type="text" name="state" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors" required>
              </div>
              <div class="flex-1">
                <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">ZIP Code *</label>
                <input type="text" name="zip_code" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors" required>
              </div>
            </div>
          </div>

          <!-- Shipping Information -->
          <div class="mb-8">
            <h3 class="text-[#322e29] text-xl jost-medium mb-6 pb-3 border-b-2 border-[#C26E72] flex items-center">
              <i class="fas fa-shipping-fast mr-3 text-[#C26E72]"></i>Shipping Information
            </h3>

            <div class="flex items-center mb-4">
              <input type="checkbox" id="sameAsBilling" class="accent-[#C26E72] w-5 h-5 mr-3">
              <label for="sameAsBilling" class="text-[#322e29] font-medium select-none cursor-pointer">Same as billing address</label>
            </div>

            <div id="shippingFields">
              <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                  <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">First Name *</label>
                  <input type="text" name="shipping_first_name" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors">
                </div>
                <div class="flex-1">
                  <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">Last Name *</label>
                  <input type="text" name="shipping_last_name" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors">
                </div>
              </div>
              <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">Address *</label>
              <textarea name="billing_address" rows="3" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors"></textarea>
              <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                  <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">City *</label>
                  <input type="text" name="shipping_city" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors">
                </div>
                <div class="flex-1">
                  <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">State *</label>
                  <input type="text" name="shipping_state" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors">
                </div>
                <div class="flex-1">
                  <label class="text-[#322e29] font-semibold mb-2 block uppercase tracking-wider text-[12px]">ZIP Code *</label>
                  <input type="text" name="shipping_zip_code" class="border-2 rounded-lg px-4 py-3 text-base w-full focus:border-[#C26E72] focus:outline-none mb-4 transition-colors">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Order Summary -->
      <div class="w-full lg:w-1/3">
        <div class="bg-white rounded-lg shadow-lg px-6 md:px-8 py-8 sticky top-6 border">
          <h3 class="text-[#322e29] text-xl mb-6 pb-3 border-b-2 border-[#C26E72] flex items-center jost-medium">
            <i class="fas fa-shopping-cart mr-3 text-[#C26E72]"></i>Order Summary
          </h3>

          <!-- Cart Items -->
          <div class="max-h-60 overflow-y-auto mb-4">
            @foreach($cartItems as $item)
              <div class="flex items-center py-4 border-b last:border-b-0">
                @php
                  $product = is_object($item->product) ? $item->product : (isset($item->product) ? $item->product : null);
                  $productImage = $product && isset($product->image) ? $product->image : (is_array($product) && isset($product['image']) ? $product['image'] : null);
                  $productName = $product && isset($product->name) ? $product->name : (is_array($product) && isset($product['name']) ? $product['name'] : 'Product');
                @endphp
                @if($productImage)
                  @if(str_starts_with($productImage, 'http'))
                    <img src="{{ $productImage }}" class="w-16 h-16 rounded-lg object-cover mr-4 border" alt="{{ $productName }}">
                  @else
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($productImage) }}" class="w-16 h-16 rounded-lg object-cover mr-4 border" alt="{{ $productName }}">
                  @endif
                @else
                  <img src="{{ asset('theme/imgs/home/13.png') }}" class="w-16 h-16 rounded-lg object-cover mr-4 border" alt="Product">
                @endif
                <div class="flex-1">
                  <div class="font-semibold text-[#322e29] mb-1 jost-medium text-sm">{{ $productName }}</div>
                  <div class="flex items-center gap-2 mb-1">
                    <span class="font-bold text-[#C26E72] text-base jost-medium">${{ number_format($item->price, 2) }}</span>
                  </div>
                  <div class="text-[#C26E72] text-sm jost-medium">Qty: {{ $item->quantity }}</div>
                </div>
              </div>
            @endforeach
          </div>

          <!-- Totals -->
          <div class="mt-6 pt-4 border-t-2">
            <div class="flex justify-between mb-2 text-base text-[#322e29] jost-medium">
              <span>Subtotal ({{ $cartItems->sum('quantity') }} items)</span>
              <span>${{ number_format($total, 2) }}</span>
            </div>
            <div class="flex justify-between mb-2 text-base text-[#322e29]">
              <span>Shipping:</span>
              <span>$0</span>
            </div>
            <div class="flex justify-between mt-4 pt-4 border-t text-lg font-bold text-[#322e29]">
              <span>Total:</span>
              <span>${{ number_format($total, 2) }}</span>
            </div>
          </div>

          <!-- Payment Method -->
          <div class="max-w-2xl mx-auto bg-white rounded-xl py-4 space-y-5 shadow-sm mt-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-3 pt-4 border-t">Select Payment Method</h2>

            <div class="space-y-4">
              <label class="flex items-start gap-3 border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-[#CD2C58] transition">
                <input type="radio" name="payment_method" value="netbanking" id="netbank" class="mt-1 accent-[#CD2C58]">
                <div>
                  <p class="font-medium text-gray-800">Net Banking</p>
                  <p class="text-sm text-gray-500 mt-1">Make your payment directly into our bank account.</p>
                </div>
              </label>

              <label class="flex items-start gap-3 border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-[#CD2C58] transition">
                <input type="radio" name="payment_method" value="upi" id="upi" class="mt-1 accent-[#CD2C58]">
                <div>
                  <p class="font-medium text-gray-800">UPI</p>
                  <p class="text-sm text-gray-500 mt-1">Pay securely using your UPI ID.</p>
                </div>
              </label>

              <label class="flex items-start gap-3 border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-[#CD2C58] transition">
                <input type="radio" name="payment_method" value="credit_card" id="credit" class="mt-1 accent-[#CD2C58]">
                <div>
                  <p class="font-medium text-gray-800">Credit Card</p>
                  <p class="text-sm text-gray-500 mt-1">Pay with your credit card securely.</p>
                </div>
              </label>

              <label class="flex items-start gap-3 border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-[#CD2C58] transition">
                <input type="radio" name="payment_method" value="debit_card" id="debit" class="mt-1 accent-[#CD2C58]">
                <div>
                  <p class="font-medium text-gray-800">Debit Card</p>
                  <p class="text-sm text-gray-500 mt-1">Pay with your debit card securely.</p>
                </div>
              </label>
            </div>

            <p class="text-xs text-gray-500 leading-relaxed border-t pt-4">
              Your personal data will be used to support your experience throughout this website, manage your account access, and for other purposes described in our
              <a href="#" class="text-[#CD2C58] hover:underline">privacy policy</a>.
            </p>

            <button type="submit" class="w-full bg-[#CD2C58] text-white py-3 rounded-lg font-medium hover:bg-[#b1244c] transition">
              Place Order
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Benefits Section -->
<section class="py-10">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6 text-center text-gray-800">
    <div class="flex flex-col items-center">
      <div class="text-3xl mb-2"><img src="{{ asset('theme/imgs/icons/exchnge.png') }}" class="size-[45px]" alt="img"></div>
      <h4 class="font-semibold mb-1">Exchange Policy</h4>
      <p class="text-sm text-gray-600">Exchange available</p>
    </div>

    <div class="flex flex-col items-center">
      <div class="text-3xl mb-2"><img src="{{ asset('theme/imgs/icons/quality.png') }}" class="size-[45px]" alt="img"></div>
      <h4 class="font-semibold mb-1">Quality Assurance</h4>
      <p class="text-sm text-gray-600">Every product is quality checked</p>
    </div>

    <div class="flex flex-col items-center">
      <div class="text-3xl mb-2"><img src="{{ asset('theme/imgs/icons/SVG (1).png') }}" alt="img"></div>
      <h4 class="font-semibold mb-1">Member Discount</h4>
      <p class="text-sm text-gray-600">On every order over $130.00</p>
    </div>

    <div class="flex flex-col items-center">
      <div class="text-3xl mb-2"><img src="{{ asset('theme/imgs/icons/Container.png') }}" alt="img"></div>
      <h4 class="font-semibold mb-1">Special Gifts</h4>
      <p class="text-sm text-gray-600">Contact us Anytime</p>
    </div>
  </div>
</section>

<script>
  const checkbox = document.getElementById('sameAsBilling');
  const shippingFields = document.getElementById('shippingFields');

  if (checkbox && shippingFields) {
    checkbox.addEventListener('change', () => {
      shippingFields.style.display = checkbox.checked ? 'none' : 'block';
    });
  }
</script>
@endsection
