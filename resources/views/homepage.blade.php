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
                <p class="text-sm font-light uppercase">{{__('Trends: works highly rated by our community')}}</p>
                <h3 class="mt-1 text-2xl font-light uppercase">{{__('Top of the month')}}</h3>
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
                <p class="text-sm font-light uppercase">{{__('Selected by our experts')}}</p>
                <h3 class="mt-1 text-2xl font-light uppercase">{{__('Popular artists')}}</h3>
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
                <p class="text-sm font-light uppercase">{{__('Selected by our experts')}}</p>
                <h3 class="mt-1 text-2xl font-light uppercase">{{__('You can find inspiration here')}}</h3>
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
            <h3 class="mb-2 text-2xl font-light uppercase">{{__('What is :app?', ['app' => config('app.name')])}}</h3>
            <div class="space-y-1">
                <p>{{__('The goal of ArtGallery was to create an online marketplace that would be simple, secure, and profitable for artists around the world. Thus was born a virtual art gallery with more than 3 million visitors. ArtGallery is ready to offer you exclusive prices for original works of art from both beginners and much more experienced and famous artists from all over the world with free delivery anywhere in the world in a short time, straight to your doorstep.')}}</p>
                <p>{{__('Enjoy selections carefully curated by our experts. Find inspiration in artwork in a wide range of styles, shapes and color palettes.')}}</p>
                <p>{{__('Here you will definitely find something that will later become an ideal gift or stylish decoration for your walls!')}}</p>
            </div>
        </section>
    </main>
@endsection
