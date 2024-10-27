<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\ResetPasswordRequest;
use App\Http\Responses\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function resetPassword(ResetPasswordRequest $request)
    {
        try {
            $resetRecord = DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->first();

            if (!$resetRecord || !Hash::check($request->token, $resetRecord->token)) {
                return ApiResponse::error('Invalid or expired token', 400);
            }

            if (Carbon::parse($resetRecord->created_at)->addHours(24)->isPast()) {
                DB::table('password_reset_tokens')->where('email', $request->email)->delete();
                return ApiResponse::error('Token expired', 400);
            }

            // Update password and delete the token record
            $user = User::where('email', $request->email)->first();
            $user->update(['password' => Hash::make($request->password)]);
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();

            return ApiResponse::success(
                null,
                'Password has been reset successfully',
                200
            );
        } catch (\Exception $e) {
            return ApiResponse::error(
                'Failed to reset password: ' . $e->getMessage(),
                500
            );
        }
    }
    public function showResetForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required'
        ]);
        return view('auth.reset-password', [
            'email' => $request->query('email'),
            'token' => $request->query('token')
        ]);
    }
}