@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Admin Dashboard</h1>
        <p class="text-gray-600">Manage your e-commerce platform</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm mb-1">Total Products</p>
                    <p class="text-4xl font-bold">{{ App\Models\Product::count() }}</p>
                </div>
                <svg class="w-16 h-16 text-blue-200 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <a href="{{ route('products.index') }}" class="mt-4 inline-block text-blue-100 hover:text-white text-sm font-semibold">
                Manage Products →
            </a>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm mb-1">Total Users</p>
                    <p class="text-4xl font-bold">{{ App\Models\User::count() }}</p>
                </div>
                <svg class="w-16 h-16 text-green-200 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <a href="{{ route('users.index') }}" class="mt-4 inline-block text-green-100 hover:text-white text-sm font-semibold">
                Manage Users →
            </a>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm mb-1">Total Orders</p>
                    <p class="text-4xl font-bold">{{ App\Models\Order::count() }}</p>
                </div>
                <svg class="w-16 h-16 text-purple-200 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </div>
            <a href="{{ route('admin.orders') }}" class="mt-4 inline-block text-purple-100 hover:text-white text-sm font-semibold">
                Manage Orders →
            </a>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm mb-1">Total Revenue</p>
                    <p class="text-4xl font-bold">₹{{ number_format(App\Models\Order::sum('total_amount'), 0) }}</p>
                </div>
                <svg class="w-16 h-16 text-orange-200 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <a href="{{ route('admin.orders') }}" class="mt-4 inline-block text-orange-100 hover:text-white text-sm font-semibold">
                View Reports →
            </a>
        </div>
    </div>

    <!-- Admin Management Links -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Management Panel</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Products Management -->
            <a href="{{ route('products.index') }}" class="block p-5 border-2 border-gray-200 rounded-lg hover:border-pink-500 hover:bg-pink-50 transition group">
                <div class="flex items-center space-x-4">
                    <div class="bg-pink-100 group-hover:bg-pink-500 p-3 rounded-lg transition">
                        <svg class="w-8 h-8 text-pink-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 group-hover:text-pink-600">Products</h3>
                        <p class="text-sm text-gray-600">Manage all products</p>
                    </div>
                </div>
            </a>

            <!-- Users Management -->
            <a href="{{ route('users.index') }}" class="block p-5 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition group">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-100 group-hover:bg-blue-500 p-3 rounded-lg transition">
                        <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 group-hover:text-blue-600">Users</h3>
                        <p class="text-sm text-gray-600">Manage all users</p>
                    </div>
                </div>
            </a>

            <!-- Roles Management -->
            <a href="{{ route('roles.index') }}" class="block p-5 border-2 border-gray-200 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition group">
                <div class="flex items-center space-x-4">
                    <div class="bg-purple-100 group-hover:bg-purple-500 p-3 rounded-lg transition">
                        <svg class="w-8 h-8 text-purple-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 group-hover:text-purple-600">Roles</h3>
                        <p class="text-sm text-gray-600">Manage user roles</p>
                    </div>
                </div>
            </a>

            <!-- Orders Management -->
            <a href="{{ route('admin.orders') }}" class="block p-5 border-2 border-gray-200 rounded-lg hover:border-green-500 hover:bg-green-50 transition group">
                <div class="flex items-center space-x-4">
                    <div class="bg-green-100 group-hover:bg-green-500 p-3 rounded-lg transition">
                        <svg class="w-8 h-8 text-green-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 group-hover:text-green-600">Orders</h3>
                        <p class="text-sm text-gray-600">View and manage orders</p>
                    </div>
                </div>
            </a>

            <!-- Profile -->
            <a href="{{ route('profile.edit') }}" class="block p-5 border-2 border-gray-200 rounded-lg hover:border-yellow-500 hover:bg-yellow-50 transition group">
                <div class="flex items-center space-x-4">
                    <div class="bg-yellow-100 group-hover:bg-yellow-500 p-3 rounded-lg transition">
                        <svg class="w-8 h-8 text-yellow-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 group-hover:text-yellow-600">Profile</h3>
                        <p class="text-sm text-gray-600">Update your profile</p>
                    </div>
                </div>
            </a>

            <!-- Frontend -->
            <a href="{{ route('home') }}" class="block p-5 border-2 border-gray-200 rounded-lg hover:border-indigo-500 hover:bg-indigo-50 transition group">
                <div class="flex items-center space-x-4">
                    <div class="bg-indigo-100 group-hover:bg-indigo-500 p-3 rounded-lg transition">
                        <svg class="w-8 h-8 text-indigo-600 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 group-hover:text-indigo-600">Frontend</h3>
                        <p class="text-sm text-gray-600">Go to website</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Recent Orders</h2>
            <a href="{{ route('admin.orders') }}" class="text-pink-600 hover:text-pink-800 font-semibold">View All →</a>
        </div>
        @php
            $recentOrders = App\Models\Order::with('user')->latest()->take(10)->get();
        @endphp 
        @if($recentOrders->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Order Number</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Customer</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Date</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Total</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Status</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4 font-medium">{{ $order->order_number }}</td>
                            <td class="py-3 px-4">{{ $order->user->name ?? 'Guest' }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ $order->created_at->format('M d, Y H:i') }}</td>
                            <td class="py-3 px-4 font-semibold">₹{{ number_format($order->total_amount, 2) }}</td>
                            <td class="py-3 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="text-pink-600 hover:text-pink-800 font-semibold">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500 text-center py-8">No orders yet.</p>
        @endif
    </div>
</div>
@endsection
