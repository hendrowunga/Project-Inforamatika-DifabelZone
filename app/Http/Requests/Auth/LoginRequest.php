<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Memungkinkan semua pengguna untuk melakukan permintaan login
    }

    public function rules(): array
    {
        return [
            'email_or_username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // Cek apakah input adalah email atau username
        $field = filter_var($this->email_or_username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Mencoba autentikasi menggunakan email atau username
        if (! Auth::attempt([$field => $this->email_or_username, 'password' => $this->password], $this->boolean('remember'))) {
            // Jika autentikasi gagal, hit rate limiter
            RateLimiter::hit($this->throttleKey());

            // Lemparkan exception validasi jika kredensial salah
            throw ValidationException::withMessages([
                'email_or_username' => __('auth.failed'),
            ]);
        }

        // Bersihkan rate limiter jika login berhasil
        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited(): void
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            event(new Lockout($this));

            $seconds = RateLimiter::availableIn($this->throttleKey());

            throw ValidationException::withMessages([
                'email_or_username' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ]);
        }
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email_or_username')) . '|' . $this->ip());
    }
}
