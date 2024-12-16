<div class="flex items-center justify-between border-b p-4">
    <!-- Checkbox -->
    <input type="checkbox" class="mr-4 w-5 h-5">

    <!-- Gambar Produk -->
    <div class="w-24 h-24 flex-shrink-0">
        <img src="product-image.jpg" alt="Product Image" class="w-full h-full object-cover">
    </div>

    <!-- Informasi Produk -->
    <div class="flex-1 ml-4">
        <h3 class="text-sm font-medium text-gray-800">
            Sedotan Steril 6mm x 20cm Hitam / Sedotan Kopi Hitam Runcin...
        </h3>
        <div class="flex items-center mt-1">
            <!-- Harga Coret -->
            <span class="text-sm text-gray-400 line-through mr-2">Rp11.408</span>
            <!-- Harga Diskon -->
            <span class="text-sm text-red-600 font-semibold">Rp6.999</span>
        </div>
    </div>

    <!-- Input Jumlah -->
    <div class="flex items-center border rounded">
        <button class="w-8 h-8 flex items-center justify-center border-r text-gray-600 hover:bg-gray-100">−</button>
        <input type="text" value="1" class="w-10 h-8 text-center text-sm border-0">
        <button class="w-8 h-8 flex items-center justify-center border-l text-gray-600 hover:bg-gray-100">+</button>
    </div>

    <!-- Harga Total -->
    <div class="ml-4 text-sm text-red-600 font-semibold">Rp6.999</div>

    <!-- Tautan Hapus dan Produk Serupa -->
    <div class="ml-6 text-right">
        <button class="text-blue-600 text-sm hover:underline">Hapus</button>
        <div class="mt-1">
            <a href="#" class="text-red-500 text-xs flex items-center">
                Produk Serupa
                <span class="ml-1">▼</span>
            </a>
        </div>
    </div>
</div>