<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserNew extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    // Kolom yang dapat diisi
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'role',
    ];

    // Kolom yang harus disembunyikan (misalnya untuk API response)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Kolom yang akan diformat dengan waktu (timestamps)
    protected $dates = [
        'email_verified_at',
    ];
}


