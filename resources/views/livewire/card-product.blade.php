<div class="my-12 flex items-center justify-center">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @foreach ($products as $product)
            <div class="bg-yellow-200 p-4 rounded shadow-md text-center">
                <div class="h-52 w-full rounded mb-4 bg-white overflow-hidden flex items-center justify-center">
                    <img src="{{ asset($product['productImage']) }}" alt="Product Image" class="max-h-full max-w-full object-contain">
                </div>

                <div class="flex justify-between items-center mb-4">
                    <span class="font-semibold">{{ $product['productName'] }}</span>
                    <span class="font-semibold">Rp{{ number_format($product['productPrice'], 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <button class="text-red-500" wire:click="addToCart">
                        ❤️
                    </button>
                    <button class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-600"
                        wire:click="addToCart">
                        Buy Now
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
