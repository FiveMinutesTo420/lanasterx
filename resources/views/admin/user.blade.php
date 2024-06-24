@extends('layouts.layout')
@section('title',"Изменить пользователя")
@section('content')
    <div class="mx-auto w-4/5 flex flex-col space-y-4">
        <div class="flex flex-col space-y-2 mt-4">
            @if($errors->any())
                {{$errors->first()}}
            @endif

            <p class="flex text-2xl border-b py-3 border-black font-[600]">
                @if(isset($product))
                    {{$product->lastname}}
                    {{$product->name}}
                @else
                    Добавить пользователя
                @endif

            </p>
            @if(isset($product))
            <form onsubmit="return confirm('Вы действительно хотите удалить этого пользователя?');" method="POST"  action="{{route('admin.user',$product->id)}}">
                @csrf

                @method('delete')
                <input type="submit"  value="Удалить" class="bg-red-500 p-2 px-4 rounded drop-shadow cursor-pointer text-white" >
            </form>
            @endif
            <form action="@if(isset($product)) {{route('admin.user',$product->id)}} @else {{route('admin.user')}}  @endif"  method="POST" class="w-full flex flex-col space-y-4">
                @csrf
                <div class="">
                    <div class="text-lg">Имя</div>
                    <input type="text" placeholder="Введите имя"  @if(isset($product)) value="{{$product->name}}" @endif @if(isset($product)) onchange="addToForm(this,'name')" @else name="name" @endif class="border-b w-1/4 outline-none py-4">
                </div>

                <div class="">
                    <div class="text-lg">Фамилия</div>
                    <input type="text" placeholder="Введите фамилию"  @if(isset($product)) value="{{$product->lastname}}" @endif @if(isset($product)) onchange="addToForm(this,'lastname')" @else name="lastname" @endif class="border-b w-1/4 outline-none py-4">
                </div>
                <div class="">
                    <div class="text-lg">Почта</div>
                    <input type="email" placeholder="Введите почту"  @if(isset($product)) value="{{$product->email}}" @endif @if(isset($product)) onchange="addToForm(this,'email')" @else name="email" @endif class="border-b w-1/4 outline-none py-4">
                </div>
                <div class="space-y-2">
                    <div class="text-lg">Пароль</div>

                    <input type="password" placeholder="Введите пароль"  @if(isset($product)) value="{{$product->password}}" @endif @if(isset($product)) onchange="addToForm(this,'password')" @else name="password" @endif class="border-b w-1/4 outline-none py-4">

                </div>
                <div class="space-y-2">
                    <div class="text-lg">Статус</div>

                    <select @if(isset($product)) onchange="addToForm(this,'status')" @else name="status" @endif class="py-2 w-1/4 border rounded px-3 outline-none" >

                        <option value="1" @if(isset($product)) @if($product->status == 1) selected @endif @endif class="p-2">Пользователь</option>
                        <option value="2" @if(isset($product)) @if($product->status == 2) selected @endif @endif class="p-2">Админ</option>
                         
           
                    </select>
                </div>
               
                <input type="submit"  value="@if(isset($product))Обновить @else Добавить @endif " class="py-2 px-4 border border-black w-1/4 cursor-pointer">
            </form>

        </div>
      
    </div>
@endsection
@section('scripts')
    <script src="{{url('js/admin.js')}}"></script>
@endsection