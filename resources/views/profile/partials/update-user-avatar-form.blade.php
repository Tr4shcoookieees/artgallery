<section class="max-w-sm">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile picture. You can use png, jpeg and jpg files.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update.avatar') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')

        <div class="flex flex-col gap-y-6">
            <div class="flex flex-col justify-center items-center gap-y-2">
                <img class="w-44 h-60 rounded-full object-cover object-center"
                     src="{{$user->avatar ? $user->avatar_normalize : asset('storage/uploads/avatars/no-avatar.png')}}" alt="profile-picture.png" id="avatar_image">
                <x-input-label for="avatar" :value="__('Profile picture')" class="sr-only"/>
            </div>
            <x-text-input id="avatar" name="avatar" type="file" :value="old('avatar', $user->avatar)"
                          class="text-sm text-gray-900 bg-gray-200 border border-gray-300 focus:outline-none focus:border-gray-300" required/>
            <x-input-error :messages="$errors->get('avatar')" class="mt-2"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{__('Save')}}</x-primary-button>

            @if(session('status') === 'avatar-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-green-600">
                    {{__('Saved')}}
                </p>
            @endif
        </div>
    </form>
</section>
