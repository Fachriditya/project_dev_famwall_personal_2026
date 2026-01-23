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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <p class="text-xs font-medium text-gray-500 uppercase">Saldo Saya</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">
                            Rp {{ number_format($summary->saldo ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                {{-- Total Masuk --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <p class="text-xs font-medium text-gray-500 uppercase">Total Masuk</p>
                        <p class="text-2xl font-bold text-green-600 mt-1">
                            Rp {{ number_format($summary->total_masuk ?? 0, 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">{{ $summary->jumlah_nabung ?? 0 }} transaksi</p>
                    </div>
                </div>

                {{-- Total Keluar --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <p class="text-xs font-medium text-gray-500 uppercase">Total Keluar</p>
                        <p class="text-2xl font-bold text-red-600 mt-1">
                            Rp {{ number_format($summary->total_keluar ?? 0, 0, ',', '.') }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">{{ $summary->jumlah_tarik ?? 0 }} transaksi</p>
                    </div>
                </div>

                {{-- Total Transaksi --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <p class="text-xs font-medium text-gray-500 uppercase">Total Transaksi</p>
                        <p class="text-2xl font-bold text-indigo-600 mt-1">
                            {{ $summary->total_transaksi ?? 0 }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">seluruh waktu</p>
                    </div>
                </div>
            </div>

            {{-- Info Box --}}
            <div class="mb-4 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">
                            Ini adalah riwayat transaksi Anda. Untuk menambah transaksi, silakan hubungi <strong>Admin</strong>.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Transactions Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if($transactions->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
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
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</div>
                                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($transaction->created_at)->format('H:i') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($transaction->jenis_transaksi == 'M')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                                    </svg>
                                                    Masuk
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                                                    </svg>
                                                    Keluar
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold {{ $transaction->jenis_transaksi == 'M' ? 'text-green-600' : 'text-red-600' }}">
                                                {{ $transaction->jenis_transaksi == 'M' ? '+' : '-' }} Rp {{ number_format($transaction->jumlah, 0, ',', '.') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500">
                                                {{ $transaction->note ?? '-' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                Rp {{ number_format($saldoAfter, 0, ',', '.') }}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-4">
                            {{ $transactions->links() }}
                        </div>
                    @else
                        {{-- Empty State --}}
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada transaksi</h3>
                            <p class="mt-1 text-sm text-gray-500">Hubungi admin untuk menambahkan transaksi.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>