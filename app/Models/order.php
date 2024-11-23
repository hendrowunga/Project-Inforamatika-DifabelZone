<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'grand_total',
        'payment_method',
        // 'payment_id',
        'payment_status',
        'status',
        // 'currency',
        'shipping_amount',
        'shipping_method',
        'notes',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function carts()
    {
        return $this->belongsToMany(Carts::class);
    }
}