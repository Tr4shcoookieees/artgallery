@extends('layouts.guest')

@section('content')
    <div class="rounded bg-white p-8 ring-2 min-w-[384px] space-y-4 ring-primary">
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <div class="mb-4 text-sm text-gray-600 max-w-sm">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <form class="flex flex-col gap-y-3" method="post" action="{{ route('password.email') }}">
            @csrf
            <div>
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <div class="mt-4 flex items-center justify-end">
                <x-primary-button type="submit">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
