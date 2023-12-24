<section class="max-w-sm">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("You don't have Author Profile yet") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Want to create one?") }}
            <br>
            {{ __("If so, please fill the form below.") }}
        </p>
    </header>

    <form method="post" action="{{ route('author.store') }}" class="mt-6 space-y-6">
        @csrf

        <div class="flex flex-col gap-y-1">
            <x-input-label for="nickname" :value="__('Nickname')"/>
            <x-text-input id="nickname" name="nickname" type="text" :value="old('nickname')" autofocus required autocomplete="nickname"/>
            <x-input-error :messages="$errors->get('nickname')" class="mt-2"/>
        </div>

        <div class="flex flex-col gap-y-1">
            <x-input-label for="bio" :value="__('Tell us about yourself')"/>
            <x-textarea-input id="bio" name="bio" type="text" :value="old('bio')" required
                              class="block h-52 resize-none rounded-sm border-gray-300 shadow-sm scrollbar-thin scrollbar-thumb-gray-400 focus:border-red-300 focus:ring-red-300"
            />
            <x-input-error :messages="$errors->get('bio')" class="mt-2"/>
        </div>

        <div>
            <x-primary-button type="submit">{{__('Save')}}</x-primary-button>
        </div>
    </form>
</section>
