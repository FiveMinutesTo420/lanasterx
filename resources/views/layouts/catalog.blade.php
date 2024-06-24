@extends("layouts.layout")
@section('content')
    <div class="w-4/5 mx-auto flex justify-between">
        <div class="p-4 w-1/4 flex flex-col space-y-4">
            <p class="font-semibold text-red-600 text-lg border-b py-2">ФИЛЬТР</p>
            <div class="text-lg font-semibold cursor-pointer" >Цена</div>
            <div class="flex flex-col ">
                <div class="">
                    
                    
                    От <input type="number" min="{{$cheapiest}}" value="@if(Request::has('from_price')){{Request::get('from_price')}}@else{{$cheapiest}}@endif" class="p-2 w-[40%] outline-none border-b" id="from_price">Руб.
                </div>
                <div class="">
                    До <input type="number" max="{{$expensive}}" value="@if(Request::has('to_price')){{Request::get('to_price')}}@else{{$expensive}}@endif" class="p-2 w-[40%] outline-none border-b" id="to_price">Руб.
                </div>
                <div class="">
                    <input type="submit" onclick="priceFilter()" value="Отфильтровать" class="p-2 px-4 border border-black cursor-pointer">
                </div>
                 
            </div>


            <!-- TODO::ADD GENDER FILTER HERE -->

        </div>
        <div class="w-[75%] p-5">

            @yield('products')
        </div>
    </div>

@endsection
@section('scripts')
<script src="{{url('js/catalog.js')}}"></script>
@endsection