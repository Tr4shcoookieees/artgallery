<?php

namespace App\Providers;

use App\Events\Order\OrderStatusUpdatedEvent;
use App\Events\Order\OrderStoredEvent;
use App\Events\User\UserAvatarUpdating;
use App\Events\User\UserDeleting;
use App\Listeners\Order\OrderStatusUpdatedListener;
use App\Listeners\Order\OrderStoredListener;
use App\Listeners\User\UserAvatarUpdatingListener;
use App\Listeners\User\UserDeletingListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SocialiteProviders\Google\GoogleExtendSocialite;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SocialiteWasCalled::class => [
            GoogleExtendSocialite::class . '@handle',
        ],
        UserDeleting::class => [
            UserDeletingListener::class
        ],
        UserAvatarUpdating::class => [
            UserAvatarUpdatingListener::class
        ],
        OrderStoredEvent::class => [
            OrderStoredListener::class
        ],
        OrderStatusUpdatedEvent::class => [
            OrderStatusUpdatedListener::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
