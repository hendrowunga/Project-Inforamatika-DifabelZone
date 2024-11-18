<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    {{-- Navbar --}}
    @if (Route::has('login'))
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl mx-auto flex items-center justify-between p-4">
                <!-- Header Left -->
                <div class="flex items-center space-x-8">
                    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                    </a>
                    <ul class="flex items-center space-x-6 rtl:space-x-reverse">
                        <li>
                            <a href="#"
                                class="text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">Home</a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">About</a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">Services</a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">Pricing</a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-500">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Header Right -->
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-4 py-2 text-sm text-gray-900 border rounded-lg hover:bg-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700">Register</a>
                        @endif
                    @endguest
                </div>
            </div>
        </nav>
    @endif
</body>

</html>
