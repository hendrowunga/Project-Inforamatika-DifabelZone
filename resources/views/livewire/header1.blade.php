<!-- resources/views/layouts/header.blade.php -->
<header class="shadow-md py-4 text-yellow-900" style="background-color: #E6DF96;">
    <div class="max-w-full mx-auto flex justify-between items-center">
        <!-- Kiri -->
        <div class="flex items-center w-1/2 space-x-5 ml-10" id="kiri">
            <!-- Logo -->
            <div class="shrink-0 flex items-left">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo/logoDifabelZone.svg') }}" alt="Logo" class="h-9">
                </a>
            </div>

            <!-- Search -->
            <div class="flex-grow">
                <input type="text" placeholder="Cari barang yang kamu sukai..."
                    class="text-black w-1/2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-600">
            </div>
        </div>

        <!-- Kanan -->
        <div class="flex items-center w-1/2 justify-end space-x-5 mr-10" id="kanan">
            <!-- Tampilan untuk user yang belum login -->
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 flex space-x-4">
                <!-- Login -->
                <button class="px-4 py-2 text-white bg-yellow-600 rounded hover:bg-yellow-700">
                    <a href="{{ route('login') }}">Log in</a>
                </button>

                <!-- Register -->
                <button class="px-4 py-2 text-white bg-yellow-600 rounded hover:bg-yellow-700">
                    <a href="{{ route('register') }}">
                        Register
                    </a>
                </button>
            </div>
        </div>
    </div>
</header>