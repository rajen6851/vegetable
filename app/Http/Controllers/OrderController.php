<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Show all orders
    public function orderlist()
    {
        $orders = Order::with(['user', 'cartOrders.product'])
            ->orderBy('id', 'desc')
            ->get();

        return view('Admin.Order.list', compact('orders'));
    }

    // Show single order invoice
    public function ordershow($id)
    {
        $order = Order::with(['user', 'cartOrders.product'])
                    ->find($id);

        if (!$order) {
            abort(404, 'Order not found');
        }

        return view('Admin.Order.ordershow', compact('order'));
    }
}
