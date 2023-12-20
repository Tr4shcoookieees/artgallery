<section class="max-w-sm">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current password')"/>
            <x-text-input id="current_password" name="current_password" type="password"/>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="password" :value="__('New password')"/>
            <x-text-input id="password" name="password" type="password" autocomplete="new-password"/>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm password')"/>
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"/>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{__('Save')}}</x-primary-button>

            @if(session('status') === 'password-updated')
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
