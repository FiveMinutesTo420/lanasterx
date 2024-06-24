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
            <div class="text-lg font-semibold cursor-pointer" onclick="expand(this)">Сезон</div>
            <div class="flex flex-col  ">
                @foreach($seasons as $i)
                <div class="flex space-x-2">
                    <input type="checkbox" id="season{{$i->id}}" onchange="seasonChanged(this,'{{Request::fullUrlWithQuery(['season'=> $i->slug])}}')" value="{{$i->slug}}"  @if(Request::has('season') && Request::get('season') == $i->slug) checked @endif class="cursor-pointer">
                    <label for="season{{$i->id}}" class="cursor-pointer">{{$i->name}}</label>

                </div>

                @endforeach
            </div>

            <div class="text-lg font-semibold cursor-pointer" >Бренд</div>
            <div class="flex flex-col ">
                @foreach($brands_f as $i)
                        @if($i->products->count()!=0 && $i->hasGender($gender_id) or $i->hasGender(3) )
                        <div class="flex space-x-2">
                            <input type="checkbox" id="brand{{$i->id}}" onchange="brandChanged(this,'{{Request::fullUrlWithQuery(['brand'=> $i->slug])}}')" value="{{$i->slug}}" @if(Request::has('brand') && Request::get('brand') == $i->slug) checked @endif class="cursor-pointer"><label for="brand{{$i->id}}" class="cursor-pointer">{{$i->name}}</label>
                        </div>
                        @endif
                @endforeach
            </div>
         
            <div class="text-lg font-semibold cursor-pointer" >Категория</div>
            <div class="flex flex-col">
                @foreach($categories as $i)
                        @if($i->products->count()!=0 && $i->hasGender($gender_id)  )
                        <div class="flex space-x-2">
                            <input type="checkbox" id="cat{{$i->id}}" onchange="categoryChanged(this,'{{Request::fullUrlWithQuery(['category'=> $i->slug])}}')" value="{{$i->slug}}"  @if(Request::has('category') && Request::get('category') == $i->slug) checked @endif class="cursor-pointer"><label for="cat{{$i->id}}" class="cursor-pointer">{{$i->name}}</label>

                        </div>
                        @endif
                @endforeach
            </div>
            

        </div>
        <div class="w-[75%] p-5">

            @yield('products')
        </div>
    </div>

@endsection
@section('scripts')
<script src="{{url('js/catalog.js')}}"></script>
@endsection