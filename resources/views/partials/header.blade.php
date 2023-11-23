<header>
    <div class="flex justify-between pb-2">
        <div class="inline-flex items-center gap-x-4">
            <div x-data="{ isOpen: false }" class="flex flex-nowrap items-center gap-x-2">
                <img src="{{asset('assets/icons/compass.svg')}}" alt="region" class="hover:animate-rotate-y select-none" @click="isOpen = !isOpen">
                <div class="relative" @click.outside="isOpen = false">
                    <button id="selectedRegion" type="button" class="font-medium underline underline-offset-4" @click="isOpen = !isOpen">Москва,
                        Россия
                    </button>
                    <ul x-show="isOpen" class="absolute top-7 z-10 max-h-40 overflow-x-clip overflow-y-scroll border border-gray-100 bg-white bg-opacity-30 backdrop-blur-md backdrop-filter max-w-[250px] scrollbar-thin scrollbar-thumb-gray-400 animate-flip-down animate-duration-500">
                        <x-region-option/>
                    </ul>
                </div>
            </div>
            <div class="hidden gap-x-2 md:inline-flex">
                <a href="/er">{{__('messages.header.address')}}</a>
                <a href="/er">{{__('messages.header.feedback')}}</a>
            </div>
        </div>
        <div class="flex flex-nowrap rounded bg-zinc-600 bg-opacity-10 p-2">
            <img src="{{asset('assets/icons/flag-ru.svg')}}" alt="language" class="select-none">
            <div class="ml-8 hidden cursor-pointer flex-nowrap items-center gap-x-2 md:flex">
                @if(auth()->user())
                    <a href="/profile">Maxim Abdreikin</a>
                    @if(false)
                        {{--TODO: Вывод аватарки--}}
                        <img src="" alt="avatar">
                    @else
                        <x-default-avatar/>
                    @endif
                @else
                    <a href="/login">{{__('messages.header.login')}}</a>
                    <span> / </span>
                    <a href="/signup">{{__('messages.header.signup')}}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center gap-y-8 py-2">
        <a href="{{route('home')}}" >
            <x-logo/>
        </a>
    </div>
    <nav class="relative flex items-center justify-center pt-2 sm:grid md:grid-cols-12 md:grid-rows-1">
        <ul class="flex justify-start overflow-x-scroll font-medium scrollbar-none md:col-start-4 md:col-end-10">
            <li class="w-full px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('catalog', 'category=painting')}}">Картины</a>
            </li>
            <li class="w-full px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('catalog', 'category=photo')}}">Фотография</a>
            </li>
            <li class="w-full px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('catalog', 'category=graphics')}}">Графика</a>
            </li>
            <li class="w-full px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('catalog', 'category=nft')}}">NFT</a>
            </li>
        </ul>
        <div class="col-start-11 col-end-13 hidden md:block">
            <label for="searchBar" class="sr-only">Search bar</label>
            <div class="flex items-center border-gray-300 bg-zinc-600 bg-opacity-10 p-4">
                <input type="text" class="w-10/12 border-none bg-transparent p-0 font-light focus:border-none focus:ring-0" placeholder="{{__('messages.header.search')}}" id="searchBar">
                <img src="{{asset('assets/icons/search.svg')}}" alt="search" class="ml-auto cursor-pointer select-none">
            </div>
        </div>
    </nav>
</header>
