@extends('layouts.layout')
@section('title','Мастер-классы')
@section('content')
<section class="w-full flex p-4 mt-8 text-center items-center flex-col space-y-3 ">
    <p class="text-4xl font-semibold border-b border-black">МАСТЕР-КЛАССЫ</p>
    <p class="text-gray-400">Изделия из натуральной кожи</p>
    <a href="{{route('zapis')}}" class="bg-[#79BD8F] p-4 py-2 text-white rounded-lg">ЗАПИСАТЬСЯ</a>
</section>
<img src="{{url('images/site/line.png')}}" class="w-full mb-8 pb-14 pt-14" alt="">
<section class="w-full flex p-4 mt-32 text-center items-center flex-col space-y-3 ">
    <p class="text-3xl font-semibold border-b border-black">Маллааx иhит</p>
    <div class="flex w-[40%] mx-auto justify-between space-x-4 text-white ">
        @foreach($mal as $pr)
            <div class="flex flex-col w-[30%] space-y-2 items-center">
                <div class="border border-yellow-200  rounded p-2 flex flex-col w-full space-y-4 bg-[#79BD8F]">
                    <img src="{{url('images/products/'.$pr->image)}}" class="w-[100%] rounded  h-[250px] flex justify-center items-center">
                        
                
                
                    <a href="" class="pb-2">{{$pr->name}}</a>
    
                </div>
                <form action="{{route('cart.add',$pr->id)}}" method="post">
                    @csrf
                    <input type="submit" value="Добавить в корзину" class="p-3 cursor-pointer text-white px-2 rounded-lg bg-[#79BD8F]">
                </form>
            </div>
            @endforeach
        </div>
</section>
<img src="{{url('images/site/line.png')}}" class="w-full pb-14 pt-14 " alt="">
<section class="w-full flex p-4 mt-8 text-center items-center flex-col space-y-3 ">
    <p class="text-3xl font-semibold border-b border-black">Сумки из “Туески”</p>
    <div class="flex w-[40%] mx-auto justify-between space-x-4 text-white ">
        @foreach($sum as $pr)
        <div class="flex flex-col w-[30%] space-y-2 items-center">
            <div class="border border-yellow-200  rounded p-2 flex flex-col w-full space-y-4 bg-[#79BD8F]">
                <img src="{{url('images/products/'.$pr->image)}}" class="w-[100%] rounded  h-[250px] flex justify-center items-center">
                    
            
            
                <a href="" class="pb-2">{{$pr->name}}</a>

            </div>
            <form action="{{route('cart.add',$pr->id)}}" method="post">
                @csrf
                <input type="submit" value="Добавить в корзину" class="p-3 cursor-pointer text-white px-2 rounded-lg bg-[#79BD8F]">
            </form>
        </div>
        @endforeach
        </div>
</section>
<img src="{{url('images/site/line.png')}}" class="w-full pt-14 pb-14" alt="">
<section class="w-full flex p-4 mt-8 text-center items-center flex-col space-y-3 ">
    <p class="text-3xl font-semibold border-b border-black">Аксессуары</p>
    <div class="flex w-[40%] mx-auto justify-between space-x-4 text-white ">
        @foreach($aks as $pr)
            <div class="flex flex-col w-[30%] space-y-2 items-center">
                <div class="border border-yellow-200  rounded p-2 flex flex-col w-full space-y-4 bg-[#79BD8F]">
                    <img src="{{url('images/products/'.$pr->image)}}" class="w-[100%] rounded  h-[250px] flex justify-center items-center">
                        
                
                
                    <a href="" class="pb-2">{{$pr->name}}</a>
    
                </div>
                <form action="{{route('cart.add',$pr->id)}}" method="post">
                    @csrf
                    <input type="submit" value="Добавить в корзину" class="p-3 cursor-pointer text-white px-2 rounded-lg bg-[#79BD8F]">
                </form>
            </div>
            @endforeach
        </div>
</section>
@endsection