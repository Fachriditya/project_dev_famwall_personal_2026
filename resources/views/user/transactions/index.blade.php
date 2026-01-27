<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Transaksi Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Summary Stats --}}
            <div class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">
                {{-- Saldo --}}
                <div class="bg-white overflow-hidden shadow-lg hover:shadow-xl sm:rounded-2xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="p-6 text-center">
                        <div class="inline-block p-3 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl mb-3">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Saldo Saya</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">
                            Rp {{ number_format($summary->saldo ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                {{-- Total Masuk --}}
                <div class="bg-white overflow-hidden shadow-lg hover:shadow-xl sm:rounded-2xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="p-6 text-center">
                        <div class="inline-block p-3 bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl mb-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                            </svg>
                        </div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Total Masuk</p>
                        <p class="text-3xl font-bold text-green-600">
                            Rp {{ number_format($summary->total_masuk ?? 0, 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-gray-500 mt-2 font-medium">{{ $summary->jumlah_nabung ?? 0 }} transaksi</p>
                    </div>
                </div>

                {{-- Total Keluar --}}
                <div class="bg-white overflow-hidden shadow-lg hover:shadow-xl sm:rounded-2xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="p-6 text-center">
                        <div class="inline-block p-3 bg-gradient-to-br from-red-100 to-rose-100 rounded-xl mb-3">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                            </svg>
                        </div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Total Keluar</p>
                        <p class="text-3xl font-bold text-red-600">
                            Rp {{ number_format($summary->total_keluar ?? 0, 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-gray-500 mt-2 font-medium">{{ $summary->jumlah_tarik ?? 0 }} transaksi</p>
                    </div>
                </div>

                {{-- Total Transaksi --}}
                <div class="bg-white overflow-hidden shadow-lg hover:shadow-xl sm:rounded-2xl transform hover:-translate-y-1 transition-all duration-300">
                    <div class="p-6 text-center">
                        <div class="inline-block p-3 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl mb-3">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Total Transaksi</p>
                        <p class="text-3xl font-bold text-blue-600">
                            {{ $summary->total_transaksi ?? 0 }}
                        </p>
                        <p class="text-xs text-gray-500 mt-2 font-medium">seluruh waktu</p>
                    </div>
                </div>
            </div>

            {{-- Info Box --}}
            <div class="mb-6 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-500 rounded-r-lg shadow-sm">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <h4 class="text-sm font-semibold text-blue-800 mb-1">Informasi</h4>
                        <p class="text-sm text-blue-700">
                            Ini adalah riwayat transaksi Anda. Untuk menambah transaksi, silakan hubungi <span class="font-semibold">Admin</span>.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Transactions Table --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-6 text-gray-900">
                    
                    @if($transactions->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="bg-gradient-to-r from-primary-50 to-purple-50">
                                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-700">Tanggal</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-700">Jenis</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-700">Jumlah</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-700">Catatan</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-700">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @php
                                        $runningSaldo = $summary->saldo ?? 0;
                                    @endphp
                                    @foreach($transactions as $index => $transaction)
                                    @php
                                        // Hitung saldo running (dari terbaru ke terlama)
                                        if ($index > 0) {
                                            $prevTransaction = $transactions[$index - 1];
                                            if ($prevTransaction->jenis_transaksi == 'M') {
                                                $runningSaldo -= $prevTransaction->jumlah;
                                            } else {
                                                $runningSaldo += $prevTransaction->jumlah;
                                            }
                                        }
                                        
                                        // Saldo setelah transaksi ini
                                        $saldoAfter = $runningSaldo;
                                    @endphp
                                    <tr class="hover:bg-purple-50 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</div>
                                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($transaction->created_at)->format('H:i') }} WIB</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($transaction->jenis_transaksi == 'M')
                                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-semibold bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                                    </svg>
                                                    Masuk
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-semibold bg-gradient-to-r from-red-100 to-rose-100 text-red-800 border border-red-200">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                                                    </svg>
                                                    Keluar
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-bold {{ $transaction->jenis_transaksi == 'M' ? 'text-green-600' : 'text-red-600' }}">
                                                {{ $transaction->jenis_transaksi == 'M' ? '+' : '-' }} Rp {{ number_format($transaction->jumlah, 0, ',', '.') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 max-w-xs">
                                            <div class="text-sm text-gray-600">
                                                {{ $transaction->note ?? '-' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="inline-flex items-center px-3 py-1 rounded-lg bg-primary-50 border border-primary-200">
                                                <span class="text-sm font-bold text-primary-700">
                                                    Rp {{ number_format($saldoAfter, 0, ',', '.') }}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-6">
                            {{ $transactions->links() }}
                        </div>
                    @else
                        {{-- Empty State --}}
                        <div class="text-center py-16">
                            <div class="inline-block p-6 bg-gradient-to-br from-primary-100 to-purple-100 rounded-full mb-6">
                                <svg class="mx-auto h-16 w-16 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada transaksi</h3>
                            <p class="text-gray-600 mb-2">Hubungi admin untuk menambahkan transaksi pertama Anda</p>
                            <p class="text-sm text-gray-500">Transaksi akan muncul di sini setelah ditambahkan oleh admin</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>