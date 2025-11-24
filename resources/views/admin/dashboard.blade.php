@extends('layouts.admin')

@section('admin-content')

    <div class="flex">
        <main class="flex-1 p-6">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Admin Dashboard</h1>
                <p class="text-gray-600">Manage your e-commerce platform</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
                    <p class="text-blue-100 text-sm mb-1">Total Products</p>
                    <p class="text-4xl font-bold">{{ App\Models\Product::count() }}</p>
                </div>

                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow-lg p-6 text-white">
                    <p class="text-green-100 text-sm mb-1">Total Users</p>
                    <p class="text-4xl font-bold">{{ App\Models\User::count() }}</p>
                </div>

                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white">
                    <p class="text-purple-100 text-sm mb-1">Total Orders</p>
                    <p class="text-4xl font-bold">{{ App\Models\Order::count() }}</p>
                </div>

                <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg shadow-lg p-6 text-white">
                    <p class="text-orange-100 text-sm mb-1">Total Revenue</p>
                    <p class="text-4xl font-bold">₹{{ number_format(App\Models\Order::sum('total_amount'), 0) }}</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Recent Orders</h2>
                    <a href="{{ route('admin.orders') }}" class="text-pink-600 hover:text-pink-800 font-semibold">View All
                        →</a>
                </div>

                @php
                    $recentOrders = App\Models\Order::with('user','customer')->latest()->take(10)->get();
                    
                @endphp

                @if ($recentOrders->count() > 0)
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b bg-gray-50">
                                <th class="py-3 px-4">Order Number</th>
                                <th class="py-3 px-4">Customer</th>
                                
                                <th class="py-3 px-4">Date</th>
                                <th class="py-3 px-4">Total</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentOrders as $order)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $order->order_number }}</td>
                                    <td class="py-3 px-4">{{ $order->customer->first_name ?? 'Guest' }}</td>
                                    <td class="py-3 px-4 text-gray-600">{{ $order->created_at->format('M d, Y H:i') }}</td>
                                    <td class="py-3 px-4 font-semibold">₹{{ number_format($order->total_amount, 2) }}</td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-semibold
                                        {{ $order->status === 'completed'
                                            ? 'bg-green-100 text-green-800'
                                            : ($order->status === 'pending'
                                                ? 'bg-yellow-100 text-yellow-800'
                                                : 'bg-red-100 text-red-800') }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="text-pink-600 hover:text-pink-800 font-semibold">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500 text-center py-8">No orders yet.</p>
                @endif
            </div>
        </main>
    </div>
    
@endsection
