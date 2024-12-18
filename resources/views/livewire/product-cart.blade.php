<div>
    @foreach ($products as $index => $product)
        <div class="flex items-center justify-between border-b p-4 hover:shadow-lg transition-shadow duration-300">
            <!-- Checkbox -->
            <input type="checkbox"
                class="mr-4 w-5 h-5 text-blue-600 border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                wire:click="toggleSelection({{ $index }})" {{ $selected[$index] ? 'checked' : '' }}>

            <!-- Gambar Produk -->
            <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden shadow-md">
                <img src="{{ asset($product['productImage']) }}" alt="Product Image" class="w-full h-full object-cover">
            </div>

            <!-- Informasi Produk -->
            <div class="flex-1 ml-4">
                <h3 class="text-md font-semibold text-gray-800 hover:text-blue-600 transition-colors duration-300">
                    {{$product['productName'] }}
                </h3>
                <div class="flex items-center mt-1">
                    <!-- Harga -->
                    <span
                        class="text-sm text-red-600 font-semibold">Rp{{ number_format($product['productPrice'], 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Harga Total dan Input Jumlah -->
            <div class="flex flex-col items-start ml-4 space-y-2">
                <!-- Harga Total -->
                <div class="text-sm text-red-600 font-semibold">
                    Rp{{ number_format($this->getTotalPrice($index), 0, ',', '.') }}
                </div>

                <!-- Input Jumlah -->
                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                    <button
                        class="w-8 h-8 flex items-center justify-center border-r text-gray-600 hover:bg-gray-200 transition-colors duration-300"
                        wire:click="decreaseQuantity({{ $index }})">−</button>
                    <input type="text" value="{{ $quantities[$index] ?? 1 }}"
                        class="w-10 h-8 text-center text-sm border-0 focus:ring-0" wire:model="quantities.{{ $index }}">
                    <button
                        class="w-8 h-8 flex items-center justify-center border-l text-gray-600 hover:bg-gray-200 transition-colors duration-300"
                        wire:click="increaseQuantity({{ $index }})">+</button>
                </div>
            </div>

            <!-- Tautan Hapus -->
            <div class="ml-6 text-right">
                <button
                    class="text-blue-600 text-sm hover:underline hover:text-blue-800 transition-colors duration-300">Hapus</button>
            </div>
        </div>
    @endforeach

    <!-- Tombol Checkout dan Informasi Total -->
    <div class="mt-6 flex justify-end items-center space-x-4 border-t pt-4 mr-4 bg-gray-200">
        <!-- Check List Semua -->
        <div class="text-left text-sm">
            <input type="checkbox"
                class="mr-4 w-5 h-5 text-blue-600 border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                wire:click="toggleSelectAll" {{ $selectAll ? 'checked' : '' }}>

            <span class="text-gray-600">Pilih Semua</span>
        </div>
        <!-- Total Harga -->
        <div class="">
            <div class="text-yellow-600 text-sm">
                Total (<span class="font-semibold">{{ $this->getSelectedProductCount() }} produk</span>):
            </div>

            <div class="text-red-600 text-xl font-semibold">
                Rp{{ number_format($this->getTotalSelectedPrice(), 0, ',', '.') }}
            </div>
        </div>

        <!-- Tombol Checkout -->
        <button class="bg-yellow-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-yellow-900 
               transition-colors duration-300 focus:outline-none">
            Checkout
        </button>
    </div>
</div>