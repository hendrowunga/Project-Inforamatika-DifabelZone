<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
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
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
