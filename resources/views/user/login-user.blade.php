<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans" style="background-color: #E8EAE1;">
    <div class="m-4 absolute top-0 right-0 flex flex-col justify-center items-center space-y-4">
        <img class="sm:w-full" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-4/5" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-2/3" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-1/2" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
    </div>

    <div class="m-4 absolute bottom-0 left-0 flex flex-col justify-center items-center space-y-4">
        <img class="sm:w-1/2" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-2/3" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-4/5" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-full" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-lg mx-auto rounded-lg shadow-md overflow-hidden" style="background-color: #E6DF96;">
            <div class="p-6">
                <div class="text-center">
                    <img src="{{ asset('images/logo/logoDifabelZone.svg') }}" alt="Logo"
                        class="w-30 h-30 mx-auto rounded-full">
                    <h1 class="text-2xl font-bold mt-4">Selamat Datang!</h1>
                    <p class="text-gray-600 mt-2">Masukkan Email dan Kata Sandi anda.</p>
                </div>

                <!-- Form login -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf <!-- CSRF Token untuk keamanan -->

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Alamat Email
                        </label>
                        <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}" required>
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Kata Sandi
                        </label>
                        <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="password" placeholder="*******" required>
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        <a href="#" class="text-sm text-blue-600 hover:underline">Lupa Password?</a>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-auto w-full">
                            Masuk
                        </button>
                    </div>
                </form>

                <div class="text-center text-sm mt-6">
                    Tidak memiliki akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
