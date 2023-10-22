<header>
    <div class="flex justify-between py-2">
        <div class="inline-flex items-center gap-x-4">
            <div x-data="{ isOpen: false }" class="flex flex-nowrap items-center gap-x-2">
                <img src="{{asset('assets/icons/compass.svg')}}" alt="region" class="hover:animate-rotate-y" @click="isOpen = !isOpen">
                <div class="relative" @click.outside="isOpen = false">
                    <button id="selectedRegion" type="button" class="font-medium underline underline-offset-4" @click="isOpen = !isOpen">Москва,
                        Россия
                    </button>
                    <ul x-show="isOpen" class="absolute top-7 max-h-40 overflow-x-clip overflow-y-scroll border border-gray-100 bg-white bg-blend-darken max-w-[250px] scrollbar-thin scrollbar-thumb-gray-400 animate-flip-down animate-duration-500">
                        <x-region-option/>
                    </ul>
                </div>
            </div>
            <div class="inline-flex gap-x-2">
                <a href="/er">Наши адреса</a>
                <a href="/er">Обратная связь</a>
            </div>
        </div>
        <div class="flex flex-nowrap rounded bg-gray-500 bg-opacity-10 p-2">
            <img src="{{asset('assets/icons/flag-ru.svg')}}" alt="language">
            <div class="ml-8 flex cursor-pointer flex-nowrap items-center gap-x-2">
                @if(!$user = Auth::user())
                    <a href="/login">Войти</a>
                    <span> / </span>
                    <a href="/signup">Зарегистрироваться</a>
                @else
                    @if(false)
                        <img src="" alt="avatar">
                    @else
                        <x-default-avatar/>
                    @endif
                    <a href="/profile">Maxim Abdreikin</a>
                @endif
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center gap-y-8 py-2">
        <x-logo-extra-large/>
    </div>
    <nav class="relative grid grid-cols-12 grid-rows-1 items-center py-2">
        <ul class="col-start-4 col-end-10 flex justify-around font-medium">
            <li class="w-full px-6 py-4 text-center text-lg font-normal">
                <a href="/catalog?">Картины</a>
            </li>
            <li class="w-full px-6 py-4 text-center text-lg font-normal">
                <a href="/catalog?">Фотография</a>
            </li>
            <li class="w-full px-6 py-4 text-center text-lg font-normal">
                <a href="/catalog?">Графика</a>
            </li>
            <li class="w-full px-6 py-4 text-center text-lg font-normal">
                <a href="/catalog?">NFT</a>
            </li>
        </ul>
        <div class="col-start-11 col-end-13">
            <label for="searchBar" class="sr-only">Search bar</label>
            <div class="flex items-center border-gray-300 bg-gray-500 bg-opacity-10 py-2 px-3">
                <input type="text" class="w-10/12 border-none bg-transparent p-0 focus:border-none focus:ring-0" placeholder="Поиск" id="searchBar">
                <img src="{{asset('assets/icons/search.svg')}}" alt="search" class="ml-auto cursor-pointer">
            </div>
        </div>
    </nav>
</header>
