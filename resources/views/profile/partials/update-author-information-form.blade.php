<section class="max-w-sm">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Author profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your author's profile information") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')

        <div class="flex flex-col gap-y-1">
            <x-input-label for="nickname" :value="__('Nickname')"/>
            <x-text-input id="nickname" name="nickname" type="text" :value="old('nickname', $user->author->nickname)" autofocus required autocomplete="nickname"/>
            <x-input-error :messages="$errors->get('nickname')" class="mt-2"/>
        </div>

        <div class="flex flex-col gap-y-1">
            <x-input-label for="bio" :value="__('Bio')"/>
            {{$user->author->age}}
            {{$user->author->age}}
            {{$user->author->age}}
            {{$user->author->age}}
        </div>

        <div>
            <x-primary-button type="submit">{{__('Save')}}</x-primary-button>

            @if(session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="mt-2 text-sm font-medium text-green-600">
                    {{__('Saved')}}
                </p>
            @endif
        </div>
    </form>
</section>
