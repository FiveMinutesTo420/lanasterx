<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois+Shadow&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('build/assets/app-7a5e674d.css')}}">
    <script src="{{url('build/assets/app-a6d2e222.js')}}"></script>

    @yield('head')

</head>
<body class="w-full">
    <div class="w-[70%] mx-auto flex justify-between py-4 items-center">
        <img src="{{url('images/logo/logo.png')}}" class="w-[100px]  cursor-pointer" onclick="window.location.href ='/'" alt="">
        <div class="text-center cursor-pointer"  onclick="window.location.href ='/'">
            <p class="text-5xl" style="font-family: 'Jacques Francois Shadow', serif;">LANASTERX</p>
            <p class="text-sm">Изделия из кожи и мастер-классы</p>
        </div>
        <div class="flex space-x-5 items-center">
            <a href="{{route('auth')}}"><img src="{{url('images/icons/user.png')}}" class="w-[30px]" alt=""></a>
            <a href="{{route('cart.page')}}"><img src="{{url('images/icons/cart.png')}}" class="w-[30px]" alt=""></a>
            @if(auth()->user())
            <a href="{{route('logout')}}"><svg fill="#000000" height="25px" width="25px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 384.971 384.971" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="Sign_Out"> <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03 C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03 C192.485,366.299,187.095,360.91,180.455,360.91z"></path> <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279 c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179 c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z"></path> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g></svg></a>
            @endif
        </div>
    </div>
    <header class="w-full sticky top-0 z-50  flex flex-col bg-[#79BD8F] py-4">
        <div class="w-[70%] mx-auto">
            <div class="flex justify-between text-white">
                <a href="/" class="hover:text-yellow-400 block max-w-fit">ГЛАВНАЯ</a>
                <a href="{{route('catalog')}}">КАТАЛОГ</a>

                <a href="{{route('about')}}">О НАС</a>

                <a href="{{route('master-course')}}">МАСТЕР КЛАССЫ</a>
                <a href="{{route('contacts')}}">КОНТАКТ</a>
                <a href="">ОТЗЫВЫ</a>
            </div>
        </div>
    </header>
    <main class="flex flex-col space-y-6 min-h-[80vh] ">
        @if(Session::has('success'))
        <div class="w-4/5 mx-auto bg-green-400 rounded-lg p-4 text-white mt-4">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="w-4/5 mx-auto bg-red-400 rounded-lg p-4 text-white mt-4">
            {{Session::get('error')}}
        </div>
        @endif
        @yield('content')
    </main>
    <footer class="flex flex-col py-12 ">

        <div class="w-full border-t-2 ">
            <div class="w-4/5 mx-auto p-4 py-12 flex space-x-1 justify-between">
            <div class="flex flex-col space-y-2">
                        <div class="flex flex-col h-[150px] space-y-2">
                            <p class=" font-semibold">Каталог</p>

                       
                        </div>
  
                    </div>
                    <div class="flex flex-col space-y-2">
                        <div class="flex flex-col h-[150px] space-y-2">
                            <a href={{route('about')}} <p class="hover:text-green-400 font-semibold">Компания</p></a>
                            <div class="text-xs font-light flex flex-col space-y-1">
                                <a href=""  class="hover:text-green-400 border-b-green-400 hover:border-b  block max-w-fit">О компании</a>
                                <a href=""  class="hover:text-green-400 border-b-green-400 hover:border-b  block max-w-fit">Новости</a>
                                <a href=""  class="hover:text-green-400 border-b-green-400 hover:border-b  block max-w-fit">Отзывы</a>
                                <a href=""  class="hover:text-green-400 border-b-green-400 hover:border-b  block max-w-fit">Лицензии</a>
                                <a href=""  class="hover:text-green-400 border-b-green-400 hover:border-b  block max-w-fit">Контакты</a>
                            </div>
                        </div>
  
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-col h-[150px] space-y-2">
                            <p class=" font-semibold">Информация</p>
                            <div class="text-xs font-light flex flex-col space-y-1">
                                <a href=""  class="hover:text-green-400 border-b-green-400 hover:border-b  block max-w-fit">Магазины</a>
                                <a href=""  class="hover:text-green-400 border-b-green-400 hover:border-b  block max-w-fit">Условия оплаты</a>
                                <a href=""  class="hover:text-green-400 border-b-green-400 hover:border-b  block max-w-fit">Условия доставки</a>
                                <a href=""  class="hover:text-green-400 border-b-green-400 hover:border-b  block max-w-fit">Гарантия на товар</a>
                                <a href=""  class="hover:text-green-400 border-b-green-400 hover:border-b  block max-w-fit">Блог</a>
                            </div>
                       
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex flex-col h-[150px] space-y-2">
                            <p class=" font-semibold">Помощь</p>
                            <div class="text-xs font-light flex flex-col space-y-1">
                                <a href=""  class="hover:text-green-400 border-b-green-400 hover:border-b  block max-w-fit">Только оригинал</a>
                       
                        </div>
                    </div>

                </div>
                <div class="flex flex-col px-8 border-l-gray-500  space-y-12">
                </div>
        </div>
    </footer>
    <script src="{{url('js/layout.js')}}"></script>
    @yield('scripts')
</body>
</html>