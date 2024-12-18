<header class="shadow-md py-4 text-yellow-900" style="background-color: #E6DF96;">
    <div class="max-w-full mx-auto flex justify-between items-center">
        <!-- Kiri -->
        <div class="flex items-center w-1/2 space-x-5 ml-10" id="kiri">
            <!-- Logo -->
            <div class="text-xl font-bold flex items-center space-x-2">
                <img class="w-28" src="{{ asset('images/logo/logoDifabelZone.svg') }}" alt="Logo">
            </div>

            <!-- Search -->
            <div class="flex-grow">
                <input type="text" placeholder="Cari barang yang kamu sukai..."
                    class="text-black w-1/2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-600">
            </div>
        </div>

        <!-- Kanan -->
        <div class="flex items-center w-1/2 justify-end space-x-5 mr-10" id="kanan">
            <!-- Jika user telah Login -->
            <nav class="hidden md:flex space-x-4">
                <a href="dashboard-user" class="hover:text-gray-700">Home</a>
                <a href="donation-user" class="hover:text-gray-700">Donasi</a>
                <a href="about-user" class="hover:text-gray-700">Tentang Kami</a>
            </nav>

            <div class="flex items-center space-x-4">
                <button class="text-black hover:text-gray-600">
                    <img class="mx-auto" src="{{ asset('images/logo/notifications.svg') }}" alt="Notifications">
                </button>
                <button class="flex items-center px-3 py-1 border rounded hover:bg-yellow-600 border-yellow-900">
                    <a href="cart-user">
                        <span>Keranjang</span>
                    </a>
                </button>
                <div class="w-12 h-12 rounded-full bg-purple-500 overflow-hidden">
                    <img src="https://via.placeholder.com/32" alt="User" class="w-full h-full">
                </div>
            </div>
            <!-- Jika User Belum Login -->
            <!-- <button class="px-4 py-2 text-white bg-yellow-600 rounded hover:bg-yellow-700">
                    <a href="{{ route('login') }}">Login</a>
                </button> -->
        </div>
    </div>
</header>