<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    // Redirect ke Google untuk login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    // Handle callback dari Google
    public function handleGoogleCallback()
    {
        try {
            // Ambil informasi pengguna dari Google
            $googleUser = Socialite::driver('google')->user();

            // Cari atau buat pengguna baru
            $user = User::updateOrCreate([
                'email' => $googleUser->getEmail(),
            ], [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
            ]);

            // Login pengguna
            Auth::login($user);

            // Menghasilkan token untuk API
            $token = $user->createToken('auth_token')->plainTextToken;

            // Kembalikan respons JSON
            return response()->json(['message' => 'Login successful', 'user' => $user, 'token' => $token], 200);
        } catch (\Exception $e) {
            Log::error('Google login error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to authenticate with Google'], 500);
        }
    }
}