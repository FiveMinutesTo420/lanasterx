@extends('layouts.layout')
@section('title','Корзина')
@section('content')
@if(isset($errorNotEnough))
<div class="w-4/5 mx-auto bg-red-400 p-4 rounded-lg text-white my-4">
    {{$errorNotEnough}}
</div>
@endif
    <div class="w-4/5 mx-auto py-4">
        <div class="border flex flex-col p-4">
            @if($carts->count() != 0)
            @foreach($carts as $cart)
                @if($cart->order_id == null)
                <div class="border-b py-2 flex items-center space-x-8  justify-between">
                    <img src="{{url('images/products/'.$cart->product->image)}}" class="w-[90px]" alt="">
                    <a href="{{route('product',[$cart->product->category->slug,$cart->product->slug])}}" class="w-[200px] truncate">{{$cart->product->name}}</a>
                    <p class="w-[100px]">{{number_format($cart->product->price)}} руб.</p>
                    <form action="{{route('cart.changeAmount',$cart->id)}}" class="w-[200px]  flex flex-col space-x-2 p-2" method="POST">
                        @csrf
                        <div class="flex space-x-2">
                            <input type="number" name="amount" class="w-[80px] border border-black @if($cart->amount > $cart->product->in_stock) border-red-500 @endif outline-none rounded pl-2" value="{{$cart->amount}}">
                            <input type="submit" class="p-2 px-4 border-black border rounded cursor-pointer" value="Обновить">
                        </div>
                        <p class="@if($cart->amount > $cart->product->in_stock) text-red-500 @endif">В наличии: {{$cart->product->in_stock}}</p>                      
  
                    </form>
                    <p class="w-[100px]">{{number_format($cart->amount * $cart->product->price)}} руб.</p>

                    <form action="{{route('cart.delete',$cart->id)}}" onsubmit="return confirm('Вы точно хотите убрать товар с корзины?')" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="p-2 px-4 border-red-500 border rounded cursor-pointer">
                    </form>
                </div>
                @endif


            @endforeach

            @else
                <div class="m-4 text-gray-400 text-lg">
                    Корзина пуста
                </div>
            @endif
        </div>
        @if($carts->count() != 0)
            <div class="border-t flex items-center justify-end border-black mt-4 py-2">
                <div class="flex flex-col items-end space-y-4">
                    <p>Итого: {{number_format($cart->amount * $cart->product->price)}} рублей</p>
                    @if(!Session::has('error') )
                    <form action="{{route('cart.makeOrder')}}" method="POST">
                        @csrf
                        <input type="submit" value="Оформить заказ" class="p-2 px-4 border-black cursor-pointer border rounded ">
                    </form>
                    @endif
     
                </div>

            </div>
        @endif
    </div>
@endsection