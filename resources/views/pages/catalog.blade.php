@extends('layouts.main')

@section('content')
    <main class="md:px-14">
        <div class="text-center">
            <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, excepturi!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi deleniti dolorum facilis fugiat in ipsam optio rem reprehenderit similique? Assumenda blanditiis error ipsa nobis placeat quas. Alias aliquid, dolorum est officia ratione veritatis voluptas.</p>
        </div>
        {{--Sorting by name, price, size--}}
        <div class="mt-8 flex gap-x-8">
            <div class="w-1/4"></div>
            <div class="flex w-3/4 items-center justify-end gap-x-4">
                <div>
                    <label class="text-sm font-medium">Сортировать по:</label>
                </div>
                <a href="{{request()->fullUrl()}}" class="text-sm font-medium sorting-item mr-2" data-sorting-type="price">
                    <div class="inline-flex items-center gap-x-2">
                        <p>Цене</p>
                        @if(request('sort') === 'price%asc' || request('sort') === 'price%desc')
                            <x-filter-arrow style="{{request('sort') == 'price%desc' ? 'transform: rotate(180deg)' : ''}}"/>
                        @endif
                    </div>
                </a>
                <a href="{{request()->fullUrl()}}" class="text-sm font-medium sorting-item mr-2" data-sorting-type="title">
                    <div class="inline-flex items-center gap-x-2">
                        <p>Названию</p>
                        @if(request('sort') === 'title%asc' || request('sort') === 'title%desc')
                            <x-filter-arrow style="{{request('sort') == 'title%desc' ? 'transform: rotate(180deg)' : ''}}"/>
                        @endif
                    </div>
                </a>
                <a href="{{request()->fullUrl()}}" class="text-sm font-medium sorting-item mr-2" data-sorting-type="size">
                    <div class="inline-flex items-center gap-x-2">
                        <p>Размеру</p>
                        @if(request('sort') === 'size%asc' || request('sort') === 'size%desc')
                            <x-filter-arrow style="{{request('sort') == 'size%desc' ? 'transform: rotate(180deg)' : ''}}"/>
                        @endif
                    </div>
                </a>
            </div>
        </div>
        <div class="mt-8 flex gap-x-8">
            <aside class="flex w-1/4 flex-col gap-y-2">
                <x-filter-item :title="__('Category')">
                    <ul x-show="filter" id="categories">
                        @foreach($categories as $category)
                            <x-filter-input :model="$category" id_text="category-{{$category->id}}" type="radio" filter_name="category"/>
                        @endforeach
                    </ul>
                </x-filter-item>
                <x-filter-item :title="__('Style')">
                    <ul x-show="filter" id="styles">
                        @foreach($styles as $style)
                            <x-filter-input :model="$style" id_text="style-{{$style->id}}" type="checkbox" filter_name="style"/>
                        @endforeach
                    </ul>
                </x-filter-item>
                <x-filter-item :title="__('Theme')">
                    <ul x-show="filter" id="themes">
                        @foreach($themes as $theme)
                            <x-filter-input :model="$theme" id_text="theme-{{$theme->id}}" type="radio" filter_name="theme"/>
                        @endforeach
                    </ul>
                </x-filter-item>
                <x-filter-item :title="__('Price')">
                    <div x-show="filter" class="block bg-zinc-600 bg-opacity-10 px-5 py-3 first-letter:uppercase">
                        <div class="mx-3 mb-4 flex items-center justify-between">
                            <div>
                                <label class="text-sm font-medium">От</label>
                                <p id="min_value" class="font-medium">{{request()->has('price_from') ? request('price_from') : '0'}} &#8381;</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium">До</label>
                                <p id="max_value" class="font-medium">{{request()->has('price_to') ? request('price_to') : '700000'}} </p>
                            </div>
                        </div>
                        <div class="relative">
                            <div id="range_fill" class="absolute z-10 h-2"></div>

                            <label for="price_from" class="sr-only">Цена от</label>
                            <input class="" type="range" id="price_from" value="{{request()->has('price_from') ? request('price_from') : '0'}}" min="0" max="700000" step="100">

                            <label for="price_to" class="sr-only text-red-700">Цена до</label>
                            <input class="" type="range" id="price_to" value="{{request()->has('price_to') ? request('price_to') : '700000'}}" min="0" max="700000" step="1000">
                        </div>
                    </div>
                </x-filter-item>
                <x-filter-item :title="__('Color')">
                    <ul x-show="filter" id="themes">
                        @foreach($colors as $color)
                            <x-filter-input :model="$color" id_text="color-{{$color->id}}" type="checkbox" filter_name="color"/>
                        @endforeach
                    </ul>
                </x-filter-item>
                <x-link-primary href="{{ request()->fullUrl() }}" id="filter_link">{{__('Apply filters')}}</x-link-primary>
                @if(request()->hasAny(['category', 'style', 'theme', 'price_from', 'price_to']))
                    <x-link-primary href="{{ route('catalog') }}" id="filter_link">{{__('Reset filters')}}</x-link-primary>
                @endif
            </aside>
            <div class="relative w-3/4 columns-3 gap-8">
                @forelse($artworks as $artwork)
                    <x-catalog-item :artwork="$artwork"/>
                @empty
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center text-xl text-zinc-900 text-opacity-40">
                        <p>{{__('Artworks not found')}}</p>
                    </div>
                @endforelse
            </div>
        </div>
        {{$artworks->appends(request()->query())->links()}}
    </main>
@endsection

@section('scripts')
    @vite(['resources/js/productsFilter.js'])
@endsection
