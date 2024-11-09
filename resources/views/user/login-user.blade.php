<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans" style="background-color: #E8EAE1;">
    <!-- <div
        class="absolute top-0 right-0 w-32 h-32 bg-[url('{{ asset('images/background/backroundBatik.svg') }}')] bg-no-repeat bg-auto"><p>atas</p>
    </div> -->
    <img class="absolute top-0 right-0" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">
    <img class="absolute bottom-0 left-0" src="{{ asset('images/background/backroundBatik.svg') }}" alt="">


    <div class="container mx-auto px-4 py-8">
        <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="text-center">
                    <img src="{{ asset('images/logo\logoDifabelZone.svg') }}" alt="Logo"
                        class="w-30 h-30 mx-auto rounded-full">
                    <h1 class="text-2xl font-bold mt-4">Welcome back</h1>
                    <p class="text-gray-600 mt-2">Enter your credentials to access your account.</p>
                </div>

                <form class="mt-6" action="#">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email address
                        </label>
                        <input type="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input type="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" placeholder="*******">
                        <a href="#" class="text-sm text-blue- 600 hover:underline">Forgot password?</a>
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-auto w-full"
                            type="submit">
                            Login
                        </button>
                    </div>
                </form>

                <div class="text-center mt-4 ">
                    <p class="text-gray-600">Or sign in with</p>
                    <button
                        class="mt-2 border border-gray-300 rounded py-2 px-4 flex items-center justify-center mx-auto w-full">
                        <img class="mr-2 h-4 w-4"
                            src="https://lh3.googleusercontent.com/COxitqgJr1sJnIDe8-jiKhxDx1FrYbtRHKJ9z_hELisAlapwE9LUPh6fcXIfb5vwpbMl4xl9H9TRFPc5NOO8Sb3VSgIBrfRYvW6cUA"
                            alt="google-logo">
                        Sign in with Google
                    </button>
                </div>
                <div class="text-center text-sm mt-6">
                    Don't have an account? <a href="#" class="text-blue-600 hover:underline">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>