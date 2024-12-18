<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">
@livewire('header')
    <div class="container mx-auto p-6">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden border border-[#E6DF96]">
            <div class="bg-[#E6DF96] p-6 text-center">
                <h2 class="mt-4 text-2xl font-semibold">rosa</h2>
            </div>
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-2">Informasi Kontak</h3>
                <p><strong>Nama:</strong> rosa</p>
                <p><strong>Email:</strong> user@example.com</p>
                <p><strong>Alamat:</strong> Jl. Contoh No. 123, Kota Contoh</p>
            </div>
        </div>
    </div>
    @livewire('footer')
</body>
</html>