@extends('layouts.layout')
@section('title', $product->name )
@section('content')

    <div class="w-4/5 mx-auto flex mt-4 justify-center">
                <img src="{{url('images/products/'.$product->image)}}" class="w-[30%]" alt="">

        <div class="flex flex-col w-[40%] p-12 space-y-3">
            @if($product->category->id != "6" and $product->category->id != 7 and $product->category->id != 8 and $product->category->id != 9 and $product->category->id != 10)
                <p class="text-xl font-[200]">{{$product->category->name}} </p>
            @else
            <p class="text-xl font-[200]">{{$product->category->declension}} </a></p>

            @endif
            <p class="text-xl text-gray-400 font-[200] mt-2">{{$product->name}}</p>
            <p class="mt-2 text-xs text-gray-400">Артикул: DR501178564</p>
            <p class="py-2 text-xl font-light ">
                <span class="font-bold">{{number_format($product->price)}}</span> Руб.
            </p>

            <div class="flex flex-col border-t border-gray-300 pt-4">
                <p class="uppercase flex space-x-4 font-medium"><span>описание</span></p>
            </div>
            <div class="text-sm leading-4 font-[200] pb-5 border-b border-gray-300 text-gray-500">
                {!!nl2br($product->description)!!}
            </div>
            <div class="font-[200] text-sm">
                В наличии: {{$product->in_stock}}
            </div>
            <div class="">
                <form action="{{route('cart.add',$product->id)}}" method="post">
                    @csrf
                    <input type="submit" value="Добавить в корзину" class="p-3 cursor-pointer text-white px-12 bg-[#79BD8F]">
                </form>
            </div>
        </div>
    </div>
@endsection