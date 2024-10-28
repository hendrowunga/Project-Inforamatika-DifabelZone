<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Menggunakan ID sebagai primary key
    public $incrementing = true; // ID adalah auto-incrementing
    protected $keyType = 'int'; // Tipe kunci adalah integer

    protected $fillable = [
        'name',
        'stock',
        'image',
        'price'
    ];

    public function cartOfProducts()
    {//relasi one product to many cartOfProducts
        return $this->hasMany(cart_of_product::class, 'product_id','id');
    }

    public function category()
    {//relasi many product to one category
        return $this->belongsTo(category::class, 'category_id','id');
    }

    public function admin() 
    {//relasi many product to one user
        return $this->belongsTo(User::class, 'admin_id','id');
    }
}
