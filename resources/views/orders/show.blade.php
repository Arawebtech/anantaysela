@extends('layouts.frontend')

@section('title', 'Order Details - ANANTA YSELA')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-8">
        <a href="{{ route('orders.index') }}" class="text-pink-600 hover:text-pink-800 mb-4 inline-block">← Back to Orders</a>
        <h1 class="text-4xl font-bold text-gray-900">Order #{{ $order->order_number }}</h1>
        <p class="text-gray-600 mt-2">Placed on {{ $order->created_at->format('F d, Y \a\t g:i A') }}</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Order Items -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Order Items</h2>
                <div class="space-y-4">
                    @foreach($order->items as $item)
                    <div class="flex items-center space-x-4 border-b pb-4">
                        @if($item->product && $item->product->image)
                            @if(str_starts_with($item->product->image, 'http'))
                                <img src="{{ $item->product->image }}" alt="{{ $item->product_name }}" class="w-20 h-20 object-cover rounded">
                            @else
                                <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product_name }}" class="w-20 h-20 object-cover rounded">
                            @endif
                        @else
                            <div class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center">
                                <span class="text-gray-400 text-xs">No Image</span>
                            </div>
                        @endif
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900">{{ $item->product_name }}</h3>
                            <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                            <p class="text-sm text-gray-500">Price: ₹{{ number_format($item->price, 2) }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-gray-900">₹{{ number_format($item->total, 2) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Order Summary</h2>
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-semibold">₹{{ number_format($order->total_amount, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping</span>
                        <span class="font-semibold">₹0.00</span>
                    </div>
                    <div class="border-t pt-4">
                        <div class="flex justify-between">
                            <span class="text-xl font-bold text-gray-900">Total</span>
                            <span class="text-xl font-bold text-pink-600">₹{{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Order Status</h2>
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-600">Status</p>
                        <p class="font-semibold text-gray-900 capitalize">{{ $order->status }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Payment Status</p>
                        <p class="font-semibold text-gray-900 capitalize">{{ $order->payment_status }}</p>
                    </div>
                </div>
            </div>

            @if($order->shipping_address)
            <div class="bg-white rounded-lg shadow-md p-6 mt-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Shipping Address</h2>
                <p class="text-gray-700 whitespace-pre-line">{{ $order->shipping_address }}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

