@extends('layouts.app')

@section('content')
<div class="flex">

    <aside class="w-64 min-h-screen bg-white shadow-md border-r">
        <div class="p-6 border-b">
            <h2 class="text-2xl font-bold text-gray-800">Admin Panel</h2>
        </div>

        <nav class="mt-4 space-y-1">
            <a href="{{ route('products.index') }}" class="flex items-center gap-2 px-6 py-3 rounded-md transition-all hover:bg-gray-100 hover:pl-7
              {{ request()->routeIs('products.*') ? 'bg-gray-200 font-semibold text-blue-600' : '' }}">
                📦 <span>Products</span>
            </a>

            <a href="{{ route('admin.orders') }}" class="flex items-center gap-2 px-6 py-3 rounded-md transition-all hover:bg-gray-100 hover:pl-7
                {{ request()->routeIs('admin.orders*') ? 'bg-gray-200 font-semibold text-blue-600' : '' }}">
                🧾 <span>Orders</span>
            </a>

             <a href="{{ route('admin.customerordersdetails') }}" class="flex items-center gap-2 px-6 py-3 rounded-md transition-all hover:bg-gray-100 hover:pl-7
                {{ request()->routeIs('admin.orders*') ? 'bg-gray-200 font-semibold text-blue-600' : '' }}">
                🧾 <span>Customer Details</span>
            </a>

            <a href="{{ route('users.index') }}" class="flex items-center gap-2 px-6 py-3 rounded-md transition-all hover:bg-gray-100 hover:pl-7
                {{ request()->routeIs('users.*') ? 'bg-gray-200 font-semibold text-blue-600' : '' }}">
                👥 <span>Users</span>
            </a>

            <a href="{{ route('roles.index') }}" class="flex items-center gap-2 px-6 py-3 rounded-md transition-all hover:bg-gray-100 hover:pl-7
                {{ request()->routeIs('roles.*') ? 'bg-gray-200 font-semibold text-blue-600' : '' }}">
                🛡 <span>Roles</span>
            </a>

            {{-- <a href="{{ route('profile.edit') }}" class="block px-6 py-3 hover:bg-gray-100 {{ request()->routeIs('profile.*') ? 'bg-gray-200 font-bold' : '' }}">
                🙍 Profile
            </a>
            <a href="{{ route('home') }}" class="block px-6 py-3 hover:bg-gray-100">
                🌐 Frontend
            </a>  --}}
        </nav>
    </aside>

    <main class="flex-1 p-6">
        @yield('admin-content')
    </main>

</div>
@endsection
