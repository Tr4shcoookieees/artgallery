@php use Illuminate\Contracts\Auth\MustVerifyEmail; @endphp
@extends('layouts.profile')

@section('content')
    <form id="send-verification" method="post" action="">
        @csrf
    </form>

    <main class="flex items-start gap-x-8"
          x-data="{ profile: true, author: false }"
    >
        <ul class="flex flex-col gap-y-2 min-w-[24ch]">
            <li class="p-4"
                x-on:click="profile = true; author = false"
                :class="{'bg-gray-200': profile}"
            >
                {{__('Profile information')}}
            </li>

            <li class="p-4"
                x-on:click="profile = false; author = true"
                :class="{'bg-gray-200': author}"
            >
                {{__('My author profile')}}
            </li>

            <li class="p-4">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Выйти</a>
                </form>
            </li>
        </ul>
        <div class="w-full">
            <div class="mx-auto bg-white shadow sm:rounded-lg sm:px-6 lg:px-8"
                 x-show="profile"
            >
                {{--<div class="p-4 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-user-avatar-form')
                    </div>
                </div>--}}

                <div class="p-4 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
            <div class="mx-auto bg-white shadow sm:rounded-lg sm:px-6 lg:px-8"
                 x-show="author"
            >
                <div class="p-4 sm:p-8">
                    <div class="max-w-xl">
                        @if($user->author !== null)
                            @include('profile.partials.update-author-information-form')
                        @else
                            You are not author.
                            {{--                            <a href="{{ route('profile.author.create') }}--}}
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
