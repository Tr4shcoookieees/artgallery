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
<body>
<header></header>
<main></main>
<footer>
    <p class="mt-2 w-full text-center text-sm font-light opacity-40 select-none">&copy; 2023 Абдрейкин М. А.<span class="hidden sm:inline">,</span> <br class="block sm:hidden"> ИСПС-11-21, г. Красноярск</p>
</footer>
</body>
</html>
