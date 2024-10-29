<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\ForgotPasswordRequest;
use App\Http\Responses\ApiResponse;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        try {
            $token = Str::random(64);
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $request->email],
                [
                    'token' => Hash::make($token),
                    'created_at' => Carbon::now()
                ]
            );
            // Send email with a link including the token
            Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));

            return ApiResponse::success(
                null,
                'If this email exists, a reset link has been sent',
                200
            );
        } catch (\Throwable $e) {
            return ApiResponse::error(
                'Failed to process password reset request: ' . $e->getMessage(),
                500
            );
        }
    }
}