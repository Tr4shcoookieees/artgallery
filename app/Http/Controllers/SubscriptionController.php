<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Notifications\SubscribeToNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email_to',
        ]);

        Subscription::create([
            'email_to' => $request->email,
            'user_id' => $request->user()->id,
        ]);

        Notification::route('mail', $request->email)->notify(new SubscribeToNews(auth()->user()));

        return back()->with('success', 'You have successfully subscribed to our newsletter.');
    }
}
