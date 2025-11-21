<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'ANANTA YSELA - Fashion Store')</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <!-- Tailwind CSS CDN (for production) -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .pink-gradient {
                background: linear-gradient(135deg, #fce7f3 0%, #fbcfe8 100%);
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-white">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Center: Logo -->
                    <div class="flex-1 flex justify-center">
                        <a href="{{ route('home') }}" class="flex flex-col items-center">
                            <svg class="w-8 h-8 text-pink-500 mb-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                            </svg>
                            <span class="text-xl font-bold text-gray-900">ANANTA YSELA</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    {{ $slot }}
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-8 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h3 class="text-xl font-bold mb-2">ANANTA YSELA</h3>
                    <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} ANANTA YSELA. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
