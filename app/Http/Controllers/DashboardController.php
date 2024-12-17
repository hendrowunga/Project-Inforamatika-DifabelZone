<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard-user'); // Pastikan view 'user.dashboard-user' ada di resources/views/user/dashboard-user.blade.php
    }
}
