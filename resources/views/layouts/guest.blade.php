<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-primary-400 via-primary-500 to-primary-700">
        
        <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
            
            {{-- Decorative Background Elements --}}
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-20 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-20 right-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute top-1/2 left-1/3 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                <div class="absolute top-10 right-1/4 w-3 h-3 bg-white/40 rounded-full animate-pulse"></div>
                <div class="absolute bottom-32 left-1/4 w-2 h-2 bg-white/30 rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
            </div>

            {{-- Card Container --}}
            <div class="relative w-full max-w-5xl">
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                    <div class="flex flex-col lg:flex-row">
                        
                        {{-- LEFT SIDE - Purple Info --}}
                        <div class="lg:w-1/2 bg-gradient-to-br from-primary-500 via-primary-600 to-primary-700 p-12 flex flex-col justify-center items-center text-white relative overflow-hidden">
                            
                            {{-- Decorative Circles --}}
                            <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                            <div class="absolute bottom-10 right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                            
                            {{-- Content --}}
                            <div class="relative z-10 text-center">
                                {{-- Icon --}}
                                <div class="mb-8">
                                    <div class="w-20 h-20 mx-auto bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-lg">
                                        <svg class="w-11 h-11 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                
                                {{-- Text --}}
                                <p class="text-xs uppercase tracking-widest mb-3 text-white/80">Nice to see you again</p>
                                <h1 class="text-4xl lg:text-5xl font-bold mb-4 leading-tight">
                                    WELCOME BACK
                                </h1>
                                <div class="w-12 h-1 bg-white mx-auto mb-6 rounded-full"></div>
                                <p class="text-white/90 text-sm leading-relaxed max-w-sm mx-auto">
                                    Kelola keuangan keluarga Anda dengan mudah. Catat setiap transaksi, pantau saldo, dan capai tujuan finansial bersama.
                                </p>
                            </div>
                            
                            {{-- Decorative dots --}}
                            <div class="absolute top-16 right-16 w-2 h-2 bg-white/40 rounded-full animate-pulse"></div>
                            <div class="absolute bottom-24 left-16 w-2 h-2 bg-white/30 rounded-full animate-pulse" style="animation-delay: 0.7s;"></div>
                        </div>

                        {{-- RIGHT SIDE - Login Form --}}
                        <div class="lg:w-1/2 p-8 lg:p-12 bg-white">
                            {{ $slot }}
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </body>
</html>