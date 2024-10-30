<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Menggunakan ID sebagai primary key
    public $incrementing = true; // ID adalah auto-incrementing
    protected $keyType = 'int'; // Tipe kunci adalah integer

    protected $fillable = [
        'description',
        'rating'
    ];

    public function product()
    {//relasi many product to one category
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function customer()
    {//relasi many product to one category
        return $this->belongsTo(User::class, 'customer_id','id');
    }
}
