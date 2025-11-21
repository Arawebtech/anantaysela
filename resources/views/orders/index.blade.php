@extends('layouts.frontend')

@section('title', 'My Orders - ANANTA YSELA')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-bold text-gray-900 mb-8">My Orders</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->count() > 0)
    <div class="space-y-6">
        @foreach($orders as $order)
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Order #{{ $order->order_number }}</h3>
                    <p class="text-sm text-gray-500">Placed on {{ $order->created_at->format('M d, Y') }}</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                        {{ $order->status == 'delivered' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                        {{ $order->status == 'processing' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $order->status == 'shipped' ? 'bg-purple-100 text-purple-800' : '' }}
                        {{ $order->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <div class="border-t pt-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    @foreach($order->items->take(3) as $item)
                    <div class="flex items-center space-x-3">
                        @if($item->product && $item->product->image)
                            @if(str_starts_with($item->product->image, 'http'))
                                <img src="{{ $item->product->image }}" alt="{{ $item->product_name }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product_name }}" class="w-16 h-16 object-cover rounded">
                            @endif
                        @else
                            <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                <span class="text-gray-400 text-xs">No Image</span>
                            </div>
                        @endif
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">{{ $item->product_name }}</p>
                            <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}</p>
                        </div>
                    </div>
                    @endforeach
                    @if($order->items->count() > 3)
                        <div class="flex items-center justify-center">
                            <span class="text-gray-500 text-sm">+{{ $order->items->count() - 3 }} more items</span>
                        </div>
                    @endif
                </div>

                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-600">Total: <span class="font-bold text-gray-900">₹{{ number_format($order->total_amount, 2) }}</span></p>
                    </div>
                    <a href="{{ route('orders.show', $order->id) }}" class="text-pink-600 hover:text-pink-800 font-semibold">
                        View Details →
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-12">
        <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">No orders yet</h2>
        <p class="text-gray-600 mb-6">Start shopping to see your orders here.</p>
        <a href="{{ route('shop.index') }}" class="inline-block bg-pink-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-pink-600 transition">
            Start Shopping
        </a>
    </div>
    @endif
</div>
@endsection

