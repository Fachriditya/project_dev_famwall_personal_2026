<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Tambah Transaksi Baru') }}
                </h2>
                <p class="text-sm text-gray-600 mt-1">Catat transaksi masuk atau keluar</p>
            </div>
            <a href="{{ route('admin.transactions.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-lg font-semibold text-sm text-gray-700 shadow-sm transition-all duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Error Messages --}}
            @if($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-sm">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-red-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <h3 class="text-sm font-bold text-red-800">Terdapat beberapa kesalahan:</h3>
                            <ul class="mt-2 list-disc list-inside text-sm text-red-700">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-red-800 font-medium">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-8">
                    
                    <form method="POST" action="{{ route('admin.transactions.store') }}" class="space-y-6">
                        @csrf

                        {{-- User --}}
                        <div>
                            <label for="user_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                Pilih User <span class="text-red-500">*</span>
                            </label>
                            <select name="user_id" id="user_id" required 
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-2 focus:ring-primary-500 transition-all duration-200 @error('user_id') border-red-500 @enderror">
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->nama }} ({{ $user->username }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jenis Transaksi --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Jenis Transaksi <span class="text-red-500">*</span>
                            </label>
                            <div class="grid grid-cols-2 gap-4">
                                {{-- Masuk --}}
                                <label class="relative flex cursor-pointer rounded-xl border-2 p-5 hover:shadow-md transition-all duration-200 @error('jenis_transaksi') border-red-500 @else border-gray-200 hover:border-green-300 @enderror">
                                    <input type="radio" name="jenis_transaksi" value="M" class="mt-1" {{ old('jenis_transaksi') == 'M' ? 'checked' : '' }} required>
                                    <span class="flex flex-col ml-3 flex-1">
                                        <span class="flex items-center mb-1">
                                            <div class="p-1.5 bg-green-100 rounded-lg mr-2">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                                </svg>
                                            </div>
                                            <span class="text-sm font-bold text-gray-900">Masuk (Nabung)</span>
                                        </span>
                                        <span class="text-xs text-gray-500">Uang masuk ke saldo user</span>
                                    </span>
                                </label>

                                {{-- Keluar --}}
                                <label class="relative flex cursor-pointer rounded-xl border-2 p-5 hover:shadow-md transition-all duration-200 @error('jenis_transaksi') border-red-500 @else border-gray-200 hover:border-red-300 @enderror">
                                    <input type="radio" name="jenis_transaksi" value="K" class="mt-1" {{ old('jenis_transaksi') == 'K' ? 'checked' : '' }} required>
                                    <span class="flex flex-col ml-3 flex-1">
                                        <span class="flex items-center mb-1">
                                            <div class="p-1.5 bg-red-100 rounded-lg mr-2">
                                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                                                </svg>
                                            </div>
                                            <span class="text-sm font-bold text-gray-900">Keluar (Tarik)</span>
                                        </span>
                                        <span class="text-xs text-gray-500">Tarik uang dari saldo user</span>
                                    </span>
                                </label>
                            </div>
                            @error('jenis_transaksi')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jumlah --}}
                        <div>
                            <label for="jumlah" class="block text-sm font-semibold text-gray-700 mb-2">
                                Jumlah <span class="text-red-500">*</span>
                            </label>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-gray-500 font-medium">Rp</span>
                                </div>
                                <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" required min="1"
                                    class="pl-14 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-2 focus:ring-primary-500 transition-all duration-200 @error('jumlah') border-red-500 @enderror"
                                    placeholder="0">
                            </div>
                            <p class="mt-2 text-xs text-gray-500">Masukkan jumlah dalam Rupiah (minimal Rp 1)</p>
                            @error('jumlah')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Note --}}
                        <div>
                            <label for="note" class="block text-sm font-semibold text-gray-700 mb-2">
                                Catatan <span class="text-gray-500 font-normal">(Opsional)</span>
                            </label>
                            <textarea name="note" id="note" rows="3" 
                                      class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-2 focus:ring-primary-500 transition-all duration-200 @error('note') border-red-500 @enderror"
                                      placeholder="Contoh: Gaji bulan Januari, Bayar listrik, dll">{{ old('note') }}</textarea>
                            <p class="mt-2 text-xs text-gray-500">Maksimal 500 karakter</p>
                            @error('note')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Preview Summary --}}
                        <div id="summary" class="p-5 bg-gradient-to-r from-primary-50 to-purple-50 border-l-4 border-primary-500 rounded-r-lg shadow-sm hidden">
                            <h4 class="text-sm font-bold text-gray-800 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Ringkasan Transaksi
                            </h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 font-medium">User:</span>
                                    <span id="summary-user" class="font-bold text-gray-900">-</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 font-medium">Jenis:</span>
                                    <span id="summary-jenis" class="font-bold">-</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 font-medium">Jumlah:</span>
                                    <span id="summary-jumlah" class="font-bold text-lg text-gray-900">-</span>
                                </div>
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="flex items-center justify-end space-x-3 pt-6 border-t">
                            <a href="{{ route('admin.transactions.index') }}" class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-300 rounded-lg font-semibold text-sm text-gray-700 shadow-sm hover:bg-gray-50 transition-all duration-200">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 border border-transparent rounded-lg font-semibold text-sm text-white shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Transaksi
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radioInputs = document.querySelectorAll('input[type="radio"][name="jenis_transaksi"]');
            
            radioInputs.forEach(radio => {
                radio.addEventListener('change', function() {
                    radioInputs.forEach(r => {
                        const label = r.closest('label');
                        label.classList.remove('border-primary-500', 'ring-2', 'ring-primary-200', 'bg-primary-50');
                    });
                    if (this.checked) {
                        const label = this.closest('label');
                        label.classList.add('border-primary-500', 'ring-2', 'ring-primary-200', 'bg-primary-50');
                    }
                    updateSummary();
                });
            });
            
            function updateSummary() {
                const user = document.getElementById('user_id');
                const jenis = document.querySelector('input[name="jenis_transaksi"]:checked');
                const jumlah = document.getElementById('jumlah');
                
                if (user.value && jenis && jumlah.value) {
                    document.getElementById('summary').classList.remove('hidden');
                    document.getElementById('summary-user').textContent = user.options[user.selectedIndex].text;
                    
                    const jenisText = jenis.value === 'M' ? 'Masuk (Nabung)' : 'Keluar (Tarik)';
                    const jenisColor = jenis.value === 'M' ? 'text-green-600' : 'text-red-600';
                    const jenisEl = document.getElementById('summary-jenis');
                    jenisEl.textContent = jenisText;
                    jenisEl.className = `font-bold ${jenisColor}`;
                    
                    const formattedJumlah = 'Rp ' + parseInt(jumlah.value).toLocaleString('id-ID');
                    document.getElementById('summary-jumlah').textContent = formattedJumlah;
                } else {
                    document.getElementById('summary').classList.add('hidden');
                }
            }

            document.getElementById('user_id').addEventListener('change', updateSummary);
            document.getElementById('jumlah').addEventListener('input', updateSummary);
            document.getElementById('jumlah').addEventListener('blur', function() {
                if (this.value) {
                    this.value = Math.round(this.value);
                }
            });
        });
    </script>
    @endpush
</x-app-layout>