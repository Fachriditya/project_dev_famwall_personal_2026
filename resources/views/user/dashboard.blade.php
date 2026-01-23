<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: #1f2937;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- CARD 1: TOTAL SALDO KELUARGA --}}
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center" style="color: #1f2937;">
                        <h3 class="text-sm font-medium uppercase tracking-wider mb-2" style="color: #6b7280;">Total Saldo Keluarga</h3>
                        <p class="text-4xl font-bold" style="color: #1f2937;">
                            Rp {{ number_format($totalSaldo->saldo ?? 0, 0, ',', '.') }}
                        </p>
                        <div class="mt-4 grid grid-cols-2 gap-4 text-sm">
                            <div class="text-center">
                                <p style="color: #6b7280;">Total Masuk</p>
                                <p class="text-green-600 font-semibold">
                                    Rp {{ number_format($totalSaldo->total_masuk ?? 0, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-center">
                                <p style="color: #6b7280;">Total Keluar</p>
                                <p class="text-red-600 font-semibold">
                                    Rp {{ number_format($totalSaldo->total_keluar ?? 0, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CARD 2: TRANSAKSI USER INI --}}
            <div class="mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold" style="color: #1f2937;">💰 Transaksi Saya</h3>
                            <div class="text-right">
                                <p class="text-xs" style="color: #6b7280;">Saldo Saya</p>
                                <p class="text-2xl font-bold" style="color: #1f2937;">
                                    Rp {{ number_format($userStats->saldo ?? 0, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Total Masuk --}}
                            <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs font-medium text-green-600 uppercase">Total Masuk</p>
                                        <p class="text-2xl font-bold text-green-700 mt-1">
                                            Rp {{ number_format($userStats->total_masuk ?? 0, 0, ',', '.') }}
                                        </p>
                                        <p class="text-xs text-green-600 mt-2">
                                            {{ $userStats->jumlah_nabung ?? 0 }} transaksi
                                        </p>
                                    </div>
                                    <div class="p-3 bg-green-100 rounded-full">
                                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Total Keluar --}}
                            <div class="bg-red-50 rounded-lg p-4 border border-red-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs font-medium text-red-600 uppercase">Total Keluar</p>
                                        <p class="text-2xl font-bold text-red-700 mt-1">
                                            Rp {{ number_format($userStats->total_keluar ?? 0, 0, ',', '.') }}
                                        </p>
                                        <p class="text-xs text-red-600 mt-2">
                                            {{ $userStats->jumlah_tarik ?? 0 }} transaksi
                                        </p>
                                    </div>
                                    <div class="p-3 bg-red-100 rounded-full">
                                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CARD 3: LEADERBOARD --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold" style="color: #1f2937;">🏆 Leaderboard Top User</h3>
                    </div>

                    @if($leaderboard->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color: #6b7280;">Ranking</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color: #6b7280;">Nama</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color: #6b7280;">Saldo</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color: #6b7280;">Kontribusi</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color: #6b7280;">Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($leaderboard as $user)
                                    <tr class="hover:bg-gray-50 {{ $user->id == Auth::id() ? 'bg-indigo-50' : '' }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if($user->ranking == 1)
                                                    <span class="text-2xl">🥇</span>
                                                @elseif($user->ranking == 2)
                                                    <span class="text-2xl">🥈</span>
                                                @elseif($user->ranking == 3)
                                                    <span class="text-2xl">🥉</span>
                                                @else
                                                    <span class="text-sm font-semibold" style="color: #1f2937;">#{{ $user->ranking }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    @if($user->photo)
                                                        <img class="h-10 w-10 rounded-full" src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->nama }}">
                                                    @else
                                                        <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                            <span class="text-indigo-600 font-semibold text-sm">{{ substr($user->nama, 0, 1) }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium" style="color: #1f2937;">
                                                        {{ $user->nama }}
                                                        @if($user->id == Auth::id())
                                                            <span class="ml-2 text-xs bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded">Anda</span>
                                                        @endif
                                                    </div>
                                                    <div class="text-sm" style="color: #6b7280;">{{ $user->username }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold" style="color: #1f2937;">Rp {{ number_format($user->saldo, 0, ',', '.') }}</div>
                                            <div class="text-xs" style="color: #6b7280;">
                                                <span class="text-green-600">+{{ number_format($user->total_masuk, 0, ',', '.') }}</span> 
                                                <span class="text-red-600">-{{ number_format($user->total_keluar, 0, ',', '.') }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-16 bg-gray-200 rounded-full h-2 mr-2">
                                                    <div class="bg-indigo-600 h-2 rounded-full" style="width: {{ $user->persentase_kontribusi }}%"></div>
                                                </div>
                                                <span class="text-sm font-medium" style="color: #1f2937;">{{ number_format($user->persentase_kontribusi, 1) }}%</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm" style="color: #6b7280;">
                                            {{ $user->total_transaksi }} transaksi
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8" style="color: #6b7280;">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                            <p class="mt-2">Belum ada data user</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>