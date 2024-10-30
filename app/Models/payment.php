<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Menggunakan ID sebagai primary key
    public $incrementing = true; // ID adalah auto-incrementing
    protected $keyType = 'int'; // Tipe kunci adalah integer
    
    protected $fillable = [
        'quantity_product',
        'price_product'
    ];

    public function order()
    {//relasi many product to one category
        return $this->belongsTo(order::class, 'order_id','id');
    }
}
