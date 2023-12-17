@extends('layouts.main')

@section('content')
    <main class="md:px-14 flex flex-col gap-y-8">
        <div class="grid grid-cols-12 grid-rows-1 border-b border-primary pb-8">
            <figure class="relative col-start-1 col-end-9 max-h-[450px]">
                <img src="{{$artwork->image}}" alt="{{$artwork->title}}" class="max-h-[100%] w-full object-center object-cover">
                <figcaption class="absolute bottom-6 left-6 bg-zinc-600 bg-opacity-25 text-white text-sm font-light py-1 px-2 text-opacity-75">
                    <span>&copy; {{$artwork->author->nickname}}</span>
                </figcaption>
            </figure>
            <div class="flex flex-col gap-y-5 col-start-10 col-end-13">
                <div>
                    <div>
                        <p class="capitalize font-medium text-lg">{{$artwork->title}}</p>
                        <p class="capitalize font-light">{{$artwork->author->nickname}}</p>
                    </div>
                    <div class="text-sm mt-1">
                        <p class="">{{$artwork->category->translations[app()->getLocale()]}} | {{$artwork->width . 'x' . $artwork->height}} cm</p>
                        <p class="text-lg font-medium">{{$artwork->price}} ₽ <span class="font-light text-zinc-400">| {{__('Free shipping')}}</span></p>
                    </div>
                </div>
                <div>
                    <x-button-primary type="button" class="w-full">{{__('Order')}}</x-button-primary>
                    <p class="text-sm font-light text-zinc-400 mt-2">{{__("ArtGallery Delivery: Delivery of this artwork is at the expense of ArtGallery and is carried out from the time of receipt of the application to the final delivery to the customer. Customs are not included.")}}</p>
                </div>
                <div>
                    <p><span class="font-medium">{{__('Size')}}:</span> {{__('Width') . ' - ' . $artwork->width}} cm, {{__('Height') . ' - ' . $artwork->height}} cm</p>
                    <p><span class="font-medium">{{__('Painting condition')}}:</span> {{$artwork->condition}}</p>
                    <p><span class="font-medium">{{__('Frame')}}:</span> Картина поставляется с рамой</p>
                </div>
            </div>
        </div>
        {{--Дополнительная информация--}}
        <section class="grid grid-cols-3 gap-2">
            <div class="p-3 text-center bg-zinc-100 rounded-sm">
                <div class="flex justify-center items-center gap-4 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" fill="none">
                        <g clip-path="url(#clip0_805_442)">
                            <path
                                d="M8 16C5.87827 16 3.84344 15.1571 2.34315 13.6569C0.842855 12.1566 0 10.1217 0 8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0C10.1217 0 12.1566 0.842855 13.6569 2.34315C15.1571 3.84344 16 5.87827 16 8C16 10.1217 15.1571 12.1566 13.6569 13.6569C12.1566 15.1571 10.1217 16 8 16ZM8.252 3.068C8.19536 3.03232 8.13184 3.00898 8.06557 2.99952C7.9993 2.99006 7.93178 2.99468 7.86742 3.01308C7.80306 3.03148 7.7433 3.06325 7.69205 3.10632C7.6408 3.14938 7.59921 3.20277 7.57 3.263L6.37 5.695L3.686 6.085C3.59729 6.0972 3.51381 6.13413 3.44511 6.19155C3.37641 6.24898 3.32525 6.32458 3.2975 6.40971C3.26975 6.49484 3.26652 6.58607 3.28818 6.67295C3.30985 6.75983 3.35553 6.83886 3.42 6.901L5.364 8.793L4.904 11.467C4.88924 11.5549 4.89928 11.6451 4.93301 11.7276C4.96674 11.8101 5.02281 11.8816 5.09491 11.9339C5.16702 11.9863 5.25231 12.0175 5.34118 12.0241C5.43006 12.0306 5.519 12.0122 5.598 11.971L8 10.709L10.4 11.97C10.479 12.0116 10.568 12.0303 10.6571 12.024C10.7461 12.0176 10.8316 11.9864 10.9038 11.9339C10.9761 11.8815 11.0322 11.8098 11.0658 11.7271C11.0994 11.6444 11.1092 11.554 11.094 11.466L10.636 8.793L12.578 6.9C12.6414 6.83757 12.6862 6.75871 12.7073 6.67226C12.7284 6.58582 12.725 6.4952 12.6974 6.41058C12.6699 6.32596 12.6194 6.25067 12.5515 6.19317C12.4836 6.13566 12.401 6.09821 12.313 6.085L9.628 5.695L8.428 3.263C8.38892 3.18269 8.3279 3.11508 8.252 3.068Z"
                                fill="black"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_805_442">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="text-lg">Уникальная работа</p>
                </div>
                <p class="font-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, sint.</p>
            </div>
            <div class="p-3 text-center bg-zinc-100 rounded-sm">
                <div class="flex justify-center items-center gap-4 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" fill="none">
                        <g clip-path="url(#clip0_805_442)">
                            <path
                                d="M8 16C5.87827 16 3.84344 15.1571 2.34315 13.6569C0.842855 12.1566 0 10.1217 0 8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0C10.1217 0 12.1566 0.842855 13.6569 2.34315C15.1571 3.84344 16 5.87827 16 8C16 10.1217 15.1571 12.1566 13.6569 13.6569C12.1566 15.1571 10.1217 16 8 16ZM8.252 3.068C8.19536 3.03232 8.13184 3.00898 8.06557 2.99952C7.9993 2.99006 7.93178 2.99468 7.86742 3.01308C7.80306 3.03148 7.7433 3.06325 7.69205 3.10632C7.6408 3.14938 7.59921 3.20277 7.57 3.263L6.37 5.695L3.686 6.085C3.59729 6.0972 3.51381 6.13413 3.44511 6.19155C3.37641 6.24898 3.32525 6.32458 3.2975 6.40971C3.26975 6.49484 3.26652 6.58607 3.28818 6.67295C3.30985 6.75983 3.35553 6.83886 3.42 6.901L5.364 8.793L4.904 11.467C4.88924 11.5549 4.89928 11.6451 4.93301 11.7276C4.96674 11.8101 5.02281 11.8816 5.09491 11.9339C5.16702 11.9863 5.25231 12.0175 5.34118 12.0241C5.43006 12.0306 5.519 12.0122 5.598 11.971L8 10.709L10.4 11.97C10.479 12.0116 10.568 12.0303 10.6571 12.024C10.7461 12.0176 10.8316 11.9864 10.9038 11.9339C10.9761 11.8815 11.0322 11.8098 11.0658 11.7271C11.0994 11.6444 11.1092 11.554 11.094 11.466L10.636 8.793L12.578 6.9C12.6414 6.83757 12.6862 6.75871 12.7073 6.67226C12.7284 6.58582 12.725 6.4952 12.6974 6.41058C12.6699 6.32596 12.6194 6.25067 12.5515 6.19317C12.4836 6.13566 12.401 6.09821 12.313 6.085L9.628 5.695L8.428 3.263C8.38892 3.18269 8.3279 3.11508 8.252 3.068Z"
                                fill="black"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_805_442">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="text-lg">Уникальная работа</p>
                </div>
                <p class="font-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, sint.</p>
            </div>
            <div class="p-3 text-center bg-zinc-100 rounded-sm">
                <div class="flex justify-center items-center gap-4 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" fill="none">
                        <g clip-path="url(#clip0_805_442)">
                            <path
                                d="M8 16C5.87827 16 3.84344 15.1571 2.34315 13.6569C0.842855 12.1566 0 10.1217 0 8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0C10.1217 0 12.1566 0.842855 13.6569 2.34315C15.1571 3.84344 16 5.87827 16 8C16 10.1217 15.1571 12.1566 13.6569 13.6569C12.1566 15.1571 10.1217 16 8 16ZM8.252 3.068C8.19536 3.03232 8.13184 3.00898 8.06557 2.99952C7.9993 2.99006 7.93178 2.99468 7.86742 3.01308C7.80306 3.03148 7.7433 3.06325 7.69205 3.10632C7.6408 3.14938 7.59921 3.20277 7.57 3.263L6.37 5.695L3.686 6.085C3.59729 6.0972 3.51381 6.13413 3.44511 6.19155C3.37641 6.24898 3.32525 6.32458 3.2975 6.40971C3.26975 6.49484 3.26652 6.58607 3.28818 6.67295C3.30985 6.75983 3.35553 6.83886 3.42 6.901L5.364 8.793L4.904 11.467C4.88924 11.5549 4.89928 11.6451 4.93301 11.7276C4.96674 11.8101 5.02281 11.8816 5.09491 11.9339C5.16702 11.9863 5.25231 12.0175 5.34118 12.0241C5.43006 12.0306 5.519 12.0122 5.598 11.971L8 10.709L10.4 11.97C10.479 12.0116 10.568 12.0303 10.6571 12.024C10.7461 12.0176 10.8316 11.9864 10.9038 11.9339C10.9761 11.8815 11.0322 11.8098 11.0658 11.7271C11.0994 11.6444 11.1092 11.554 11.094 11.466L10.636 8.793L12.578 6.9C12.6414 6.83757 12.6862 6.75871 12.7073 6.67226C12.7284 6.58582 12.725 6.4952 12.6974 6.41058C12.6699 6.32596 12.6194 6.25067 12.5515 6.19317C12.4836 6.13566 12.401 6.09821 12.313 6.085L9.628 5.695L8.428 3.263C8.38892 3.18269 8.3279 3.11508 8.252 3.068Z"
                                fill="black"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_805_442">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="text-lg">Уникальная работа</p>
                </div>
                <p class="font-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, sint.</p>
            </div>
            <div class="p-3 text-center bg-zinc-100 rounded-sm">
                <div class="flex justify-center items-center gap-4 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" fill="none">
                        <g clip-path="url(#clip0_805_442)">
                            <path
                                d="M8 16C5.87827 16 3.84344 15.1571 2.34315 13.6569C0.842855 12.1566 0 10.1217 0 8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0C10.1217 0 12.1566 0.842855 13.6569 2.34315C15.1571 3.84344 16 5.87827 16 8C16 10.1217 15.1571 12.1566 13.6569 13.6569C12.1566 15.1571 10.1217 16 8 16ZM8.252 3.068C8.19536 3.03232 8.13184 3.00898 8.06557 2.99952C7.9993 2.99006 7.93178 2.99468 7.86742 3.01308C7.80306 3.03148 7.7433 3.06325 7.69205 3.10632C7.6408 3.14938 7.59921 3.20277 7.57 3.263L6.37 5.695L3.686 6.085C3.59729 6.0972 3.51381 6.13413 3.44511 6.19155C3.37641 6.24898 3.32525 6.32458 3.2975 6.40971C3.26975 6.49484 3.26652 6.58607 3.28818 6.67295C3.30985 6.75983 3.35553 6.83886 3.42 6.901L5.364 8.793L4.904 11.467C4.88924 11.5549 4.89928 11.6451 4.93301 11.7276C4.96674 11.8101 5.02281 11.8816 5.09491 11.9339C5.16702 11.9863 5.25231 12.0175 5.34118 12.0241C5.43006 12.0306 5.519 12.0122 5.598 11.971L8 10.709L10.4 11.97C10.479 12.0116 10.568 12.0303 10.6571 12.024C10.7461 12.0176 10.8316 11.9864 10.9038 11.9339C10.9761 11.8815 11.0322 11.8098 11.0658 11.7271C11.0994 11.6444 11.1092 11.554 11.094 11.466L10.636 8.793L12.578 6.9C12.6414 6.83757 12.6862 6.75871 12.7073 6.67226C12.7284 6.58582 12.725 6.4952 12.6974 6.41058C12.6699 6.32596 12.6194 6.25067 12.5515 6.19317C12.4836 6.13566 12.401 6.09821 12.313 6.085L9.628 5.695L8.428 3.263C8.38892 3.18269 8.3279 3.11508 8.252 3.068Z"
                                fill="black"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_805_442">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="text-lg">Уникальная работа</p>
                </div>
                <p class="font-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, sint.</p>
            </div>
            <div class="p-3 text-center bg-zinc-100 rounded-sm">
                <div class="flex justify-center items-center gap-4 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16" fill="none">
                        <g clip-path="url(#clip0_805_442)">
                            <path
                                d="M8 16C5.87827 16 3.84344 15.1571 2.34315 13.6569C0.842855 12.1566 0 10.1217 0 8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0C10.1217 0 12.1566 0.842855 13.6569 2.34315C15.1571 3.84344 16 5.87827 16 8C16 10.1217 15.1571 12.1566 13.6569 13.6569C12.1566 15.1571 10.1217 16 8 16ZM8.252 3.068C8.19536 3.03232 8.13184 3.00898 8.06557 2.99952C7.9993 2.99006 7.93178 2.99468 7.86742 3.01308C7.80306 3.03148 7.7433 3.06325 7.69205 3.10632C7.6408 3.14938 7.59921 3.20277 7.57 3.263L6.37 5.695L3.686 6.085C3.59729 6.0972 3.51381 6.13413 3.44511 6.19155C3.37641 6.24898 3.32525 6.32458 3.2975 6.40971C3.26975 6.49484 3.26652 6.58607 3.28818 6.67295C3.30985 6.75983 3.35553 6.83886 3.42 6.901L5.364 8.793L4.904 11.467C4.88924 11.5549 4.89928 11.6451 4.93301 11.7276C4.96674 11.8101 5.02281 11.8816 5.09491 11.9339C5.16702 11.9863 5.25231 12.0175 5.34118 12.0241C5.43006 12.0306 5.519 12.0122 5.598 11.971L8 10.709L10.4 11.97C10.479 12.0116 10.568 12.0303 10.6571 12.024C10.7461 12.0176 10.8316 11.9864 10.9038 11.9339C10.9761 11.8815 11.0322 11.8098 11.0658 11.7271C11.0994 11.6444 11.1092 11.554 11.094 11.466L10.636 8.793L12.578 6.9C12.6414 6.83757 12.6862 6.75871 12.7073 6.67226C12.7284 6.58582 12.725 6.4952 12.6974 6.41058C12.6699 6.32596 12.6194 6.25067 12.5515 6.19317C12.4836 6.13566 12.401 6.09821 12.313 6.085L9.628 5.695L8.428 3.263C8.38892 3.18269 8.3279 3.11508 8.252 3.068Z"
                                fill="black"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_805_442">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="text-lg">Уникальная работа</p>
                </div>
                <p class="font-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, sint.</p>
            </div>
        </section>
        {{--Информация о товаре--}}
        {{--        <section class="flex flex-col">--}}
        {{--            <div class="text-center lg:text-start">--}}
        {{--                <h3 class="mt-1 text-2xl font-light uppercase">Другие работы автора</h3>--}}
        {{--            </div>--}}
        {{--            <div class="mt-4 flex gap-x-4">--}}
        {{--                @foreach($artwork->author->artworks()->inRandomOrder()->limit(4)->get() as $author_artwork)--}}
        {{--                    <a class="w-1/4" href="{{ route('artworks.show', $author_artwork->id) }}">--}}
        {{--                        <figure class="aspect-1 overflow-hidden">--}}
        {{--                            <img src="{{$author_artwork->image}}" alt="{{$author_artwork->name}}" class="w-full h-full object-center object-cover scale-110 hover:scale-100 transition-transform duration-500">--}}
        {{--                        </figure>--}}
        {{--                    </a>--}}
        {{--                @endforeach--}}
        {{--            </div>--}}
        {{--        </section>--}}
        {{--Другие работы автора--}}
        <section class="flex flex-col">
            <div class="text-center lg:text-start">
                <h3 class="mt-1 text-2xl font-light uppercase before:content-['/f3a5']">Другие работы {{$artwork->author->nickname}}</h3>
            </div>
            <div class="mt-4 flex gap-x-4">
                @foreach($artwork->author->artworks()->inRandomOrder()->limit(4)->get() as $author_artwork)
                    <a class="w-1/4" href="{{ route('artworks.show', $author_artwork->id) }}">
                        <figure class="aspect-1 overflow-hidden">
                            <img src="{{$author_artwork->image}}" alt="{{$author_artwork->name}}" class="w-full h-full object-center object-cover scale-100 hover:scale-110 transition-transform duration-500">
                        </figure>
                    </a>
                @endforeach
            </div>
        </section>
        {{--Комментарии--}}

    </main>
@endsection
