<x-guest-layout>
    
    {{-- Header --}}
    <div class="mb-8">
        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">LOGIN</h2>
        <p class="text-xs text-gray-500">Login untuk melihat Saldo dan Transaksi. Untuk pilihan Register silahkan hubungi Admin</p>
    </div>

    {{-- Session Status --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        {{-- Username --}}
        <div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <input
                    id="username"
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Username"
                    class="block w-full pl-10 pr-4 py-3 bg-gray-50 border-0 rounded-lg focus:ring-2 focus:ring-primary-500 focus:bg-white transition-all duration-200"
                />
            </div>
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Password"
                    class="block w-full pl-10 pr-4 py-3 bg-gray-50 border-0 rounded-lg focus:ring-2 focus:ring-primary-500 focus:bg-white transition-all duration-200"
                />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Login Button --}}
        <div class="pt-2">
            <button type="submit" class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                Login Now
            </button>
        </div>
    </form>
    
    {{-- Footer --}}
    <div class="mt-6 text-center">
        <p class="text-xs text-gray-400">
            © {{ date('Y') }} Family Wallet. All rights reserved.
        </p>
    </div>

</x-guest-layout>