@php use Carbon\Carbon; @endphp
@extends('layouts.admin')

@section('content')
    <main class="space-y-6">
        <section class="w-full items-center justify-center rounded-xl bg-gray-300 bg-opacity-20 shadow-lg white space-y-4">
            <header class="px-12 pt-6 pb-6">
                <h3 class="text-2xl font-medium">{{__('Order list')}}</h3>
            </header>
        </section>

        <div class="flex flex-col gap-y-6">
            {{$customers->links()}}
            <table class="w-full table-auto border border-slate-200 bg-opacity-20 shadow-xl">
                <thead>
                <tr class="bg-gray-200 text-slate-700">
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Customer')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Email')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Location')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Phone')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Orders')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Last order')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Total spent')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-normal">
                            <div class="flex items-center gap-x-4">
                                <img src="{{$customer->avatar_normalize}}" alt="avatar" class="h-8 w-8 rounded-full object-cover object-center">
                                <p class="text-start">{{$customer->name}}</p>
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start text-slate-600 font-light">
                            <div>
                                {{$customer->email}}
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start text-slate-600 font-light">
                            <div>
                                {{$customer->address}}
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start text-slate-600 font-light">
                            <div>
                                {{$customer->phone}}
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start text-slate-600 font-light">
                            <div>
                                {{$customer->orders_count}}
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 font-medium text-blue-400">
                            <div>
                                <a class="hover:underline" href="{{ route('order.edit', $customer->orders->last()->id) }}">#{{$customer->orders->last()->id}}</a>
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 font-medium text-green-500">
                            <div>
                                {{Number::currency($customer->orders->sum('price'), 'RUB', 'ru')}}
                            </div>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$customers->links()}}
        </div>
    </main>
@endsection

@section('scripts')

@endsection
