<!doctype html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{config('app.name')}} | 404</title>
</head>
<body class="h-screen w-screen font-inter bg-cover bg-center" style="background-image: url({{asset('assets/404.jpg')}})">
<section class="ml-32 flex h-screen w-4/12 flex-col justify-center gap-y-16 bg-white px-16">
    <div>
        <h1 class="mb-4 text-7xl font-black">404</h1>
        <p class="text-5xl font-light">Страница не найдена</p>
    </div>
    <div>
        <p class="mb-8 break-words text-4xl font-light">Кажется, вы заблудились!</p>
        <a class="bg-black px-5 py-4 font-light text-white outline-2 outline-black transition-colors duration-300 -outline-offset-1 hover:bg-white hover:text-black hover:outline"
           href="{{route('home')}}">Вернуться на главную</a>
    </div>
</section>
</body>
</html>
