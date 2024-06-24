@extends('layouts.layout')
@section('title',"Добавить/Изменить бренд")
@section('content')
    <div class="mx-auto w-4/5 flex flex-col space-y-4">
        <div class="flex flex-col space-y-2 mt-4">
            @if($errors->any())
                {{$errors->first()}}
            @endif
            <p class="flex text-2xl border-b py-3 border-black font-[600]">
                @if(isset($pr))
                    Изменить бренд
                    <form action="{{route('admin.brand',$pr->id)}}" method="POST" onsubmit="return confirm('Вы точно хотите удалить бренд?')">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="bg-red-500 p-2 px-4 rounded drop-shadow cursor-pointer text-white">
                    </form>
                @else
                Добавить бренд
                @endif
            </p>

            <form action="@if(isset($pr)) {{route('admin.brand',$pr->id )}} @else {{route('admin.brand')}} @endif" method="POST" class="w-full flex flex-col ">
                @csrf
                <p>Название бренда:</p>
                <input type="text" @if(isset($pr)) value="{{$pr->name}}" @endif name="name" class="border-b border-black  outline-none py-4 w-full">
                <input type="submit" value="@if(isset($pr))Изменить@else Добавить @endif" class="py-2 mt-4 px-4 border border-black w-1/4 cursor-pointer">
            </form>

        </div>
      
    </div>
@endsection
@section('scripts')
    <script src="{{url('js/admin.js')}}"></script>
@endsection