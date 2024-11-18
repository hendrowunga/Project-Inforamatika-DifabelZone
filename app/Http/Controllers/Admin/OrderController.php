<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of orders
     */
    public function orderList(Request $request)
    {
        $query = Order::with(['user', 'address']);

        // Filter by status if provided
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
                ->orWhere('id', 'like', "%{$search}%")
                ->orWhere('payment_method', 'like', "%{$search}%");
        }

        // Pagination
        $orders = $query->paginate(10);

        // Get counts for dashboard widgets
        $stats = [
            'new_orders' => Order::where('status', 'new')->count(),
            'processing_orders' => Order::where('status', 'processing')->count(),
            'average_price' => Order::avg('grand_total')
        ];

        return view('back.pages.admin.order.list_order', [
            'pageTitle' => 'Order Management',
            'orders' => $orders,
            'stats' => $stats
        ]);
    }

    /**
     * Show form to create a new order
     */
    public function createOrders()
    {
        $users = User::orderBy('username')->get();
        // $users = User::select('username')->get();
        // dd($users);
        $addresses = Address::orderBy('id')->get();

        return view('back.pages.admin.order.create_orders', [
            'pageTitle' => 'Create New Order',
            'users' => $users,
            'addresses' => $addresses
        ]);
    }

    /**
     * Store a newly created order
     */
    public function storeOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id',
            'grand_total' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'shipping_method' => 'required|string',
            'shipping_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => $request->user_id,
                'address_id' => $request->address_id,
                'grand_total' => $request->grand_total,
                'payment_method' => $request->payment_method,
                'shipping_method' => $request->shipping_method,
                'shipping_amount' => $request->shipping_amount,
                'notes' => $request->notes,
                'status' => 'new',
                'currency' => 'IDR'
            ]);

            DB::commit();

            return redirect()->route('admin.manage-orders.order_list')
                ->with('success', 'Order created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Failed to create order: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show order details
     */
    public function showOrder($id)
    {
        $order = Order::with(['user', 'address'])->findOrFail($id);

        return view('back.pages.admin.order.show_order', [
            'pageTitle' => 'Order Details',
            'order' => $order
        ]);
    }

    /**
     * Show form to edit order
     */
    public function editOrder($id)
    {
        $order = Order::findOrFail($id);
        $users = User::orderBy('name')->get();
        $addresses = Address::orderBy('id')->get();

        return view('back.pages.admin.order.edit_order', [
            'pageTitle' => 'Edit Order',
            'order' => $order,
            'users' => $users,
            'addresses' => $addresses
        ]);
    }

    /**
     * Update order details
     */
    public function updateOrder(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id',
            'grand_total' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'shipping_method' => 'required|string',
            'shipping_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
            'status' => 'required|in:new,processing,shipped,delivered,canceled'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $order = Order::findOrFail($id);
            $order->update($request->all());

            DB::commit();

            return redirect()->route('admin.manage-orders.order_list')
                ->with('success', 'Order updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Failed to update order: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete order
     */
    public function destroyOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return redirect()->route('admin.manage-orders.order_list')
                ->with('success', 'Order deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete order: ' . $e->getMessage());
        }
    }

    /**
     * Filter orders by status
     */
    public function filterOrders(Request $request)
    {
        $query = Order::with(['user', 'address']);

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
                ->orWhere('id', 'like', "%{$search}%")
                ->orWhere('payment_method', 'like', "%{$search}%");
        }

        $orders = $query->paginate(10);

        return view('back.pages.admin.order.list_order', [
            'pageTitle' => 'Filtered Orders',
            'orders' => $orders
        ]);
    }
}
