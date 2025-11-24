@extends('layouts.frontend')

@section('title', 'My Dashboard - ANANTA YSELA')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-8">
        {{-- <h1 class="text-4xl font-serif font-bold text-gray-900 mb-2">Welcome back, {{ auth()->user()->name }}!</h1> --}}
        <h1 class="text-4xl font-serif font-bold text-gray-900 mb-2">Welcome back, {{ optional(Auth::guard('customer')->user())->first_name }}!</h1>
        <p class="text-gray-600">Manage your account, orders, and wishlist</p>
    </div>

    <!-- Quick Stats for User -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Orders</p>
                    {{-- <p class="text-3xl font-bold text-gray-900">{{ auth()->user()->orders()->count() }}</p> --}}
                    <p class="text-3xl font-bold text-gray-900">{{ Auth::guard('customer')->user()->orders()->count() }}</p>

                </div>
                <svg class="w-12 h-12 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Wishlist Items</p>
                    {{-- <p class="text-3xl font-bold text-gray-900">{{ auth()->user()->wishlists()->count() }}</p> --}}
                     <p class="text-3xl font-bold text-gray-900">{{ Auth::guard('customer')->user()->wishlists()->count() }}</p>
                </div>
                <svg class="w-12 h-12 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Cart Items</p>
                    {{-- <p class="text-3xl font-bold text-gray-900">{{ auth()->user()->carts()->sum('quantity') }}</p> --}}
                    <p class="text-3xl font-bold text-gray-900">
                        {{ Auth::guard('customer')->check() ? Auth::guard('customer')->user()->carts()->sum('quantity') : 0 }}
                    </p>
                </div>
                <svg class="w-12 h-12 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Orders Card -->
        <a href="{{ route('orders.index') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">My Orders</h3>
                    <p class="text-gray-600 text-sm">View your order history</p>
                </div>
                <svg class="w-12 h-12 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </div>
        </a>

        <!-- Wishlist Card -->
        <a href="{{ route('wishlist') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">My Wishlist</h3>
                    <p class="text-gray-600 text-sm">View your saved items</p>
                </div>
                <svg class="w-12 h-12 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
        </a>

        <!-- Profile Card -->
        <a href="{{ route('profile.edit') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">My Profile</h3>
                    <p class="text-gray-600 text-sm">Update your information</p>
                </div>
                <svg class="w-12 h-12 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
        </a>
    </div>

    <!-- Recent Orders -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-serif font-bold text-gray-900">Recent Orders</h2>
            <a href="{{ route('orders.index') }}" class="text-pink-600 hover:text-pink-800 font-semibold">View All →</a>
        </div>
        @php
            // $recentOrders = auth()->user()->orders()->latest()->take(5)->get();
            $customer = auth('customer')->user();
            $recentOrders = $customer ? $customer->orders()->latest()->take(5)->get() : collect([]);
        @endphp
        
        @if($recentOrders->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Order Number</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Date</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Total</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Status</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $order->order_number }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="py-3 px-4 font-semibold">₹{{ number_format($order->total_amount, 2) }}</td>
                            <td class="py-3 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('orders.show', $order->id) }}" class="text-pink-600 hover:text-pink-800 font-semibold">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <p class="text-gray-500 mb-4 text-lg">No orders yet.</p>
                <a href="{{ route('shop.index') }}" class="inline-block bg-pink-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-pink-600 transition">
                    Start Shopping
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
