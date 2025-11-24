@extends('layouts.admin')

@section('admin-content')
 <div class="w-full px-4 py-6">
    <div class="mb-8">
        <a href="{{ route('admin.orders') }}" class="text-pink-600 hover:text-pink-800 mb-4 inline-block">← Back to Orders</a>
        <h1 class="text-3xl font-bold text-gray-900">Order #{{ $order->order_number }}</h1>
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

        <!-- Order Management -->
        <div class="lg:col-span-1">
            <!-- Update Status Form -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Update Order Status</h2>
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Order Status</label>
                        <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="payment_status" class="block text-sm font-medium text-gray-700 mb-2">Payment Status</label>
                        <select name="payment_status" id="payment_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500">
                            <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                            <option value="refunded" {{ $order->payment_status === 'refunded' ? 'selected' : '' }}>Refunded</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-pink-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-pink-600 transition">
                        Update Status
                    </button>
                </form>
            </div>

            <!-- Current Status -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Current Status</h2>
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Order Status</p>
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $order->status === 'completed' || $order->status === 'delivered' ? 'bg-green-100 text-green-800' : ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($order->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Payment Status</p>
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
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

            <!-- Customer Information -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Customer Information</h2>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600">Name</p>
                        <p class="font-semibold text-gray-900">{{ $order->user->name ?? 'Guest' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="font-semibold text-gray-900">{{ $order->email }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Phone</p>
                        <p class="font-semibold text-gray-900">{{ $order->phone }}</p>
                    </div>
                    @if($order->shipping_address)
                    <div>
                        <p class="text-sm text-gray-600">Shipping Address</p>
                        <p class="font-semibold text-gray-900 whitespace-pre-line">{{ $order->shipping_address }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

