<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_of_product extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id'; // Menggunakan ID sebagai primary key
    // public $incrementing = true; // ID adalah auto-incrementing
    // protected $keyType = 'int'; // Tipe kunci adalah integer

    protected $fillable = [
        'quantity_product',
        'price_product'
    ];

    protected $attributes = [
        'total_quantity' => 0,
        'total_price' => 0.000,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    
}
