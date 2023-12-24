@php use Carbon\Carbon; @endphp
@extends('layouts.admin')

@section('content')
    <main class="space-y-6">
        <section class="w-full items-center justify-center rounded-xl bg-gray-300 bg-opacity-20 shadow-lg white space-y-4">
            <header class="px-12 pt-6 pb-6">
                <h3 class="text-2xl font-medium">{{__('Orders list')}}</h3>
            </header>
        </section>

        <div class="flex flex-col gap-y-6">
            {{$orders->links()}}
            <table class="w-full table-auto border border-slate-200 bg-opacity-20 shadow-xl">
                <thead>
                <tr class="bg-gray-200 text-slate-700">
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium text-slate-600">{{__('Order ID')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium text-slate-600">{{__('Customer')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium text-slate-600">{{__('Date')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium text-slate-600">{{__('Price')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium text-slate-600">{{__('Product info')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium text-slate-600">{{__('Status')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-medium text-blue-400">
                            <div>
                                <a class="hover:underline" href="{{ route('order.edit', $order->id) }}">#{{$order->id}}</a>
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-normal">
                            <div class="flex items-center gap-x-4">
                                <img src="{{$order->user->avatar_normalize}}" alt="avatar" class="h-8 w-8 rounded-full object-cover object-center">
                                <p class="text-start">{{$order->user->name}}</p>
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-light text-slate-600">
                            <div>{{Carbon::make($order->created_at)->format('d/m/Y')}}</div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-medium text-green-500">
                            <div>{{ Number::currency($order->price, 'RUB', 'ru') }}</div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-light text-slate-600">
                            <div class="overflow-hidden truncate">{{$order->artwork->title}}</div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 font-light text-slate-600">
                            <x-status-code :order="$order"/>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$orders->links()}}
        </div>
    </main>
@endsection

@section('scripts')

@endsection
