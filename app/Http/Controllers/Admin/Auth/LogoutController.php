<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Responses\ApiResponse;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        try {
            // Delete the current token that was used for the request
            $request->user()->tokens()->where('id', $request->user()->currentAccessToken()->id)->delete();

            return ApiResponse::success(
                null,
                'Admin logged out successfully',
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