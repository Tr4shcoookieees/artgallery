@extends('layouts.guest')

@section('content')
    <form class="flex flex-col gap-y-6 rounded bg-white p-4 min-w-[35vw]" method="post" action="{{ route('signup') }}">
        @csrf
        <div class="flex flex-col gap-y-4">
            <a href="#">
                <figure class="flex items-center justify-center gap-x-2 bg-red-500 py-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                        <path d="M21.1794 9.38188L21.0734 8.93234H11.3028V13.0677H17.1406C16.5345 15.9458 13.722 17.4608 11.4247 17.4608C9.75313 17.4608 7.99109 16.7577 6.82484 15.6275C6.20953 15.0217 5.71974 14.3005 5.38353 13.5051C5.04731 12.7098 4.87126 11.856 4.86547 10.9925C4.86547 9.25062 5.64828 7.50828 6.78734 6.36219C7.92641 5.21609 9.64672 4.57484 11.3572 4.57484C13.3161 4.57484 14.72 5.615 15.245 6.08938L18.1836 3.16625C17.3216 2.40875 14.9534 0.5 11.2625 0.5C8.41484 0.5 5.68437 1.59078 3.68844 3.58016C1.71875 5.53906 0.699219 8.37172 0.699219 11C0.699219 13.6283 1.66391 16.3194 3.57266 18.2938C5.61219 20.3994 8.50063 21.5 11.4748 21.5C14.1809 21.5 16.7459 20.4397 18.5741 18.5159C20.3713 16.6222 21.3008 14.0019 21.3008 11.255C21.3008 10.0986 21.1845 9.41187 21.1794 9.38188Z" fill="white"/>
                    </svg>
                    <figcaption>
                        <p class="">Google</p>
                    </figcaption>
                </figure>
            </a>
            <a href="#">
                <figure class="flex items-center justify-center gap-x-2 bg-red-500 py-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                        <path d="M21.1794 9.38188L21.0734 8.93234H11.3028V13.0677H17.1406C16.5345 15.9458 13.722 17.4608 11.4247 17.4608C9.75313 17.4608 7.99109 16.7577 6.82484 15.6275C6.20953 15.0217 5.71974 14.3005 5.38353 13.5051C5.04731 12.7098 4.87126 11.856 4.86547 10.9925C4.86547 9.25062 5.64828 7.50828 6.78734 6.36219C7.92641 5.21609 9.64672 4.57484 11.3572 4.57484C13.3161 4.57484 14.72 5.615 15.245 6.08938L18.1836 3.16625C17.3216 2.40875 14.9534 0.5 11.2625 0.5C8.41484 0.5 5.68437 1.59078 3.68844 3.58016C1.71875 5.53906 0.699219 8.37172 0.699219 11C0.699219 13.6283 1.66391 16.3194 3.57266 18.2938C5.61219 20.3994 8.50063 21.5 11.4748 21.5C14.1809 21.5 16.7459 20.4397 18.5741 18.5159C20.3713 16.6222 21.3008 14.0019 21.3008 11.255C21.3008 10.0986 21.1845 9.41187 21.1794 9.38188Z" fill="white"/>
                    </svg>
                    <figcaption>
                        <p class="">Google</p>
                    </figcaption>
                </figure>
            </a>
        </div>
        <div>
            <p class="before:block after:block flex before:h-1 after:h-1 before:w-full after:w-full items-center justify-between gap-x-4 before:bg-zinc-400 after:bg-zinc-400 font-light uppercase">Или</p>
        </div>
        <div class="flex flex-col gap-y-2">
            <div>
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Имя" value="{{old('name')}}" required autofocus class="w-full">
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <div>
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Электронная почта" value="{{old('email')}}" required class="w-full">
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
            <div>
                <label for="password" class="sr-only">Name</label>
                <input type="password" name="password" id="password" placeholder="Пароль" value="{{old('password')}}" required class="w-full">
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>
            <div>
                <label for="password_confirmation" class="sr-only">Name</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Подтверждение пароля" required value="{{old('password_confirmation')}}" class="w-full">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>
            <p>Регистрируясь, вы соглашаетесь с <a class="underline" href="#">Условиями пользования</a> и <a class="underline" href="#">Политикой конфиденциальности</a></p>
            <div class="mt-4 flex flex-col gap-y-3 items-center">
                <x-button-primary type="submit">Создать учетную запись</x-button-primary>
                <p>Уже есть аккаунт? <a href="#">Войти</a></p>
            </div>
        </div>
    </form>
@endsection
