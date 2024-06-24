<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function page(Request $request)
    {
        foreach (auth()->user()->carts as $cart) {
            if ($cart->amount > $cart->product->in_stock && $cart->order_id == null) {
                return view('cart', ['carts' => auth()->user()->carts->where('order_id', null)->sortByDesc('id')])->with('errorNotEnough', 'Товаров не хватает на складе. Проверьте вашу корзину');
            }
        }
        return view('cart', ['carts' => auth()->user()->carts->where('order_id', null)->sortByDesc('id')]);
    }
    public function makeOrder(Request $request)
    {
        $order = Order::create([
            'status' => 'Новый',
            'user_id' => auth()->user()->id,
        ]);

        foreach (auth()->user()->carts as $cart) {
            if ($cart->order_id == null) {
                $cart->order_id = $order->id;
                $cart->save();
                $cart->product->in_stock = $cart->product->in_stock - $cart->amount;
                $cart->product->save();
            }
        }
        return back()->with('success', 'Заказ оформлен, ожидайте подтверждения.');
    }
    public function changeAmount(Request $request, Cart $cart)
    {
        if ($request->amount <= 0 or $request->amount == null) {
            $cart->delete();
            return back()->with(['success' => 'Товар убран с корзины!']);
        } else {
            $cart->amount = $request->amount;
            $cart->save();
            return back()->with(['success' => 'Количество товаров изменено!']);
        }
    }
    public function delete(Request $request, Cart $cart)
    {
        $cart->delete();
        return back()->with(['success' => 'Товар убран с корзины!']);
    }
    public function add(Request $request, Product $product)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->where('order_id', null)->first();
        if ($product->in_stock != 0) {
            if ($cart) {
                $cart->amount += 1;
                $cart->save();
                return back()->with(['success' => 'Корзина обновлена']);
            } else {
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id,
                    'amount' => 1,
                ]);
                return back()->with(['success' => 'Товар был успешно добавлен в корзину']);
            }
        } else {
            return back()->with(['error' => 'Товара нет в наличии']);
        }
    }
}
