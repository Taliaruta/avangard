<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderUpdateRequest;
use App\Order;
use App\Partner;
use App\Product;

class OrderController extends Controller
{
    public function index($type = null) {
        $orders = Order::with('partner');
        $orders_type = 'Все';
        
        switch ($type) {
            case 'expired':
                $orders_type = 'Просроченные';
                $orders = $orders->where('delivery_dt', '<', date('Y-m-d H:i:s'))
                       ->where('status', 10)
                       ->orderBy('delivery_dt', 'desc')
                       ->paginate(50);
                break;
            case 'current':
                $orders_type = 'Текущие';
                $orders = $orders->whereBetween('delivery_dt', [date('Y-m-d H:i:s'), date('Y-m-d H:i:s', strtotime('+24 hours'))])
                       ->where('status', 10)
                       ->orderBy('delivery_dt')
                       ->get();
                break;
            case 'new':
                $orders_type = 'Новые';
                $orders = $orders->where('delivery_dt', '>', date('Y-m-d H:i:s'))
                       ->where('status', 0)
                       ->orderBy('delivery_dt')
                       ->paginate(50);
                break;
            case 'completed':
                $orders_type = 'Выполненные';
                $orders = $orders->whereBetween('delivery_dt', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])
                        ->where('status', 20)
                        ->orderBy('delivery_dt', 'desc')
                        ->paginate(50);
                break;
            default: 
                $orders = $orders->get();
        }

        return view('orders.index', compact('orders', 'orders_type'));
    }

    public function edit(Order $order) {
        $partners = Partner::all();
        $products = Product::all();

        $order = $order->load('products');

        return view('orders.edit', compact('order', 'partners', 'products'));
    }

    public function update(OrderUpdateRequest $request, Order $order) {
        $old_status = $order->status;
        $order->fill($request->all())->save();

        if($old_status != $order->status && $order->status == 20) {
            $order->notifyPartners();
        }

        return redirect()->route('orders');
    }
}
