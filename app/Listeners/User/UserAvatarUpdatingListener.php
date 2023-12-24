<?php

namespace App\Listeners\User;

use App\Events\User\UserAvatarUpdating;

class UserAvatarUpdatingListener
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
    public function handle(UserAvatarUpdating $event): void
    {
        $avatar = $event->user->getOriginal('avatar');

        if ($avatar) {
            \Storage::delete('uploads/avatars/' . $avatar);
        }
    }
}
