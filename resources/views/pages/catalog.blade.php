@extends('layouts.main')

@section('content')
    <main class="md:px-14">
        <div class="text-center">
            <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, excepturi!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi deleniti dolorum facilis fugiat in ipsam optio rem reprehenderit similique? Assumenda blanditiis error ipsa nobis placeat quas. Alias aliquid, dolorum est officia ratione veritatis voluptas.</p>
        </div>
        <div class="mt-8 flex gap-x-8">
            <aside class="flex w-1/4 flex-col gap-y-2" x-show="{categories: false, styles: false}">
                <x-filter-item :categories="$categories" :alpine="__('messages.filters.category')"/>
                <x-filter-item :categories="$styles" :alpine="__('messages.filters.style')"/>
            </aside>
            <div class="col-start-2 col-end-5 w-3/4 columns-3 gap-8">
                @forelse($artworks as $artwork)
                    {{--<div class="flex flex-col gap-y-8">
                        @foreach($artwork as $item)
                            <figure class="mb-4">
                                <img class="w-full object-cover object-center" src="{{$item->image}}" alt="{{$item->title}}">
                                <figcaption class="flex flex-col px-1 pt-4">
                                    <p class="break-words text-lg font-medium capitalize">{{$item->author->nickname}}</p>
                                    <p class="capitalize">"{{$item->title}}"</p>
                                    <p class="mb-2 font-light">{{$item->category->translations[\App::getLocale()]}} | {{$item->info['size']}}</p>
                                    <p class="font-medium">{{$item->price}} &#8381;</p>
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>--}}
                    <figure class="inline-block w-full mb-6">
                        <img src="{{$artwork->image}}" alt="{{$artwork->title}}" class="w-full">
                        <figcaption>
                            <p class="break-words text-lg font-medium capitalize">{{$artwork->author->nickname}}</p>
                            <p class="capitalize">"{{$artwork->title}}"</p>
                            <p class="mb-2 font-light">{{$artwork->category->translations[\App::getLocale()]}} | {{$artwork->info['size']}}</p>
                            <p class="font-medium">{{$artwork->price}} &#8381;</p>
                        </figcaption>
                    </figure>
                @empty
                    <div>
                        <p>Работы не найдены</p>
                        <a href="{{ route('catalog') }}">Сбросить фильтры</a>
                    </div>
                @endforelse
            </div>
        </div>
        {{$artworks->links()}}
    </main>
@endsection
