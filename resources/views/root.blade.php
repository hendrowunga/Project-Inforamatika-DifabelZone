<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Difable Zone</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    @livewire('header')

    <main>
        <div class="text-center py-24 px-4 mt-10 text-yellow-900" style="background-color: #E6DF96; background-image: url('images/background/backroundBatik.svg'); background-repeat: repeat;">
            <h1 class="text-2xl font-bold text-brown-800 mb-4 text-4xl">
                Keindahan Batik untuk Semua
            </h1>
            <p class="text-brown-700 mb-6 text-2xl">
                Difabel Zone menyediakan batik berkualitas tinggi yang diproduksi oleh
                pengrajin difabel berbakat. Temukan keunikan dalam setiap motif.
            </p>
            <button class="text-2xl bg-yellow-600 text-white font-semibold py-2 px-6 rounded hover:bg-yellow-700 transition">
                Beli Sekarang
            </button>
        </div>


        <div class="mt-10 flex items-center justify-center text-yellow-900">
            <h1 class="text-4xl sm:text-5xl font-bold text-center">
                Produk Unggulan Kami
            </h1>
        </div>

        @livewire('card-product')
    </main>

    @livewire('footer')
</body>

</html>