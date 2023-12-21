@extends('layouts.guest')

@section('content')
    <div class="rounded bg-white p-8 ring-2 min-w-[384px] space-y-4 ring-primary">
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <div class="mb-4 text-sm text-gray-600 max-w-sm">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <form class="flex flex-col gap-y-3" method="post" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="flex flex-col gap-y-1">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="email"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <div class="flex flex-col gap-y-1">
                <x-input-label for="password" :value="__('Password')"/>
                <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <div class="flex flex-col gap-y-1">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
                <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password" name="password_confirmation" required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex flex-col gap-y-1">
                <x-primary-button type="submit">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
