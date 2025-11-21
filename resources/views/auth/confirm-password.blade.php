<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Confirm Password</h2>
        <p class="text-gray-600">This is a secure area of the application. Please confirm your password before continuing.</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <input id="password" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 @error('password') border-red-500 @enderror"
                   type="password"
                   name="password"
                   required 
                   autocomplete="current-password"
                   placeholder="Enter your password">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <button type="submit" class="w-full bg-pink-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-pink-600 transition duration-300 uppercase">
            Confirm
        </button>
    </form>
</x-guest-layout>
