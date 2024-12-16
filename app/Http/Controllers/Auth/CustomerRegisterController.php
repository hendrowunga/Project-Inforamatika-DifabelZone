<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CustomerRegisterController extends Controller
{
    /**
     * Handle customer registration.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:customers,username'],
            'email' => ['required', 'email', 'max:255', 'unique:customers,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Pastikan email dalam bentuk lowercase
        $email = strtolower($request->email);

        // Membuat customer baru
        $customer = Customer::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $email, // Menyimpan email dalam lowercase
            'password' => Hash::make($request->password), // Hash password
        ]);

        // Membuat token untuk autentikasi
        $token = $customer->createToken('customer-token')->plainTextToken;

        // Response berhasil
        return response()->json([
            'message' => 'Customer registered successfully',
            'customer' => [
                'firstname' => $customer->firstname,
                'lastname' => $customer->lastname,
                'username' => $customer->username,
                'email' => $customer->email,
            ],
            'token' => $token,
        ], 201);  // 201 - Created
    }
}
