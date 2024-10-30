<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_of_order extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity_product',
        'price_product'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function order()
    {
        return $this->belongsTo(order::class, 'order_id');
    }
}
