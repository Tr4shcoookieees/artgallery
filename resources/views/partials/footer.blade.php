<footer class="flex flex-col gap-y-8">
    <x-email-subsciption/>
    <div class="border-y p-4 border-y-primary md:px-14 md:py-5">
        <ul class="flex flex-col justify-center gap-x-8 gap-y-4 text-center sm:flex-row sm:justify-between sm:text-start">
            <li>
                <span class="text-lg font-medium">{{__('messages.footer.about.key')}}</span>
                <ul class="font-light">
                    <li>{{__('messages.footer.about.company')}}</li>
                    <li>{{__('messages.footer.about.docs')}}</li>
                    <li>{{__('messages.footer.about.partnership')}}</li>
                    <li>{{__('messages.footer.about.job')}}</li>
                </ul>
            </li>
            <li>
                <span class="text-lg font-medium">{{__('messages.footer.customer.key')}}</span>
                <ul class="font-light">
                    <li>{{__('messages.footer.customer.original')}}</li>
                    <li>
                        <a href="{{ route('catalog') }}">{{__('messages.footer.customer.catalog')}}</a>
                    </li>
                    <li>{{__('messages.footer.customer.photo-bank')}}</li>
                    <li>{{__('messages.footer.customer.printing')}}</li>
                </ul>
            </li>
            <li>
                <span class="text-lg font-medium">{{__('messages.footer.client.key')}}</span>
                <ul class="font-light">
                    <li>{{__('messages.footer.client.art-lovers')}}</li>
                    <li>{{__('messages.footer.client.authors')}}</li>
                    <li>{{__('messages.footer.client.galleries')}}</li>
                    <li>{{__('messages.footer.client.agent')}}</li>
                    <li>{{__('messages.footer.client.association')}}</li>
                </ul>
            </li>
            <li>
                <span class="text-lg font-medium">{{__('messages.footer.help.key')}}</span>
                <ul class="flex flex-col font-light">
                    <li>{{__('messages.footer.help.center')}}</li>
                    <li>{{__('messages.footer.help.sales')}}</li>
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
