@extends('layouts.main')

@section('content')
    <main class="md:px-14">
        <div class="text-center">
            <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, excepturi!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi deleniti dolorum facilis fugiat in ipsam optio rem reprehenderit similique? Assumenda blanditiis error ipsa nobis placeat quas. Alias aliquid, dolorum est officia ratione veritatis voluptas.</p>
        </div>
        <div class="mt-8 flex gap-x-8">
            <aside class="flex w-1/4 flex-col gap-y-2">
                <x-filter-item :title="__('messages.filters.category')">
                    <ul x-show="filter" id="categories">
                        @foreach($categories as $category)
                            <x-filter-input :model="$category" id_text="category-{{$category->id}}" type="radio" filter_name="category"/>
                        @endforeach
                    </ul>
                </x-filter-item>
                <x-filter-item :title="__('messages.filters.style')">
                    <ul x-show="filter" id="styles">
                        @foreach($styles as $style)
                            <x-filter-input :model="$style" id_text="style-{{$style->id}}" type="checkbox" filter_name="style"/>
                        @endforeach
                    </ul>
                </x-filter-item>
                <x-filter-item :title="__('messages.filters.theme')">
                    <ul x-show="filter" id="themes">
                        @foreach($themes as $theme)
                            <x-filter-input :model="$theme" id_text="theme-{{$theme->id}}" type="radio" filter_name="theme"/>
                        @endforeach
                    </ul>
                </x-filter-item>
                <x-filter-item :title="__('messages.filters.price')">
                    <div x-show="filter" class="px-5 py-3 block first-letter:uppercase">
                        <div class="flex justify-between items-center mx-3 mb-4">
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
                            <div id="range_fill" class="h-2 absolute z-10"></div>

                            <label for="price_from" class="sr-only">Цена от</label>
                            <input class="" type="range" id="price_from" value="{{request()->has('price_from') ? request('price_from') : '0'}}" min="0" max="700000" step="100">

                            <label for="price_to" class="sr-only text-red-700">Цена до</label>
                            <input class="" type="range" id="price_to" value="{{request()->has('price_to') ? request('price_to') : '700000'}}" min="0" max="700000" step="1000">
                        </div>
                    </div>
                </x-filter-item>
                <x-filter-item :title="__('messages.filters.color')">
                    <ul x-show="filter" id="themes">
                        @foreach($colors as $color)
                            <x-filter-input :model="$color" id_text="color-{{$color->id}}" type="checkbox" filter_name="color"/>
                        @endforeach
                    </ul>
                </x-filter-item>
                <x-link-primary href="{{ request()->fullUrl() }}" id="filter_link">{{__('Применить фильтры')}}</x-link-primary>
                @if(request()->hasAny(['category', 'style', 'theme', 'price_from', 'price_to']))
                    <x-link-primary href="{{ route('catalog') }}" id="filter_link">{{__('Сбросить фильтры')}}</x-link-primary>
                @endif
            </aside>
            <div class="w-3/4 columns-3 gap-8 relative">
                @forelse($artworks as $artwork)
                    <x-catalog-item :artwork="$artwork"/>
                @empty
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center text-zinc-900 text-xl text-opacity-40">
                        <p>Работы не найдены</p>
                    </div>
                @endforelse
            </div>
        </div>
        {{$artworks->links()}}
    </main>
@endsection

@section('scripts')
    @vite(['resources/js/productsFilter.js'])

    <script>
        const minValue = document.getElementById('min_value');
        const maxValue = document.getElementById('max_value');

        const rangeFill = document.getElementById('range_fill');

        function validateRange() {
            let minPrice = parseInt(inputElements[0].value);
            let maxPrice = parseInt(inputElements[1].value);

            if (minPrice > maxPrice) {
                let tempValue = maxPrice;
                maxPrice = minPrice;
                minPrice = tempValue;
            }

            const minPercentage = ((minPrice - 100) / 699900) * 100;
            const maxPercentage = ((maxPrice - 100) / 699900) * 100;

            rangeFill.style.left = minPercentage + "%";
            rangeFill.style.width = maxPercentage - minPercentage + "%";

            minValue.innerHTML = minPrice + "&#8381;";
            maxValue.innerHTML = maxPrice + "&#8381;";
        }

        const inputElements = document.querySelectorAll('input[type="range"]');

        inputElements.forEach((element) => {
            element.addEventListener("input", validateRange);
        });

        validateRange();
    </script>
@endsection
