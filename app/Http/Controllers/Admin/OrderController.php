<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function orderList()
    {
        $orders = Order::all();


        return view('back.pages.admin.order.list_order', [
            'pageTitle' => 'Order',
            'orders' => $orders
        ]);
    }

    public function createOrders()
    {
        // $orders = Order::orderBy('name')->get();
        return view('back.pages.admin.order.create_orders', [
            'pageTitle' => 'Add Orders',
            // 'orders' => $orders
        ]);
    }
}