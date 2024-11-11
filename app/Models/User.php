<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'email_verified_at',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id'); // Mengubah user_id sesuai dengan ID
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id', 'id'); // Mengubah user_id sesuai dengan ID
    }

    public function carts()
    {
        return $this->belongsTo(cart::class, 'customer_id');
    }

    public function order()
    {
        return $this->hasMany(order::class, 'customer_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'admin_id');
    }

    public function review()
    { //relasi one product to many cartOfProducts
        return $this->hasMany(review::class, 'product_id', 'id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
