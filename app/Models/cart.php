<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Menggunakan ID sebagai primary key
    public $incrementing = true; // ID adalah auto-incrementing
    protected $keyType = 'int'; // Tipe kunci adalah integer

    protected $fillable = [
        'total_quantity',
        'total_price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function cartOfProducts()
    {
        return $this->hasMany(cart_of_product::class, 'cart_id');
    }
}
