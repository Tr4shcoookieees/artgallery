<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--Applying styles--}}
    @vite(['resources/css/app.css'])
    <title>{{config('app.name')}}</title>
</head>
<body style="background-image: url({{request()->path() === 'login' ? asset('assets/login.jpg') : asset('assets/signup.jpg')}})" class="flex h-screen flex-col justify-between bg-cover">
<header class="flex items-center justify-center bg-white py-4">
    <a href="{{ route('home') }}">
        <x-logo/>
    </a>
</header>
<main class="flex items-center justify-center">
    @yield('content')
</main>
<footer class="bg-white py-2">
    <p class="mt-2 w-full select-none text-center text-sm font-light opacity-40">&copy; 2023 Абдрейкин М. А.<span class="hidden sm:inline">,</span> <br class="block sm:hidden"> ИСПС-11-21, г. Красноярск</p>
</footer>
</body>
</html>
