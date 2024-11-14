<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'amount',
        'currency',
        'status',
        'method',
        'transaction_date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
