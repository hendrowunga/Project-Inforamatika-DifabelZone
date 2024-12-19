<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans" style="background-color: #E8EAE1;">
    <!-- Top Background Images -->
    <div class="m-4 absolute top-0 right-0 flex flex-col justify-center items-center space-y-4">
        <img class="sm:w-full" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-4/5" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-2/3" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-1/2" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
    </div>

    <!-- Bottom Background Images -->
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
                    <h1 class="text-2xl font-bold mt-4">Welcome Back!</h1>
                    <p class="text-gray-600 mt-2">Please enter your email and password.</p>
                </div>

                <!-- Session Status Message -->
                @if (session('status'))
                    <div class="alert alert-success bg-green-500 text-white text-center p-2 rounded mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email Address
                        </label>
                        <input type="email" name="email"
                            class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" placeholder="Enter your email" value="{{ old('email') }}" required
                            autofocus>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
<<<<<<< HEAD
                        <input type="password" name="password"
                            class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" placeholder="*******" required>
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
=======
                        <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="password" placeholder="*******" required>
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
>>>>>>> 2f0b2f2f179e65356552f596e7ef60d7e0cfb1f6
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <!-- Forgot Password and Submit Button -->
                    <div class="flex items-center justify-between mt-4">
                        <div class="text-sm">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    Forgot your password?
                                </a>
                            @endif
                        </div>

                        <button type="submit"
                            class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline w-full mt-3 sm:mt-0">
                            Log in
                        </button>
                    </div>
                </form>

                <!-- Register Link -->
                <div class="text-center text-sm mt-6">
                    Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign
                        up</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
