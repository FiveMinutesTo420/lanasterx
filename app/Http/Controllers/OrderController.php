<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('order', ['orders' => auth()->user()->orders->sortByDesc('id')]);
    }
    public function cancel(Order $order)
    {
        $order->status = "Отменен";
        foreach ($order->carts as $cart) {
            $cart->product->in_stock += $cart->amount;
            $cart->product->save();
        }

        $order->save();
        return back()->with('success', 'Заказ был отменен');
    }
}
