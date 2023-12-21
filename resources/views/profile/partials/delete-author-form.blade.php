<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Author profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your profile is deleted, all of its resources and data will be permanently deleted') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-author-deletion')">
        {{ __('Delete profile') }}
    </x-danger-button>

    <x-modal name="confirm-author-deletion" :show="$errors->profileDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('author.destroy', $user->author->id) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your author profile?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your author profile is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete profile.') }}
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only">{{ __('Password') }}</label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->profileDeletion->get('password')" class="mt-2"/>
            </div>

            <div class="mt-6 flex justify-end">
                <x-primary-button type="button" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-primary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete author profile') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
