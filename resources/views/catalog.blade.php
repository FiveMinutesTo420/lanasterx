@extends('layouts.catalog')
@section('title',$title)
@section('products')
    <div class="w-full py-2"> 
        <div class="flex text-xs font-semibold space-x-4">
            <p>
                Всего {{count($items)}} товара(-ов)

            </p>
            <p>СОРТИРОВАТЬ ПО:</p>
            <button onclick="sortByPrice(this,'{{Request::fullUrlWithQuery(['price'=> 'cheap'])}}')">ЦЕНЕ</button>
            <button onclick="sortByNew(this,'{{Request::fullUrlWithQuery(['new'=> 'new'])}}')">НОВИНКЕ</button>
        </div>
    </div>
    <div class="flex flex-wrap">
        @if($items->count() == 0)
            <p class="text-gray-500 text-lg ">Товаров в данной категории не найдено</p>
        @endif
        <div id="catalog-products" class=" flex flex-wrap w-full">
            @foreach($items as $item)
            <div class="w-[250px] flex flex-col justify-between m-2 space-y-1 p-2 ">
                <div class="flex h-full items-center">
                    <img src="{{url('images/products/'.$item->image)}}" class="w-4/5" alt="">

                </div>
                <div class="">
                    <p class="text-xs font-[200]">{{$item->name}}</p>
                    <p class="mt-2 font-[400] text-sm">{{number_format($item->price)}} Руб.</p>
                    <a href="{{route('product',[$item->category->slug,$item->slug])}}" class="text-xs mt-2 font-[200] border-b w-fit py-1">Быстрый просмотр</a>
                </div>

            </div>
            @endforeach
        </div>



    </div>

@endsection