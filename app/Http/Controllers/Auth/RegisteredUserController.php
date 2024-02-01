<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Hash;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    public function index()
    {
        return view('auth.signup');
    }

    public function store(StoreUserRequest $request)
    {
        $request->validated();

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => 'active'
        ]);

        $user->assignRole('user');

        event(new Registered($user));

        auth()->login($user);

        return redirect(RouteServiceProvider::PROFILE);
    }
}
