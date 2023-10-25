<footer class="flex flex-col gap-y-8">
    <section class="bg-zinc-600 bg-opacity-10 p-4 md:px-14 md:py-10">
        <form class="gap-x-16 md:flex md:flex-row md:justify-between">
            <div class="mb-6 text-center md:mb-0 md:text-start">
                <span class="text-lg font-light uppercase">{{config('app.name')}}</span>
                <hr class="my-3 border-primary md:my-1 md:border-none">
                <p class="text-2xl uppercase">Новостная рассылка</p>
                <p>Получайте нашу рассылку для любителей искусства и коллекционеров</p>
            </div>
            <div class="mx-auto flex max-w-fit flex-col gap-y-3 md:m-0 md:gap-x-4 md:self-center lg:flex-row">
                <label for="email" class="sr-only">Email</label>
                <input class="select-none max-w-fit border-none p-4 font-light focus:border-none focus:ring-0" type="email" id="email" name="email" placeholder="Электронная почта" required>
                <x-button-primary type="submit">Подписаться</x-button-primary>
            </div>
        </form>
    </section>
    <div class="border-y p-4 border-y-primary md:px-14 md:py-5">
        <ul class="flex flex-col justify-center gap-x-8 gap-y-4 text-center sm:flex-row sm:justify-between sm:text-start">
            <li>
                <span class="text-lg font-medium">О</span>
                <ul class="font-light">
                    <li>Компании</li>
                    <li>Правовая информация</li>
                    <li>Партнерская программа</li>
                    <li>Работа у нас</li>
                </ul>
            </li>
            <li>
                <span class="text-lg font-medium">Покупателям</span>
                <ul class="font-light">
                    <li>Оригинальные коллекции</li>
                    <li>Каталог работ</li>
                    <li>Фотобанк</li>
                    <li>Художественная печать</li>
                </ul>
            </li>
            <li>
                <span class="text-lg font-medium">Клиентам</span>
                <ul class="font-light">
                    <li>Любители искусства</li>
                    <li>Художники</li>
                    <li>Галереи</li>
                    <li>Художественный агент</li>
                    <li>Ассоциация художников</li>
                </ul>
            </li>
            <li>
                <span class="text-lg font-medium">Нужна помощь?</span>
                <ul class="flex flex-col font-light">
                    <li>Центр помощи</li>
                    <li>Отдел продаж</li>
                    <li class="mt-4 flex flex-row justify-center gap-x-4 gap-y-4 self-center border-t border-black px-4 pt-4 pb-0 sm:flex-wrap select-none">
                        <img src="{{asset('assets/icons/instagram.svg')}}" alt="">
                        <img src="{{asset('assets/icons/facebook.svg')}}" alt="">
                        <img src="{{asset('assets/icons/pinterest.svg')}}" alt="">
                        <img src="{{asset('assets/icons/twitter.svg')}}" alt="">
                        <img src="{{asset('assets/icons/youtube.svg')}}" alt="">
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</footer>
<p class="mt-2 w-full text-center text-sm font-light opacity-40 select-none">&copy; 2023 Абдрейкин М. А.<span class="hidden sm:inline">,</span> <br class="block sm:hidden"> ИСПС-11-21, г. Красноярск</p>
