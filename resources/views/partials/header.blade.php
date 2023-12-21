<header class="border-b pb-4 border-primary">
    <div class="flex justify-between pb-2">
        <div class="inline-flex items-center gap-x-4">
            {{--<div x-data="{ isOpen: false }" class="flex flex-nowrap items-center gap-x-2">
                <img src="{{asset('assets/icons/compass.svg')}}" alt="region" class="select-none hover:animate-rotate-y" @click="isOpen = !isOpen">
                <div class="relative" @click.outside="isOpen = false">
                    <button id="selectedRegion" type="button" class="font-medium underline underline-offset-4" @click="isOpen = !isOpen">Москва,
                        Россия
                    </button>
                    <ul x-show="isOpen" class="absolute top-7 z-10 max-h-40 overflow-x-clip overflow-y-scroll border border-gray-100 bg-white bg-opacity-30 backdrop-blur-md backdrop-filter max-w-[250px] scrollbar-thin scrollbar-thumb-gray-400 animate-flip-down animate-duration-500">
                        <x-region-option/>
                    </ul>
                </div>
            </div>--}}
            <div class="flex items-center gap-x-2">
                <a href="{{route('set.locale', 'en')}}">
                    <img src="{{asset('assets/icons/flag-us.svg')}}" alt="language" class="h-4 w-auto select-none">
                </a>
                <a href="{{route('set.locale', 'ru')}}">
                    <img src="{{asset('assets/icons/flag-ru.svg')}}" alt="language" class="h-4 w-auto select-none">
                </a>
            </div>
            <div class="hidden gap-x-2 md:inline-flex">
                <a href="/er">{{__('Our address')}}</a>
                <a href="/er">{{__('Feedback')}}</a>
            </div>
        </div>
        <div class="flex flex-nowrap rounded-sm bg-zinc-100 p-2">
            <div class="hidden cursor-pointer flex-nowrap items-center gap-x-2 md:flex">
                @auth
                    <a href="{{route('profile.edit')}}">{{auth()->user()->name}}</a>
                    @if(auth()->user()->avatar !== null)
                        <img src="{{auth()->user()->avatar_normalize}}" alt="avatar" class="h-8 w-8 rounded-2xl">
                    @else
                        <x-default-avatar/>
                    @endif
                @endauth

                @guest
                    <a href="{{ route('login') }}">{{__('Log in')}}</a>
                    <span> / </span>
                    <a href="{{ route('signup') }}">{{__('Sign Up')}}</a>
                @endguest
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center gap-y-8 py-2">
        <a href="{{route('home')}}">
            <x-logo/>
        </a>
    </div>
    <nav class="relative flex items-center justify-center pt-2">
        <div class="w-1/4"></div>
        <ul class="flex mx-auto justify-between overflow-x-scroll font-medium scrollbar-none">
            <li class="px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('artworks.index', 'category=painting')}}">{{__('Painting')}}</a>
            </li>
            <li class="px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('artworks.index', 'category=photo')}}">{{__('Photo')}}</a>
            </li>
            <li class="px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('artworks.index', 'category=graphic')}}">{{__('Graphic')}}</a>
            </li>
            <li class="px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('artworks.index', 'category=nft')}}">{{__('NFT')}}</a>
            </li>
        </ul>
        <div class="hidden w-1/4 justify-end md:flex">
            <label for="searchBar" class="sr-only">Search bar</label>
            <div class="flex items-center rounded-sm border-gray-300 bg-zinc-100 px-4 py-3">
                <input type="text" class="w-10/12 border-none bg-transparent p-0 font-light focus:border-none focus:ring-0" placeholder="{{__('Search')}}" id="searchBar">
                <img src="{{asset('assets/icons/search.svg')}}" alt="search" class="ml-auto cursor-pointer select-none">
            </div>
        </div>
    </nav>
</header>
