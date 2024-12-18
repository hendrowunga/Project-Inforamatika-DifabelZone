<div class="my-12 flex items-center justify-center">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @foreach ($products as $product)
            <div class="bg-white p-4 rounded shadow-md text-center">
                <!-- Product Image -->
                <div class="h-52 w-full rounded mb-4 bg-white overflow-hidden flex items-center justify-center">
                    <img src="{{ asset($product['productImage']) }}" alt="Product Image"
                        class="max-h-full max-w-full object-contain">
                </div>

                <!-- Product Price dan Product Name -->
                <div class="flex flex-col items-start mb-4 text-yellow-900">
                    <span class="font-semibold text-left">{{ $product['productName'] }}</span>

                    <span
                        class="font-semibold text-left text-red-600 text-lg">Rp{{ number_format($product['productPrice'], 0, ',', '.') }}</span>
                </div>

                <!-- Add to Cart Button -->
                <div class="flex justify-between items-center">
                    <button class="text-red-500" wire:click="addToCart">
                        <img class="w-8" src="{{ asset('images/logo/ShoppingCart.svg') }}" alt="Keranjang">
                    </button>
                    <button class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-600"
                        wire:click="addToCart">
                        Beli Sekarang
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>