<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;
use Storage;

class SocialiteAuthenticationController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $socialite_user = Socialite::driver('google')->user();

        $user = User::where('email', $socialite_user->getEmail())
            ->orWhere('google_id', $socialite_user->getId())
            ->first();

        if (!$user) {
            $avatar = file_get_contents($socialite_user->getAvatar());
            $avatar_name = 'avatar-google-' . $socialite_user->getId() . '.jpg';
            if (!Storage::exists('uploads/avatars')) {
                Storage::makeDirectory('uploads/avatars');
            }
            Storage::put('uploads/avatars/' . $avatar_name, $avatar);

            $user = User::create([
                'name' => $socialite_user->getName(),
                'email' => $socialite_user->getEmail(),
                'email_verified_at' => now(),
                'avatar' => $avatar_name,
                'google_id' => $socialite_user->getId(),
            ]);

            event(new Registered($user));
        } elseif ($user->google_id == null) {
            $user->google_id = $socialite_user->getId();
        }

        $user->status = 'active';
        $user->save();
        auth()->login($user, true);

        $locale = $socialite_user->user['locale'];
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->route('home')->with('oauth', __('Authentication successful'));
    }
}
