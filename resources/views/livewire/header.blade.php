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
                    class=" text-black w-2/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-600">
            </div>

            <!-- navigation -->
            <nav class="hidden md:flex space-x-4">
                <a href="#" class="hover:text-gray-700">Home</a>
                <a href="donation-user" class="hover:text-gray-700">Donasi</a>
                <a href="about-user" class="hover:text-gray-700">Tentang Kami</a>
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