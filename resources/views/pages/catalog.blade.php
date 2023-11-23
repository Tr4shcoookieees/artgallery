@extends('layouts.main')

@section('content')
    <main class="md:px-14">
        <div>
            <h1>{{trans('messages.feedback')}}</h1>
        </div>
        <div class="flex">
            <aside class="flex flex-col">
                <ul>
                    <li class="">Категория</li>
                    <li class="">Подкатегория</li>
                    <li class="">Стиль</li>
                    <li class="">Тема</li>
                    <li class="">Цена</li>
                    <li class="">Размер</li>
                    <li class="">Цвет</li>
                </ul>
            </aside>
            <div class="flex">
                <div>1</div>
                <div>2</div>
                <div>3</div>
            </div>
        </div>
    </main>
@endsection
