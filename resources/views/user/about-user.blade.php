<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F4F5E6] text-gray-800">
    @livewire('header')
    <div class="container mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row items-center">
            <!-- Bagian Teks -->
            <div class="md:w-1/2 text-left mb-8 md:mb-0">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Tentang Kami</h1>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Difabel Zone adalah komunitas yang berdiri sejak tahun 2015 di Yogyakarta, Indonesia. 
                    Kami terdiri dari individu-individu berbakat yang memiliki keterbatasan fisik 
                    namun penuh semangat dan dedikasi dalam menciptakan karya seni batik tulis.
                </p>
            </div>

            <div class="md:w-1/2 flex justify-center relative">
                <img src="{{ asset('images/difableZone/foto1.jpg') }}" alt="Tentang Kami" 
                     class="relative z-10 w-[500px] h-[350px] object-cover rounded-lg shadow-lg">
            </div>
        </div>

        <br>
        <br>
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 flex justify-center relative">
                <img src="{{ asset('images/difableZone/picture1.jpg') }}" alt="Tentang Kami" 
                     class="relative z-10 w-[500px] h-[350px] object-cover rounded-lg shadow-lg">
            </div>

            <div class="md:w-1/2 text-left mb-8 md:mb-0">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">WorkShop</h1>
                <p class="text-gray-600 leading-relaxed mb-6">
                Kami memiliki workshop di daerah Bantul. Workshop ini adalah tempat bagi para 
                teman teman disabilitas membantik
                </p>
                <a href="https://www.google.com/maps/place/Difabelzone/@-7.9088032,110.3019938,17z/data=!3m1!4b1!4m6!3m5!1s0x2e7aff012c3096e1:0x8a79f61ae4316bec!8m2!3d-7.9088032!4d110.3019938!16s%2Fg%2F11q1v__0wv?hl=en-ID&entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank">
                     <button class="bg-yellow-600 hover:bg-purple-600 text-white font-semibold py-2 px-6 rounded-full shadow-md">
                        Lihat Maps 
                     </button>
                </a>

            </div>
        </div>
    </div>
    @livewire('footer')
    <br>
    <br>
    <br>
    @livewire('Checkouts')
</body>
</html>
