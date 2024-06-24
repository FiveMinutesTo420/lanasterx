@extends('layouts.layout')
@section('title','Контакты')
@section('content')
<div class="flex flex-col items-center py-5 mt-8 space-y-12 pb-36">
    <p class="text-5xl border-b-2 border-b-gray-300">КОНТАКТЫ</p>
    <div class="flex flex-col w-[50%] mx-auto space-y-4 text-lg">
        <div class="flex w-full justify-between">
            <div class="w-1/2">ИМЯ:</div>
            <div class="w-1/2">СЕМЕНОВА СВЕТЛАНА НИКОЛАЕВНА</div>

        </div>
        <div class="flex w-full justify-between">
            <div class="w-1/2">МЕСТАНАХОЖДЕНИЕ:</div>
            <div class="w-1/2 flex flex-col space-y-2">
                <p>Республика Саха, Якутск, Сергеляхское шоссе 
                9 километр, 15/1.</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d468.21838597055796!2d129.6677536!3d62.0037846!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5bf6359127cbd49f%3A0x90835ae9f9835dae!2z0KHQtdGA0LPQtdC70Y_RhdGB0LrQvtC1INGILiwgOSwg0K_QutGD0YLRgdC6LCDQoNC10YHQvy4g0KHQsNGF0LAgKNCv0LrRg9GC0LjRjyksIDY3NzAxOQ!5e0!3m2!1sru!2sru!4v1698917184665!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
        <div class="flex w-full justify-between">
            <div class="w-1/2">СПОСОБЫ СВЯЗИ:</div>
            <div class="w-1/2 flex space-x-6">
                <img src="{{asset('images/site/2.png')}}" class="w-12 h-12 cursor-pointer" onclick="window.location.href = 'https://api.whatsapp.com/send/?phone=79841148151&text&type=phone_number&app_absent=0'" alt="">
                <img src="{{asset('images/site/1.png')}}" class="w-12 h-12" alt="">

            </div>
        </div>
    </div>
</div>
@endsection