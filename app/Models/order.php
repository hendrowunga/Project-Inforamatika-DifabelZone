<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Menggunakan ID sebagai primary key
    public $incrementing = true; // ID adalah auto-incrementing
    protected $keyType = 'int'; // Tipe kunci adalah integer

    protected $fillable = [
        'order_Status',
        'order_date',
        'order_amount'
    ];

    public function CartOfOrder()
    {//relasi one product to many cartOfProducts
        return $this->hasMany(cart_of_order::class, 'order_id','id');
    }

    public function customer()
    {//relasi many product to one category
        return $this->belongsTo(User::class, 'customer_id','id');
    }

    public function address() 
    {//relasi many product to one user
        return $this->belongsTo(Address::class, 'address_id','id');
    }

    public function payment()
    {//relasi many product to one category
        return $this->belongsTo(payment::class, 'payment_id','id');
    }
}
