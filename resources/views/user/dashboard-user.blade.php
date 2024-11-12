<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Difable Zone</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <header class="shadow-md py-4 text-yellow-900" style="background-color: #E6DF96;">
        <div class="max-w-7xl mx-auto flex justify-between items-center space-x-5 font-semibold">

            <!-- logo -->
            <div class="flex items-center">
                <div class="text-xl font-bold flex items-center space-x-2">
                    <img class="w-28 mx-auto" src="{{ asset('images/logo/logoDifabelZone.svg') }}" alt="Logo">
                </div>
            </div>

            <!-- serach -->
            <div class="flex-grow mx-4">
                <input type="text" placeholder="Cari barang yang kamu sukai..."
                    class=" text-black w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-600">
            </div>

            <!-- navigation -->
            <nav class="hidden md:flex space-x-4">
                <a href="#" class="hover:text-gray-700">Home</a>
                <a href="donation-user" class="hover:text-gray-700">Donasi</a>
                <a href="#" class="hover:text-gray-700">Tentang Kami</a>
            </nav>

            <!-- icon -->
            <div class="flex items-center space-x-4">
                <button class="text-black hover:text-gray-600">
                    <img class="mx-auto" src="{{ asset('images/logo/notifications.svg') }}" alt="Logo">
                </button>
                <button class="flex items-center px-3 py-1 border rounded hover:bg-yellow-600 border-yellow-900">
                    <span>Keranjang</span>
                </button>
                <div class="w-12 h-12 rounded-full bg-purple-500 overflow-hidden">
                    <img src="https://via.placeholder.com/32" alt="User" class="w-full h-full">
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- isi konten -->
    </main>

    <footer class="bg-yellow-300 py-8 mt-10 text-yellow-900"
        style="background-color: #E6DF96; background-image: url('images/background/backroundBatik.svg'); background-repeat: repeat;">
        <div class="mx-auto px-4 md:px-8 flex flex-col md:flex-row justify-between">
            <!-- bgain kiri -->
            <div class="mb-8 md:mb-0 md:w-1/5">
                <div class="flex items-center mb-4">
                    <img class="ml-0 w-24 mx-auto" src="{{ asset('images/logo/logoDifabelZone.svg') }}" alt="Logo">
                </div>
                <p class="text-gray-700 mb-4">
                    Lorem ipsum dolor sit amet consectetur adipiscing elit aliquam.
                </p>
                <!-- Social Media Links -->
                <div class="flex space-x-4 text-lg text-gray-800">
                    <a href="#" class="hover:text-gray-600">Facebook</a>
                    <a href="#" class="hover:text-gray-600">Twitter</a>
                    <a href="#" class="hover:text-gray-600">Instagram</a>
                    <a href="#" class="hover:text-gray-600">LinkedIn</a>
                    <a href="#" class="hover:text-gray-600">YouTube</a>
                </div>
            </div>

            <!-- bagian kanan -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-16">
                <div>
                    <h3 class="font-semibold mb-2">Product</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-700">Features</a></li>
                        <li><a href="#" class="hover:text-gray-700">Pricing</a></li>
                        <li><a href="#" class="hover:text-gray-700">Case studies</a></li>
                        <li><a href="#" class="hover:text-gray-700">Reviews</a></li>
                        <li><a href="#" class="hover:text-gray-700">Updates</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-2">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-700">About</a></li>
                        <li><a href="#" class="hover:text-gray-700">Contact us</a></li>
                        <li><a href="#" class="hover:text-gray-700">Careers</a></li>
                        <li><a href="#" class="hover:text-gray-700">Culture</a></li>
                        <li><a href="#" class="hover:text-gray-700">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-2">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-700">Getting started</a></li>
                        <li><a href="#" class="hover:text-gray-700">Help center</a></li>
                        <li><a href="#" class="hover:text-gray-700">Server status</a></li>
                        <li><a href="#" class="hover:text-gray-700">Report a bug</a></li>
                        <li><a href="#" class="hover:text-gray-700">Chat support</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-2">Contacts us</h3>
                    <ul class="space-y-2">
                        <li><span class="block">📧 difablez@one.com</span></li>
                        <li><span class="block">📞 (414) 687 - 5892</span></li>
                        <li><span class="block">📍 Paigan, San Francisco, 94102</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="mt-8 border-t pt-4 text-center">
            <p>Copyright © 2024 DifabelZone</p>
            <p>
                <a href="#" class="hover:underline">Terms and Conditions</a> |
                <a href="#" class="hover:underline">Privacy Policy</a>
            </p>
        </div>
    </footer>
</body>

</html>