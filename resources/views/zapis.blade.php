@extends('layouts.layout')
@section('title','Запись на мастер классы')
@section('content')
<style>
    form{
        width: 400px;
    }
</style>
<div class="flex flex-col items-center space-y-4 mt-8 w-full ">
    <p class="text-4xl">Запись на мастер-классы</p>
    <form action="{{route('zapis.add')}}" class="flex w-[500px]  flex-col space-y-4    p-2" method="POST">
        @csrf
        <div class="w-[400px]">
            <p>Ф.И.О</p>
            <input type="text" name="name" class=" p-2 w-full  rounded border">
        </div>
        <div class="w-[400px]">
            <p>Контактный телефон </p>
            <input type="text" name="number" class=" p-2 w-full rounded border">
        </div>
        <div class="w-[400px]">
            <p>Возраст участника</p>
            <input type="text" name="age" class=" p-2 w-full rounded border">
        </div>
        <div class="w-[400px]">
            <p>Количество участников</p>
            <input type="text" name="count" class=" p-2 w-full rounded border">
        </div>
        <div>
            <p class="text-xs">
                Мы свяжемся с вами в течении 24 часов, чтобы выбрать дату и время проведения мастер-класс
            </p>
        </div>
        <div>
            <input type="checkbox" id="check" required>

            <label for="check">Я согласен на обработку персональных данных</label>
        </div>
        <div>
            <input type="submit" value="Отправить" class="bg-green-500 p-2 text-white text-center w-full" >
        </div>
    </form>
</div>
@endsection


