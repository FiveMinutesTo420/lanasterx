@extends('layouts.layout')
@section('title','Главная')
@section('head')
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endsection
@section('content')
<section class="w-[70%] mx-auto flex justify-between py-4 items-center">
    <div class=" w-[20%] h-[35vh] flex flex-col justify-between text-center   text-white ">
        <a href="{{route('category','malaah-ihit')}}" class="p-6 bg-[#79BD8F] cursor-pointer rounded">Малаах иhит</a>
        <a href="{{route('category','sumki-iz-tueski')}}" class="p-6 bg-[#79BD8F] cursor-pointer rounded">Сумки из Туески</a>
        <a href="{{route('category','aksessuary')}}" class="p-6 bg-[#79BD8F] cursor-pointer rounded">Аксессуары</a>

    </div>
    <div class=" w-[50%] h-[65vh] p-2">
    <div class="swiper w-full border-8 border-[#79BD8F]">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="{{url('images/slider/1s.png')}}" class="w-full h-[55vh]" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{url('images/slider/2s.png')}}" class="w-full h-[55vh]" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{url('images/slider/3.png')}}" class="w-full h-[55vh]" alt="">
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
        </div>
    </div>
    <div class=" w-[20%] h-[35vh] flex flex-col justify-between text-white">
        <div class="h-[45%] bg-[#79BD8F] flex justify-center items-center rounded ">
            СКИДКИ
        </div>
        <div class="h-[45%] bg-[#79BD8F] flex justify-center items-center rounded">
            СКИДКИ
        </div>
    </div>
</section>
<section class="w-[70%] mx-auto flex justify-between py-4 ">
    <div class="flex flex-col items-center w-full space-y-4">
        <div class="flex flex-col items-center space-y-3">
            <p class="uppercase text-3xl font-semibold">лучшие товары</p>
      
        </div>
        <div class="flex w-full justify-center space-x-4 ">
            @foreach($bestItems as $item)
            <a href="{{route('product',[$item->category->slug,$item->slug])}}" class="border-2 rounded p-2 flex flex-col w-[20%] space-y-2">
                <img src="{{url('images/products/'.$item->image)}}" class="w-[100%] rounded  h-[200px] flex justify-center items-center">
                    
                <div class="flex flex-col space-y-1">
                    <p>{{$item->name}}</p>
                    <p>{{$item->price}} руб.</p>
                </div>
            </a>
            @endforeach


        </div>
    </div>
</section>
<section class="w-[70%] mx-auto flex justify-between py-4 ">
    <div class="flex flex-col items-center w-full space-y-4">
        <div class="flex flex-col items-center space-y-3">
            <p class="uppercase text-3xl font-semibold">мастер-классы</p>

        </div>

        <div class="flex w-[62%] mx-auto justify-between space-x-12  ">
            <div class="flex flex-col w-[70%]">
                <div class=" flex flex-col   space-y-2">
                    <div class="w-[100%] rounded bg-red-400 h-[200px] flex justify-center items-center">
                        Image
                    </div>
                    <p class="text-xl">ЕЖЕДНЕВНЫЕ <br> МАСТЕР-КЛАССЫ <br> БЕЗ ЗАПИСИ</p>
                    <div class="flex flex-col space-y-4 items-center">
                        <a href="{{route('zapis')}}" class="border p-4 cursor-pointer text-center rounded w-full border-black">
                        Записаться
                        </a>
       
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-[70%]">
                <div class=" flex flex-col  space-y-2">
                    <div class="w-[100%] rounded bg-red-400 h-[200px] flex justify-center items-center">
                        Image
                    </div>
                    <p class="text-xl">ЕЖЕДНЕВНЫЕ <br> МАСТЕР-КЛАССЫ <br> БЕЗ ЗАПИСИ</p>
                    <div class="flex flex-col space-y-4 items-center">
                        <a href="{{route('zapis')}}" class="border cursor-pointer p-4 text-center rounded w-full border-black">
                            Записаться
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<section class="w-full mx-auto flex  py-4 ">
    <div class="w-[65%] h-[70vh]">
        <div class="h-full relative  ">
            <img src="{{url('images/site/backwall.png')}}" class="w-full h-full"  alt="">
            <div class="absolute top-[150px] left-[60px] text-lg  w-[900px] text-white ">
                <div class="flex flex-col w-full  break-words">
                    <a href={{route('about')}} <p class="hover:text-green-400 font-semibold">О компании</p></a>
                    <p class="text-2xl font-semibold">Интернет-магазин “LANASTERX” Якутские изделия  из кожи и мастер классы</p>
                    <p class="text-2xl">
                    “LANASTREX”  - изделии из кожи с широким ассортиментом 100% изделий из кожи и проведений мастер-классов. На сайте можно ознакомиться не только  с товарами и мастер-классами, но и с технологией изготовления, покупая товары ставить отзывы и т.д.
                    </p>
                </div>
            </div>
        </div>

    </div>
    <img src="{{url('images/site/leftbackwall.png')}}" class="w-[35%] h-[70vh]" alt="">
</section>
<section class="w-[70%] mx-auto flex justify-between py-4 ">
    <div class="flex flex-col items-center w-full space-y-4">
        <div class="flex flex-col items-center space-y-3">
            <p class="uppercase text-3xl font-semibold">новости</p>

        </div>
        <div class="flex w-full justify-center space-x-4 ">
            <div class=" flex flex-col w-[20%] space-y-2">
                <div class="w-[100%] rounded bg-red-400 h-[400px] flex justify-center items-center">
                    Image
                </div>

            </div>
            <div class=" flex flex-col w-[20%] space-y-2">
                <div class="w-[100%] rounded bg-red-400 h-[400px] flex justify-center items-center">
                    Image
                </div>
  
            </div>
            <div class=" flex flex-col w-[20%] space-y-2">
                <div class="w-[100%] rounded bg-red-400 h-[400px] flex justify-center items-center">
                    Image
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
@section('scripts')
    <script src="{{url('js/home.js')}}"></script>
@endsection
