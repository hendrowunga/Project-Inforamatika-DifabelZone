<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans" style="background-color: #E8EAE1;">
    <!-- Top Background Image -->
    <div class="m-4 absolute top-0 right-0 flex flex-col justify-center items-center space-y-4">
        <img class="sm:w-full" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-4/5" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-2/3" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-1/2" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
    </div>

    <!-- Bottom Background Image -->
    <div class="m-4 absolute bottom-0 left-0 flex flex-col justify-center items-center space-y-4">
        <img class="sm:w-1/2" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-2/3" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-4/5" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
        <img class="sm:w-full" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
    </div>

    <!-- Register Form -->
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-lg mx-auto rounded-lg shadow-md overflow-hidden" style="background-color: #E6DF96;">
            <div class="p-6">
                <div class="text-center">
                    <img src="{{ asset('images/logo/logoDifabelZone.svg') }}" alt="Logo"
                        class="w-30 h-30 mx-auto rounded-full">
                    <h1 class="text-2xl font-bold mt-4">Create Account</h1>
                    <p class="text-gray-600 mt-2">Fill in the details below to register.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- First Name -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="firstname">First Name</label>
                        <input type="text" name="firstname"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="firstname" placeholder="Enter your first name" value="{{ old('firstname') }}" required>
                        @error('firstname')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="lastname">Last Name</label>
                        <input type="text" name="lastname"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="lastname" placeholder="Enter your last name" value="{{ old('lastname') }}" required>
                        @error('lastname')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Username -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                        <input type="text" name="username"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="username" placeholder="Enter your username" value="{{ old('username') }}" required>
                        @error('username')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email Address</label>
                        <input type="email" name="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input type="password" name="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" placeholder="Enter your password" required>
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">Confirm
                            Password</label>
                        <input type="password" name="password_confirmation"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="password_confirmation" placeholder="Confirm your password" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                            Register
                        </button>
                    </div>
                </form>

                <!-- Login Link -->
                <div class="text-center text-sm mt-6">
                    Already have an account? <a href="{{ route('login') }}"
                        class="text-blue-600 hover:underline">Login</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
