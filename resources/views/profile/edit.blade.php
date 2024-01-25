@php use Illuminate\Contracts\Auth\MustVerifyEmail; @endphp
@extends('layouts.profile')

@section('content')
    <main class="flex items-start gap-x-8"
          x-data="{ profile: true, author: false }"
    >
        <ul class="flex flex-col gap-y-2 min-w-[24ch]">
            <x-li-element :value="__('Profile Information')" click="profile = true; author = false" select_class="{'bg-gray-200': profile}"/>
            <x-li-element :value="__('Author Profile')" click="profile = false; author = true" select_class="{'bg-gray-200': author}"/>

            @if($user->role->name === 'admin')
                <li class="rounded-sm p-4 hover:bg-gray-200">
                    <a href="{{ route('admin.index') }}">{{__('Admin Dashboard')}}</a>
                </li>
            @endif
            <li class="rounded-sm p-4 hover:bg-red-200">
                <form action="{{ route('logout') }}" method="post" onclick="this.submit()">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">{{__('Log out')}}</a>
                </form>
            </li>
        </ul>
        <div class="w-full">
            <div class="mx-auto bg-white shadow sm:rounded-lg sm:px-6 lg:px-8"
                 x-show="profile"
            >

                <div class="flex gap-x-8 p-4 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <div class="max-w-xl">
                        @include('profile.partials.update-user-avatar-form')
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
                @if($user->author === null)
                    <div class="p-4 sm:p-8">
                        <div class="max-w-xl">
                            @include('profile.partials.create-author-form')
                        </div>
                    </div>
                @else
                    <div class="flex gap-x-8 p-4 sm:p-8">
                        <div class="max-w-xl">
                            @include('profile.partials.update-author-information-form')
                        </div>

                        <div class="max-w-xl">
                            @include('profile.partials.create-artwork-form')
                        </div>
                    </div>

                    <div class="p-4 sm:p-8">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-author-form')
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </main>
@endsection

@section('scripts')
    {{----}}
@endsection
