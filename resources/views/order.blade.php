@extends('layouts.layout')
@section('title',"Мои заказы")
@section('content')
    <div class="w-4/5 mx-auto py-4">
        <div class="border p-4">
        @foreach($orders as $order)
            <div class="flex flex-col border-b border-black w-full py-2">
                <?php $total = 0?>
                @foreach($order->carts as $cart)
                    <?php $total += $cart->product->price * $cart->amount?>
                @endforeach
                    <p class="text-xl font-[300] flex justify-between w-full"> Заказ #{{$order->id}}
                         <span>{{date_format(date_create($order->created_at),"d.m.Y") }}</span></p>
                        <span class="flex space-x-5 items-center font-[300]">
                             <p class=" py-2 px-3 text-white @if($order->status == 'Отменен') bg-red-500  @endif @if($order->status == 'Новый')  bg-blue-500 @endif @if($order->status == 'Подтвержден') bg-green-500  @endif">Статус: {{$order->status}}</p>
                            @if($order->status == "Новый")
                            <form action="{{route('cancel.order',$order->id)}}" method="POST" class="ml-4">
                                @csrf
                                <input type="submit" value="Отменить" class="px-3 cursor-pointer py-2 border rounded border-black">    
                            </form>
                            @endif
                        </span>
                    <span class="font-[300]">Итого: {{number_format($total)}} руб.</span>
            @foreach($order->carts as $cart)
            <div class="flex border-t mt-4 py-4">
                <img src="{{url('images/products/'.$cart->product->image)}}" class="w-36 h-36" alt="">
                <div class="flex flex-col w-full p-2 space-y-4 font-[300]">
                    <div class="flex space-x-4">
                        <a href="{{route('product',[$cart->product->category->slug,$cart->product->slug])}}" class="w-48 truncate">{{$cart->product->name}}</a> <span>|</span> <a href="{{route('brand',$cart->product->brand->slug)}}" class="border-b border-black cursor-pointer inline w-fit" >{{$cart->product->brand->name}}</a>

                    </div>
                    <div class="w-96 line-clamp-3 ">
                        {!! $cart->product->description !!}
                    </div>
                    <div class="flex flex-col">
                        {{number_format($cart->product->price)}} руб.
                        
                        <p>Количество: {{$cart->amount}} штука(-и)</p>
                    </div>

                </div>
            </div>
                
            @endforeach
            </div>

        @endforeach
        </div>

    </div>
@endsection