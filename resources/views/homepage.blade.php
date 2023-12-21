@extends('layouts.main')

@section('content')
    <section style="background-image: url('{{asset('assets/banner.jpg')}}')" class="flex h-auto w-full flex-nowrap items-center justify-center bg-cover bg-fixed bg-bottom bg-blend-color-burn sm:h-96">
        <div class="flex h-full w-full flex-col items-center justify-center gap-y-2 rounded-sm bg-white bg-opacity-10 px-6 py-6 text-center font-light text-gray-200 backdrop-blur-sm backdrop-filter sm:px-16 sm:py-10 md:h-auto lg:w-auto">
            <h1 class="text-2xl uppercase sm:text-3xl">{{__('Buying art has become much easier')}}</h1>
            <p>{{__(':appName is exactly the place you have been looking for!', ['appName' => config('app.name')])}}</p>
            <p>{{__('Free shipping, fair prices, over a million works from around the world for sale!')}}</p>
            <x-primary-link href="{{route('artworks.index')}}" class="mt-2 hover:bg-opacity-10">{{__('Learn more')}}</x-primary-link>
        </div>
    </section>
    <main class="md:px-14">
        <section class="flex flex-col">
            <div class="text-center lg:text-start">
                <p class="text-sm font-light uppercase">Тренды: работы, высоко оцененные нашим сообществом</p>
                <h3 class="mt-1 text-2xl font-light uppercase">Работы месяца</h3>
            </div>
            <div class="mt-4 grid auto-rows-auto gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3">
                @foreach($artworks_ten[0] as $artwork)
                    @if($loop->iteration == 1)
                        <figure class="relative sm:col-span-2 lg:col-span-2">
                            <x-artwork-card-homepage :author="$artwork->author->nickname" :artwork="$artwork"/>
                        </figure>
                    @else
                        <figure class="relative">
                            <x-artwork-card-homepage :author="$artwork->author->nickname" :artwork="$artwork"/>
                        </figure>
                    @endif
                @endforeach
            </div>
        </section>
        <section class="mt-8 flex flex-col">
            <div class="text-center lg:text-start">
                <p class="text-sm font-light uppercase">Выбрано нашими экспертами</p>
                <h3 class="mt-1 text-2xl font-light uppercase">Популярные художники</h3>
            </div>
            <div class="mt-4 grid gap-4 sm:grid-cols-2 sm:grid-rows-2 lg:grid-cols-4 lg:grid-rows-1">
                @foreach($artworks_four as $artwork)
                    <figure class="relative">
                        <x-artwork-card-homepage :author="$artwork->author->nickname" :artwork="$artwork"/>
                    </figure>
                @endforeach
            </div>
        </section>
        <section class="mt-8 flex flex-col">
            <div class="text-center lg:text-start">
                <p class="text-sm font-light uppercase">Выбрано нашими экспертами</p>
                <h3 class="mt-1 text-2xl font-light uppercase">Здесь вы найдете вдохновение</h3>
            </div>
            <div class="mt-4 grid auto-rows-auto gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3">
                @foreach($artworks_ten[1] as $artwork)
                    @if($loop->iteration == 1)
                        <figure class="relative sm:col-span-2 lg:col-span-2">
                            <x-artwork-card-homepage :author="$artwork->author->nickname" :artwork="$artwork"/>
                        </figure>
                    @else
                        <figure class="relative">
                            <x-artwork-card-homepage :author="$artwork->author->nickname" :artwork="$artwork"/>
                        </figure>
                    @endif
                @endforeach
            </div>
        </section>
        <section class="mt-8">
            <h3 class="text-2xl font-light uppercase">Что такое {{config('app.name')}}?</h3>
            <p>Целью создания ArtGallery послужило создание онлайн-рынка, который был бы простым, безопасным и прибыльным для художников во всем мире. Так родилась виртуальная художественная галерея с более, чем 3 миллионами посетителей. ArtGallery готова предложить Вам эксклюзивные цены на оригинальные произведения искусства как начинающих, так и намного более опытных и известных художников со всего мира с бесплатной доставкой в любую точку планеты в короткие сроки прямиком к порогу вашего дома.<br>Наслаждайтесь подборками, тщательно составленными нашими экспертами. Ищите вдохновение в работах, выполненных в самых различных стилях, формах и цветовых палитрах.<br>Здесь Вы обязательно найдете что-то, что в последствии станет идеальным подарком или стильным украшением ваших стен!</p>
        </section>
    </main>
@endsection
