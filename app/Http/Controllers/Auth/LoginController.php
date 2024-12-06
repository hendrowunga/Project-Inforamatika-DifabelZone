<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    // public function create()
    // {
    //     return view('auth.login');
    // }

    /**
     * Handle an incoming authentication request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $customer = $request->user();
        $data = [
            'token' => $customer->createToken("token for" . $customer->email)->plainTextToken,
            'user' => [
                'username' => $customer->username,
                'email' => $customer->email,

            ]

        ];
        return response()->json([], 204);
    }



    public function destroy(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([], 204);
    }
}