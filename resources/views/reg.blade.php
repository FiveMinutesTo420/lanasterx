@extends('layouts.layout')
@section('title','Регистрация')
@section('content')
<div class="flex justify-center mt-8">
    <div class="flex flex-col w-[30%] space-y-4">
        <h1 class="text-3xl font-semibold">Регистрация</h1>
        <p class="text-sm">Зарегистрируйтесь, чтобы использовать все возможности личного кабинета: связи с социальными сетями, оформление заказов и другие. Мы никогда и не при каких условиях не разглашаем личные данные клиентов. Контактная информация будет использована только для оформление заказов и более удобной работы с сайтом.</p>
        <form action="{{route('register.store')}}" class="space-y-4" method="POST">
            @csrf
            <div class="">
                <p>Ваш электронный адрес</p>
                <input type="email" name="email" value="{{old('email')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="">
                <p>Пароль</p>
                <input type="password" name="password" value="{{old('password')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="">
                <p>Подтвердите пароль</p>
                <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="">
                <p>Имя</p>
                <input type="text" name="name" value="{{old('name')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="">
                <p>Фамилия</p>
                <input type="text" name="lastname" value="{{old('lastname')}}" class="w-full p-2 border outline-none">
            </div>
            <div class="text-xs flex space-x-2">
                <input type="checkbox" required id="check" class=" cursor-pointer"> <label for="check" class=" cursor-pointer">Согласен с правилами регистрации и политикой конфиденциальности</label>
            </div>
            <input type="submit" value="Создать" class="bg-[#79BD8F] w-full cursor-pointer py-2 text-white">
            @if($errors->any())
                <div class="text-white p-4 rounded-lg bg-green-400 text-center">{{$errors->first()}}</div>
            @endif
        </form>

        <div class="flex flex-col items-center space-y-8">
            <a href="{{route('auth')}}" class="font-light border-black border-b hover:text-green-500 hover:border-green-500">Войти по email</a>
           
        </div>

    </div>
</div>
@endsection