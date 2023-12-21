@php use App\Models\City;use Illuminate\Contracts\Auth\MustVerifyEmail; @endphp
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

        <div class="flex flex-col gap-y-1">
            <x-input-label for="avatar" :value="__('Profile picture')"/>
            <x-text-input id="avatar" name="avatar" type="file" :value="old('avatar', $user->avatar)" required/>
            <x-input-error :messages="$errors->get('avatar')" class="mt-2"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{__('Save')}}</x-primary-button>

            @if(session('status') === 'avatar-updated')
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
