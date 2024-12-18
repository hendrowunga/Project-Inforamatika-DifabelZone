<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans leading-normal">
    <!-- Header -->
    @livewire('header')

    <!-- Main Container -->
    <div class="container mx-auto p-6">
        <!-- Profile Card -->
        <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden border border-gray-200">
            <!-- Header Section -->
            <div class="bg-[#E6DF96] p-6 text-center">
                <div class="flex justify-center">
                    
                </div>
                <h2 class="mt-4 text-3xl font-bold text-gray-800">{{ $customer->username }}</h2>
                <p class="text-gray-600 mt-1">Profil Pengguna</p>
            </div>

            <!-- Informasi Kontak -->
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-4 border-b pb-2">Informasi Kontak</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600 font-medium">First Name</p>
                        <p class="text-gray-800">{{ $customer->firstname }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 font-medium">Last Name</p>
                        <p class="text-gray-800">{{ $customer->lastname }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-gray-600 font-medium">Email</p>
                        <p class="text-gray-800">{{ $customer->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Daftar Alamat -->
            <div class="p-6 bg-gray-50">
                <h3 class="text-xl font-semibold mb-4 border-b pb-2">Daftar Alamat</h3>
                @if (count($addresses) > 0)
                    @foreach ($addresses as $address)
                    <div class="bg-white p-4 rounded-lg shadow-sm mb-4 border">
                        <p class="text-gray-600">
                            <strong>Alamat:</strong> 
                            {{ $address['street'] }}, 
                            {{ $address['village_id'] }}, 
                            {{ $address['district_id'] }}, 
                            {{ $address['regency_id'] }}, 
                            {{ $address['province_id'] }} 
                            {{ $address['postal_code'] }}
                        </p>
                    </div>

                    @endforeach
                @else
                    <p class="text-gray-500">Belum ada alamat yang ditambahkan.</p>
                @endif
            </div>


            <!-- Tambah Alamat Baru -->
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-4 border-b pb-2">Tambah Alamat Baru</h3>
                <form action="{{ route('profile.addAddress', $customer->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="street" class="block text-gray-700 font-medium">Jalan</label>
                        <input type="text" id="street" name="street" placeholder="Contoh: Jl. Mawar No. 10" 
                            class="w-full p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="postal_code" class="block text-gray-700 font-medium">Kode Pos</label>
                        <input type="text" id="postal_code" name="postal_code" placeholder="Contoh: 12345" 
                            class="w-full p-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <button type="submit" 
                        class="w-full bg-yellow-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                        Tambahkan Alamat
                    </button>
                </form>

                @if (session('success'))
                    <p class="text-green-600 mt-4 font-medium">{{ session('success') }}</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    @livewire('footer')
</body>
</html>
