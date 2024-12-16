<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class LoginController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(LoginRequest $request): JsonResponse
    {
        // Ambil kredensial yang dikirim (email atau username)
        $credentials = $request->only('email_or_username', 'password');

        // Cek apakah input adalah email atau username dan lakukan pencarian di database
        $customer = null;

        // Cek apakah input berupa email atau username
        if (filter_var($credentials['email_or_username'], FILTER_VALIDATE_EMAIL)) {
            // Jika input adalah email
            $customer = Customer::where('email', $credentials['email_or_username'])->first();
        } else {
            // Jika input adalah username
            $customer = Customer::where('username', $credentials['email_or_username'])->first();
        }

        // Cek jika user ditemukan dan passwordnya sesuai
        if (!$customer || !Hash::check($credentials['password'], $customer->password)) {
            return response()->json([
                'message' => 'These credentials do not match our records.',
            ], 401); // Status Unauthorized
        }

        // Jika autentikasi berhasil, buat token untuk user
        $token = $customer->createToken("token for " . $customer->email)->plainTextToken;

        // Response data user dan token
        $data = [
            'token' => $token,
            'user' => [
                'username' => $customer->username,
                'email' => $customer->email,
                'firstname' => $customer->firstname,
                'lastname' => $customer->lastname,
            ]
        ];

        return response()->json($data, 200); // Status OK
    }

    /**
     * Handle the logout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        // Hapus token yang sedang digunakan
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
