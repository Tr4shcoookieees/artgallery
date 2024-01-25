@php use App\Models\City;use Illuminate\Contracts\Auth\MustVerifyEmail; @endphp
<section class="max-w-sm">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')

        <div class="flex flex-col gap-y-1">
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" autofocus required autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <div class="flex flex-col gap-y-1">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" name="email" type="text" :value="old('email', $user->email)" required autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>

            @if(!$user->hasVerifiedEmail() && $user instanceof MustVerifyEmail)
                <div class="mt-2 text-gray-800">
                    <p>
                            <span class="text-sm">
                                {{ __('Your email address is unverified') }}
                            </span>

                        <x-primary-button type="submit" form="send-verification">
                            {{ __('Re-send the verification email') }}
                        </x-primary-button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex flex-col gap-y-1">
            <x-input-label for="phone" :value="__('Phone')"/>
            <x-text-input id="phone" name="phone" type="text" :value="old('phone', $user->phone ? $user->phone : '+7 ')" required autocomplete="phone"/>
            <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
        </div>

        <div class="flex flex-col gap-y-1">
            <x-input-label for="gender" :value="__('Gender')"/>
            <x-select-input id="gender" name="gender" required>
                <option value="male" {{$user->gender == 'male' ? 'selected' : ''}}>{{__('Male')}}</option>
                <option value="female" {{$user->gender == 'female' ? 'selected' : ''}}>{{__('Female')}}</option>
            </x-select-input>
            <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
        </div>

        <div class="flex flex-col gap-y-1">
            <x-input-label for="city" :value="__('Location')"/>
            <x-select-input id="city" name="city_id" required>
                @foreach(City::all() as $city)
                    <option value="{{$city->id}}" {{$user->city_id != null ? 'selected' : ''}}>
                        {{$city->name . ', ' . $city->country->code}}
                    </option>
                @endforeach
            </x-select-input>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{__('Save')}}</x-primary-button>

            @if(session('status') === 'profile-updated')
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
