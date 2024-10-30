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

<<<<<<< HEAD
    // public function cartOfProducts()
    // {//relasi one product to many cartOfProducts
    //     return $this->hasMany(cart_of_product::class, 'product_id','id');
    // }
=======
    public function cartOfProducts()
    {//relasi one product to many cartOfProducts
        return $this->hasMany(cart_of_product::class, 'product_id','id');
    }

    public function review()
    {//relasi one product to many cartOfProducts
        return $this->hasMany(review::class, 'product_id','id');
    }
>>>>>>> b4cf5d986f32e1964211a384f1433b0a553f42a4

    public function category()
    {//relasi many product to one category
        return $this->belongsTo(category::class, 'category_id','id');
    }

    public function admin() 
    {//relasi many product to one user
        return $this->belongsTo(User::class, 'admin_id','id');
    }
}
