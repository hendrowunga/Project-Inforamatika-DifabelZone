<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Responses\ApiResponse;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        try {
            // Cek jika pengguna terautentikasi
            $user = $request->user();
            if (!$user) {
                return ApiResponse::error('User not authenticated', 401);
            }

            // Hapus token akses saat ini
            $user->currentAccessToken()->delete();

            return ApiResponse::success(
                null,
                'Logged out successfully',
                200
            );
        } catch (\Exception $e) {
            return ApiResponse::error(
                'Logout failed: ' . $e->getMessage(),
                500
            );
        }
    }
}