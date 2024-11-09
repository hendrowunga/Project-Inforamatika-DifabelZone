<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-[#f8f8ea] flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <div class="text-center mb-6">
            <img src="/path/to/logo.png" alt="Logo" class="mx-auto w-20 h-20">
            <h1 class="text-2xl font-bold mt-4">Welcome back</h1>
            <p class="text-gray-600">Enter your credentials to access your account</p>
        </div>
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700">Email address</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded focus:outline-none" placeholder="Enter your email">
            </div>
            <div>
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded focus:outline-none" placeholder="Password">
                <a href="#" class="text-sm text-gray-500 hover:underline">Forgot password?</a>
            </div>
            <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 rounded">Login</button>
        </form>
        <div class="text-center mt-4">
            <button class="flex items-center justify-center w-full border rounded py-2 text-gray-600 hover:bg-gray-100">
                <img src="/path/to/google-icon.png" alt="Google" class="w-5 h-5 mr-2"> Sign in with Google
            </button>
        </div>
        <p class="text-center text-gray-600 mt-4">Don't have an account? <a href="#" class="text-blue-600 hover:underline">Sign Up</a></p>
    </div>
</body>
</html>
