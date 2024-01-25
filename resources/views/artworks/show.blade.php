@extends('layouts.main')

@section('content')
    <main class="flex flex-col gap-y-8 md:px-14">
        <div class="grid grid-cols-12 grid-rows-1 border-b pb-8 border-primary">
            <figure class="relative col-start-1 col-end-9 max-h-[450px]">
                <img src="{{$artwork->image}}" alt="{{$artwork->title}}" class="w-full object-cover object-center max-h-[100%]">
                <figcaption class="absolute bottom-6 left-6 bg-zinc-600 bg-opacity-25 px-2 py-1 text-sm font-light text-white text-opacity-75">
                    <span>&copy; {{$artwork->author->nickname}}</span>
                </figcaption>
            </figure>
            <div class="col-start-10 col-end-13 flex flex-col gap-y-4">
                <div class="space-y-2">
                    <div>
                        <p class="text-lg font-medium capitalize">{{$artwork->title}}</p>
                        <p class="mt-2 flex items-center font-light capitalize">
                            <img src="{{$artwork->user->avatar ? $artwork->user->avatar_normalize : asset('storage/uploads/avatars/no-avatar.png')}}" alt="avatar" class="h-6 w-6 rounded-full mr-2">
                            {{$artwork->author->nickname}}
                        </p>
                    </div>
                    <div class="mt-1 text-sm">
                        <p class="">{{$artwork->category->nameNormalize}} | {{$artwork->width . 'x' . $artwork->height}} cm</p>
                        <p class="text-lg font-medium">{{$artwork->price}} ₽ <span class="font-light text-zinc-400">| {{__('Free shipping')}}</span></p>
                    </div>
                </div>
                <div class="flex flex-col space-y-4">
                    @if($artwork->quantity == 0)
                        <p class="text-lg font-medium text-zinc-400">{{__('This artwork has been sold')}}
                            @else
                                <x-primary-link class="w-full" :value="__('Order')" :href="route('order.create', 'product_id=' . $artwork->id)"/>
                        <p class="text-sm font-light text-zinc-400">{{__("ArtGallery Delivery: Delivery of this artwork is at the expense of ArtGallery and is carried out from the time of receipt of the application to the final delivery to the customer. Customs are not included.")}}</p>
                    @endif
                </div>
            </div>
        </div>
        {{--Полная информация--}}
        <section class="flex flex-col gap-y-4">
            <div class="grid grid-cols-4 place-content-center gap-4">
                @foreach($artwork->tags as $tag)
                    @if($tag['value'])
                        <div class="rounded-sm bg-zinc-100 p-6 text-center">
                            <div class="flex flex-col items-center">
                                @svg($tag['icon'], 'w-8 h-8 mb-4')
                                <p>{{__($tag['text_node'])}}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="space-y-3">
                <div>
                    <p>
                        <span class="font-medium">{{__('Product title')}}</span>: {{$artwork->title}}
                    </p>
                    <p>
                        <span class="font-medium">{{__('Category')}}</span>: {{__(ucfirst($artwork->category->name))}}
                    </p>
                    <p>
                        <span class="font-medium">{{__('Size')}}</span>: {{$artwork->width . 'x' . $artwork->height}} cm
                    </p>
                    <p>
                        <span class="font-medium">{{__('Style')}}</span>:
                        @foreach($artwork->styles as $style)
                            {{$style->name_normalize}}
                        @endforeach
                    </p>
                    <p>
                        <span class="font-medium">{{__('Material')}}</span>:
                        @forelse($artwork->materials as $material)
                            {{$material->name_normalize}}
                        @empty
                            {{__('Photo')}}
                        @endforelse
                    </p>
                </div>
            </div>
        </section>
        {{--Другие работы автора--}}
        <section class="flex flex-col">
            <div class="text-center lg:text-start">
                <h3 class="mt-1 text-2xl font-light uppercase">{{__('Other works by :author', ['author' => $artwork->author->nickname])}}</h3>
            </div>
            <div class="mt-4 flex gap-x-4">
                @foreach($artwork->author->artworks()->inRandomOrder()->limit(4)->get() as $author_artwork)
                    <a class="w-1/4" href="{{ route('artworks.show', $author_artwork->id) }}">
                        <figure class="overflow-hidden aspect-1">
                            <img src="{{$author_artwork->image}}" alt="{{$author_artwork->name}}" class="h-full w-full scale-100 object-cover object-center transition-transform duration-500 hover:scale-110">
                        </figure>
                    </a>
                @endforeach
            </div>
        </section>
    </main>
@endsection
