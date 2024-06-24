@extends('layouts.layout')
@section('title','Админ панель')
@section('content')
    <div class="mx-auto w-4/5 flex flex-col space-y-4">
        <div class="flex flex-col">
            @if(Session::has('success'))
                <p class="text-green-500 py-3 text-xl flex">{{Session::get('success')}}@if(Session::has('changed')) @foreach(Session::get('changed') as $key), {{$key}}@endforeach. @endif </p>
            @endif

            <p class="p-4 mt-4 text-2xl bg-gray-100 rounded flex items-center rounded-b-none justify-between space-x-4"><span>Управление товарами</span> <a href="{{route('admin.product.add')}}" class="text-sm p-2 bg-green-500 text-white rounded-lg px-6 font-[300]">Добавить</a></p>
            <div class="border border-gray-100 bg-gray-50 p-4 flex flex-col space-y-2 overflow-y-auto h-screen">         
                @foreach($products as $product)
                    <a href="{{route('admin.product.change',$product->id)}}" class="border-b py-2 hover:text-red-500 flex justify-between items-center">
                        <p class="w-[20px]">№{{$product->id}}</p>

                        <img src="{{url('images/products/'.$product->image)}}" class="w-[5%]" alt="">
                        <p class="w-[200px]">{{$product->name}}</p>
                        <p class="w-[200px] line-clamp-2">{{$product->description}}></p>
                        <p class="w-[50px]">{{number_format($product->price)}}</p>
                        <p class="w-[100px]">{{$product->category->name}}</p>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col">
            <p class="p-4 mt-4 text-2xl bg-gray-100 rounded flex items-center justify-between space-x-4"><span>Управление категориями</span> <a href="{{route('admin.category')}}" class="text-sm p-2 bg-green-500 text-white rounded-lg px-6 font-[300]">Добавить</a></p>
            <div class="border border-gray-100 bg-gray-50 p-4 flex flex-col space-y-2 overflow-y-auto  h-fit max-h-screen">         
                @foreach($categories as $product)
                    <a href="{{route('admin.category',$product->id)}}" class="border-b py-2 hover:text-red-500 flex space-x-8 items-center">
                        <p class="w-[20px]">№{{$product->id}}</p>

                        <p class="w-[200px]">{{$product->name}}</p>
                
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col">
            <p class="p-4 mt-4 text-2xl bg-gray-100 rounded flex items-center justify-between space-x-4"><span>Управление пользователями</span> <a href="{{route('admin.user')}}" class="text-sm p-2 bg-green-500 text-white rounded-lg px-6 font-[300]">Добавить</a></p>
            <div class="border border-gray-100 bg-gray-50 p-4 flex flex-col space-y-2 overflow-y-auto h-fit max-h-screen">         
                @foreach($users as $product)
                    <a href="{{route('admin.user',$product->id)}}" class="border-b py-2 hover:text-red-500 flex space-x-8 items-center">
                        <p class="w-[20px]">№{{$product->id}}</p>

                        <p class="w-[200px]">{{$product->name}}</p>
                        <p class="w-[200px]">{{$product->lastname}}</p>
                        <p class="w-[200px]">{{$product->email}}</p>
                        <p class="w-[200px]">@if($product->status == 2) Админ @else Пользователь @endif</p>

                        <p class="w-[200px] truncate">{{$product->password}}</p>
                        <p class="w-[200px] truncate">{{$product->created_at}}</p>



                
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col">
            <p class="p-4 mt-4 text-2xl bg-gray-100 rounded flex items-center justify-between space-x-4"><span>Заявки на мастер классы</span> </p>
            <div class="border border-gray-100 bg-gray-50 p-4 flex flex-col space-y-2 overflow-y-auto h-fit max-h-screen">         
                <a class="flex space-x-8 items-center">
                    <p class="w-[20px]">ID</p>
                    <p class="w-[200px]">ФИО</p>
                    <p class="w-[200px]">Возвраст</p>
                    <p class="w-[200px]">Кол-во</p>
                    <p class="w-[200px]">Номер телефона</p>
                    <p class="w-[200px]">Дата</p>


                </a>
                @foreach($apps as $product)
                    <div class="border-b py-2 hover:text-red-500 flex space-x-8 items-center">
                        <p class="w-[20px]">№{{$product->id}}</p>

                        <p class="w-[200px]">{{$product->name}}</p>
                        <p class="w-[200px]">{{$product->age}}</p>
                        <p class="w-[200px]">{{$product->count}}</p>
                        <p class="w-[200px]">{{$product->number}}</p>

                        <p class="w-[200px] truncate">{{$product->created_at}}</p>



                
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection