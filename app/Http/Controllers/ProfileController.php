<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateAvatar(AvatarUpdateRequest $request)
    {
        if ($request->validated()) {
            $avatar = file_get_contents($request->file('avatar')->getRealPath());

            $avatar_name = $request->user()->id . '-' . uniqid() . '.' . $request->file('avatar')->extension();
            if (!Storage::exists('uploads/avatars')) {
                Storage::makeDirectory('uploads/avatars');
            }
            Storage::put('uploads/avatars/' . $avatar_name, $avatar);

            $request->user()->avatar = $avatar_name;
            $request->user()->save();
        }

        return redirect()->route('profile.edit')->with('status', 'avatar-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        auth()->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
