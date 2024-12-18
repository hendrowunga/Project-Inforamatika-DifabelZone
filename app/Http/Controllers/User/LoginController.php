<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('user.login-user');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->only('email', 'password');

        // Validasi kredensial
        if (Auth::attempt($credentials)) {
            // Redirect ke dashboard atau halaman yang diinginkan setelah login sukses
            return redirect()->intended('/dashboard-user');
        }

        // Jika login gagal, kirim kembali dengan error
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
}

