@extends('layouts.guest')

@section('content')
    <div class="rounded bg-white p-8 ring-2 min-w-[384px] space-y-4 ring-primary">
        <x-oauth-button :oauthCallbackLink="route('oauth.google.redirect')" title="Google">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M21.1794 9.38188L21.0734 8.93234H11.3028V13.0677H17.1406C16.5345 15.9458 13.722 17.4608 11.4247 17.4608C9.75313 17.4608 7.99109 16.7577 6.82484 15.6275C6.20953 15.0217 5.71974 14.3005 5.38353 13.5051C5.04731 12.7098 4.87126 11.856 4.86547 10.9925C4.86547 9.25062 5.64828 7.50828 6.78734 6.36219C7.92641 5.21609 9.64672 4.57484 11.3572 4.57484C13.3161 4.57484 14.72 5.615 15.245 6.08938L18.1836 3.16625C17.3216 2.40875 14.9534 0.5 11.2625 0.5C8.41484 0.5 5.68437 1.59078 3.68844 3.58016C1.71875 5.53906 0.699219 8.37172 0.699219 11C0.699219 13.6283 1.66391 16.3194 3.57266 18.2938C5.61219 20.3994 8.50063 21.5 11.4748 21.5C14.1809 21.5 16.7459 20.4397 18.5741 18.5159C20.3713 16.6222 21.3008 14.0019 21.3008 11.255C21.3008 10.0986 21.1845 9.41187 21.1794 9.38188Z" fill="white"/>
            </svg>
        </x-oauth-button>

        <x-auth-divider/>

        <form class="flex flex-col gap-y-3" method="post" action="{{ route('signup') }}">
            @csrf
            <div class="flex flex-col gap-y-1">
                <x-input-label for="name" :value="__('Name')" class="sr-only"/>
                <x-text-input id="name" name="name" type="text" :value="old('name')" :placeholder="__('Name')" required autofocus/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <div class="flex flex-col gap-y-1">
                <x-input-label for="email" :value="__('Email')" class="sr-only"/>
                <x-text-input id="email" name="email" type="email" :value="old('email')" :placeholder="__('Email')" required/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <div class="flex flex-col gap-y-1">
                <x-input-label for="password" :value="__('Password')" class="sr-only"/>
                <x-text-input id="password" name="password" type="password" :value="old('password')" :placeholder="__('Password')" required/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <div class="flex flex-col gap-y-1">
                <x-input-label for="password_confirmation" :value="__('Confirm password')" class="sr-only"/>
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" :value="old('password_confirmation')" :placeholder="__('Confirm password')" required/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <div class="mt-4 flex flex-col items-center justify-center">
                <x-primary-button :value="__('Sign Up')"/>
                @if(Route::has('login'))
                    <p class="mt-2 text-gray-400">{{__('Already have an account?')}} <a class="underline" href="{{ route('login') }}">{{__('Log in')}}</a></p>
                @endif

                <div class="mt-3 max-w-sm text-center text-xs text-gray-400">
                    <p>Регистрируясь, вы соглашаетесь с <a class="underline" href="#">Условиями пользования</a> и <a class="underline" href="#">Политикой конфиденциальности</a></p>
                </div>
            </div>
        </form>
    </div>
@endsection
