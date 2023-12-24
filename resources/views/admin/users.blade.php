@php use Carbon\Carbon; @endphp
@extends('layouts.admin')

@section('content')
    <main class="space-y-6">
        <section class="w-full items-center justify-center rounded-xl bg-gray-300 bg-opacity-20 shadow-lg white space-y-4">
            <header class="px-12 pt-6 pb-6">
                <h3 class="text-2xl font-medium">{{__('Users list')}}</h3>
            </header>
        </section>

        <div class="flex flex-col gap-y-6">
            {{$users->links()}}
            <table class="w-full table-auto border border-slate-200 bg-opacity-20 shadow-xl">
                <thead>
                <tr class="bg-gray-200 text-slate-700">
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('User')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Email')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Location')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Phone')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Age')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Role')}}</th>
                    <th class="border-b border-slate-200 py-2 pl-4 text-start font-medium">{{__('Registered at')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-normal">
                            <div class="flex items-center gap-x-4">
                                <img src="{{$user->avatar_normalize}}" alt="avatar" class="h-8 w-8 rounded-full object-cover object-center">
                                <p class="text-start">{{$user->name}}</p>
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-light text-slate-600">
                            <div>
                                {{$user->email}}
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-light text-slate-600">
                            <div>
                                {{$user->address}}
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-light text-slate-600">
                            <div>
                                {{$user->phone}}
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-light text-slate-600">
                            <div>
                                {{$user->age . ' ' . __('years')}}
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-medium text-slate-600">
                            <div>
                                {{__(ucfirst($user->role->name))}}
                            </div>
                        </th>
                        <th class="border-b border-slate-200 py-3 pr-6 pl-4 text-start font-light text-slate-600">
                            <div>
                                {{Carbon::parse($user->created_at)->format('d/m/Y')}}
                            </div>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </main>
@endsection

@section('scripts')

@endsection
