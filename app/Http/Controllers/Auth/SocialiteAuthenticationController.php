<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        $locale = $user->user['locale'];
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->route('home')->with('oauth', __('Authentication successful'));
    }
}
