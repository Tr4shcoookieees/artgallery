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
                <a href="/er">{{__('Our address')}}</a>
                <a href="/er">{{__('Feedback')}}</a>
            </div>
        </div>
        <div class="flex flex-nowrap rounded bg-zinc-600 bg-opacity-10 p-2">
            <div class="flex items-center gap-x-2">
                <a href="{{route('set.locale', 'en')}}">
                    <img src="{{asset('assets/icons/flag-us.svg')}}" alt="language" class="select-none h-4 w-auto">
                </a>
                <a href="{{route('set.locale', 'ru')}}">
                    <img src="{{asset('assets/icons/flag-ru.svg')}}" alt="language" class="select-none h-4 w-auto">
                </a>
            </div>
            <div class="ml-8 hidden cursor-pointer flex-nowrap items-center gap-x-2 md:flex">
                @if(auth()->user())
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">{{auth()->user()->name}}</a>
                    </form>
                    @if(false)
                        {{--TODO: Вывод аватарки--}}
                        <img src="" alt="avatar">
                    @else
                        <x-default-avatar/>
                    @endif
                @else
                    <a href="{{ route('login') }}">{{__('Log in')}}</a>
                    <span> / </span>
                    <a href="{{ route('signup') }}">{{__('Sign Up')}}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center gap-y-8 py-2">
        <a href="{{route('home')}}">
            <x-logo/>
        </a>
    </div>
    <nav class="relative flex items-center justify-center pt-2 sm:grid md:grid-cols-12 md:grid-rows-1">
        <ul class="flex justify-start overflow-x-scroll font-medium scrollbar-none md:col-start-4 md:col-end-10">
            <li class="w-full px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('catalog', 'category=painting')}}">{{__('Painting')}}</a>
            </li>
            <li class="w-full px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('catalog', 'category=photo')}}">{{__('Photo')}}</a>
            </li>
            <li class="w-full px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('catalog', 'category=graphics')}}">{{__('Graphic')}}</a>
            </li>
            <li class="w-full px-2 py-4 text-center text-lg font-normal md:px-6">
                <a href="{{route('catalog', 'category=nft')}}">{{__('NFT')}}</a>
            </li>
        </ul>
        <div class="col-start-11 col-end-13 hidden md:block">
            <label for="searchBar" class="sr-only">Search bar</label>
            <div class="flex items-center border-gray-300 bg-zinc-600 bg-opacity-10 p-4">
                <input type="text" class="w-10/12 border-none bg-transparent p-0 font-light focus:border-none focus:ring-0" placeholder="{{__('Search')}}" id="searchBar">
                <img src="{{asset('assets/icons/search.svg')}}" alt="search" class="ml-auto cursor-pointer select-none">
            </div>
        </div>
    </nav>
</header>
