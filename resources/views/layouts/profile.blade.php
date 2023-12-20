<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--Applying styles--}}
    @vite(['resources/css/app.css', 'resources/js/alpineStart.js'])
    <title>{{config('app.name')}}</title>
</head>
<body class="min-h-screen max-w-full selection:bg-primary selection:text-white {{ app()->isLocal() ? 'debug-screens' : '' }}">
<div class="mx-auto flex flex-col gap-y-8 px-4 py-2 max-w-8xl">
    @include('partials.header')
    @yield('content')
</div>
<footer class="bg-white py-2">
    <p class="my-2 w-full select-none text-center text-sm font-light opacity-40">&copy; 2023 Абдрейкин М. А.<span class="hidden sm:inline">,</span> <br class="block sm:hidden"> ИСПС-11-21, г. Красноярск</p>
</footer>
@yield('scripts')
</body>
</html>
