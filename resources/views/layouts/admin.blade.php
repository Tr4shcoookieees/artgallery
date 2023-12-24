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
<body class="{{ app()->isLocal() ? 'debug-screens' : '' }}">
<div class="flex">
    <div class="z-50 bg-gray-800 min-w-[256px] scrollbar-none text-white">
        <div class="flex h-screen sticky top-0 flex-col bg-gray-600 scrollbar-none">
            <div class="px-4 pt-8 space-y-3">
                <div class="rounded-sm text-sm font-medium {{$tab == 'dashboard' ? 'bg-gray-800' : ''}}"
                     x-data="{ open: false, rotated: false }"
                >
                    <div class="flex cursor-pointer items-center justify-between p-4"
                         x-on:click="open = !open; rotated = !rotated"
                         :class="{'pb-2': open}"
                    >
                        <p>{{__('Dashboard')}}</p>
                        <x-filter-arrow path="gainsboro"/>
                    </div>
                    <ul class="rounded-sm text-slate-400 space-y-2 p-4 pt-0"
                        x-show="open"
                    >
                        <li class="{{$page == 'main' ? 'text-amber-300' : ''}}">
                            <a href="{{ route('admin.index') }}">{{ __('Main') }}</a>
                        </li>
                        <li class="text-gray-500 {{$page == 'admin/messages' ? 'text-amber-300' : ''}}">
                            <a onclick="event.preventDefault()" href="{{ route('admin.index') }}">{{ __('Messages') }}</a>
                        </li>
                        <li class="text-gray-500 {{$page == 'admin/messages' ? 'text-amber-300' : ''}}">
                            <a onclick="event.preventDefault()" href="{{ route('admin.index') }}">{{ __('Settings') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="rounded-sm text-sm font-medium {{$tab == 'commerce' ? 'bg-gray-800' : ''}}"
                     x-data="{ open: false, rotated: false }"
                >
                    <div class="flex cursor-pointer items-center justify-between p-4 text-white"
                         x-on:click="open = !open; rotated = !rotated"
                         :class="{'pb-2': open}"
                    >
                        <p>{{__('E-commerce')}}</p>
                        <x-filter-arrow path="gainsboro"/>
                    </div>
                    <ul class="rounded-sm text-slate-400 space-y-2 p-4 pt-0"
                        x-show="open"
                    >
                        <li class="{{$page == 'orders' ? 'text-amber-300' : ''}}">
                            <a href="{{ route('admin.orders') }}">{{ __('Orders') }}</a>
                        </li>
                        <li class="{{$page == 'customers' ? 'text-amber-300' : ''}}">
                            <a href="{{ route('admin.customers') }}">{{ __('Customers') }}</a>
                        </li>
                        <li class="{{$page == 'admin/messages' ? 'text-amber-300' : ''}}">
                            <a href="{{ route('admin.index') }}">{{ __('Statistic') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="rounded-sm text-sm font-medium {{$tab == 'community' ? 'bg-gray-800' : ''}}"
                     x-data="{ open: false, rotated: false }"
                >
                    <div class="flex cursor-pointer items-center justify-between p-4 text-white"
                         x-on:click="open = !open; rotated = !rotated"
                         :class="{'pb-2': open}"
                    >
                        <p>{{__('Community')}}</p>
                        <x-filter-arrow path="gainsboro"/>
                    </div>
                    <ul class="rounded-sm text-slate-400 space-y-2 p-4 pt-0"
                        x-show="open"
                    >
                        <li class="{{$page == 'users' ? 'text-amber-300' : ''}}">
                            <a href="{{ route('admin.users') }}">{{ __('Users') }}</a>
                        </li>
                        <li class="{{$page == 'authors' ? 'text-amber-300' : ''}}">
                            <a href="{{ route('admin.authors') }}">{{ __('Authors') }}</a>
                        </li>
                        <li class="text-gray-500 {{$page == 'admin/messages' ? 'text-amber-300' : ''}}">
                            <a onclick="event.preventDefault()" href="{{ route('admin.index') }}">{{ __('Requests') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="rounded-sm text-sm font-medium {{$tab == '123' ? 'bg-gray-800' : ''}}"
                     x-data="{ open: false, rotated: false }"
                >
                    <div class="flex cursor-pointer items-center justify-between p-4 text-white"
                         x-on:click="open = !open; rotated = !rotated"
                         :class="{'pb-2': open}"
                    >
                        <p>{{__('Finance')}}</p>
                        <x-filter-arrow path="gainsboro"/>
                    </div>
                    <ul class="rounded-sm text-slate-400 space-y-2 p-4 pt-0"
                        x-show="open"
                    >
                        <li class="text-gray-500 {{$page == 'admin/artworks' ? 'text-amber-300' : ''}}">
                            <a onclick="event.preventDefault()" href="{{ route('admin.index') }}">{{ __('Payment methods') }}</a>
                        </li>
                        <li class="text-gray-500 {{$page == 'admin/messages' ? 'text-amber-300' : ''}}">
                            <a onclick="event.preventDefault()" href="{{ route('admin.index') }}">{{ __('Transactions') }}</a>
                        </li>
                        <li class="text-gray-500 {{$page == 'admin/messages' ? 'text-amber-300' : ''}}">
                            <a onclick="event.preventDefault()" href="{{ route('admin.index') }}">{{ __('Transaction Details') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="rounded-sm text-sm font-medium {{$tab == '123' ? 'bg-gray-800' : ''}}">
                    <div class="flex cursor-pointer items-center justify-between p-4 text-gray-500 {{$page == 'admin' ? 'text-amber-300' : ''}}">
                        <a onclick="event.preventDefault()" href="{{ route('admin.index') }}">{{ __('Messages') }}</a>
                        <x-untitledui-message-chat-circle class="w-5 h-5"/>
                    </div>
                </div>
                <div class="rounded-sm text-sm font-medium {{$tab == '123' ? 'bg-gray-800' : ''}}">
                    <div class="flex cursor-pointer items-center justify-between p-4 text-gray-500">
                        <a onclick="event.preventDefault()" href="{{ route('admin.index') }}">{{ __('Activity') }}</a>
                        <x-untitledui-activity class="w-5 h-5"/>
                    </div>
                </div>
                <div class="rounded-sm text-sm font-medium {{$tab == '123' ? 'bg-gray-800' : ''}}">
                    <div class="flex cursor-pointer items-center justify-between p-4">
                        <a href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                        <x-untitledui-home-05 class="w-5 h-5"/>
                    </div>
                </div>
                <div class="rounded-sm text-sm font-medium {{$tab == '123' ? 'bg-gray-800' : ''}}">
                    <div class="flex cursor-pointer items-center justify-between p-4 text-red-500">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log out') }}</a>
                        </form>
                        <x-untitledui-log-out class="w-5 h-5"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full px-12 pt-8 pb-8">
        @yield('content')
    </div>
</div>
@yield('scripts')
</body>
</html>
