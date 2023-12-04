<section {{ $attributes->class(['bg-zinc-600 bg-opacity-10 p-4 md:px-14 md:py-10']) }}>
    <form class="gap-x-16 md:flex md:flex-row md:justify-between">
        <div class="mb-6 text-center md:mb-0 md:text-start">
            <span class="text-lg font-light uppercase">{{config('app.name')}}</span>
            <hr class="my-3 border-primary md:my-1 md:border-none">
            <p class="text-2xl uppercase">{{__('messages.subscription.subscription')}}</p>
            <p>{{__('messages.subscription.subtitle')}}</p>
        </div>
        <div class="mx-auto flex max-w-fit flex-col gap-y-3 md:m-0 md:gap-x-4 md:self-center lg:flex-row">
            <label for="email" class="sr-only">Email</label>
            <input class="select-none max-w-fit border-none p-4 font-light focus:border-none focus:ring-0" type="email" id="email" name="email" placeholder="{{__('messages.subscription.email')}}" required>
            <x-button-primary type="submit">{{__('messages.subscription.button')}}</x-button-primary>
        </div>
    </form>
</section>
