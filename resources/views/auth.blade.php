@extends('layouts.layout')
@section('title','Авторизация')
@section('content')
    <div class="flex justify-center mt-8">
        
        <div class="flex flex-col w-[30%] space-y-4">
     
            <h1 class="text-3xl font-semibold">Личный кабинет</h1>
            <form method="POST" class="space-y-4" action="{{route('auth.store')}}">
                @csrf
                <div class="">
                    <p>Ваш электронный адрес</p>
                    <input type="email" name="email" value="{{old('email')}}" class="w-full p-2 border outline-none">
                </div>
                <div class="">
                    <p>Пароль</p>
                    <input type="password" name="password" value="{{old('password')}}" class="w-full p-2 border outline-none">
                </div>
    
                <input type="submit" value="Войти" class="bg-[#79BD8F] w-full cursor-pointer py-2 text-white">
                @if($errors->any())
                    <div class="text-red-500 text-center">{{$errors->first()}}</div>
                @endif
            </form>

            <div class="flex flex-col items-center space-y-8">
                <a href="" class="font-light border-black border-b hover:text-green-500 hover:border-green-500">Войти по телефону</a>
                <a href="" class="font-light border-black border-b hover:text-green-500 hover:border-green-500">Я не помню пароль</a>
                <a href="{{route('register')}}" class="font-light border-black border-b hover:text-green-500 hover:border-green-500">Зарегистрироваться</a>
               
            </div>
    
        </div>
    </div>
@endsection