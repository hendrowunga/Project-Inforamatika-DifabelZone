<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductUser extends Controller
{
    public function index()
    {
        // Menampilkan view product-user.blade.php
        return view('user.product-user');
    }
}
