<?php

namespace App\Listeners\User;

use App\Events\User\UserDeleting;

class UserDeletingListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserDeleting $event): void
    {
        $avatar_path = $event->user->avatar;

        if ($avatar_path) {
            \Storage::delete('uploads/avatars/' . $avatar_path);
        }
    }
}
