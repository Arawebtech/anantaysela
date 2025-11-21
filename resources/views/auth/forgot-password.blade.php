<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Forgot Password</h2>
        <p class="text-gray-600">No problem. Just let us know your email address and we will email you a password reset link.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
            <input id="email" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 @error('email') border-red-500 @enderror" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus
                   placeholder="Enter your email">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <button type="submit" class="w-full bg-pink-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-pink-600 transition duration-300 uppercase">
            Email Password Reset Link
        </button>

        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-sm text-pink-600 hover:text-pink-800">
                ← Back to Login
            </a>
        </div>
    </form>
</x-guest-layout>
