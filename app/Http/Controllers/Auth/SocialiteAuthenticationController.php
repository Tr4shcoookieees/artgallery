<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class SocialiteAuthenticationController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $authenticated_user = User::where('email', $user->email)->first();

        if (!$authenticated_user) {
            $avatar = file_get_contents($user->getAvatar());
            $avatar_name = 'avatar-google-' . $user->getId() . '.jpg';
            if (!Storage::exists('uploads/avatars')) {
                Storage::makeDirectory('uploads/avatars');
            }
            Storage::put('uploads/avatars/' . $avatar_name, $avatar);
            $authenticated_user = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'email_verified_at' => now(),
                'avatar' => $avatar_name,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);
        }

        event(new Registered($authenticated_user));

        auth()->login($authenticated_user, true);

        $locale = $user->user['locale'];
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->route('home')->with('oauth', __('Authentication successful'));
    }
}
