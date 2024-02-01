<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderStoredEvent;
use App\Models\Activity;

class OrderStoredListener
{
    private Activity $activity;

    /**
     * Create the event listener.
     */
    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    /**
     * Handle the event.
     */
    public function handle(OrderStoredEvent $event): void
    {
        $this->activity->create([
            'user_id' => $event->order->user_id,
            'type' => 'order-stored',
            'text' => 'User :user placed order #:order.',
            'data' => [
                'user' => $event->order->user->name,
                'order' => $event->order->id,
                'datetime' => $event->order->created_at->format('H:i d/m/Y'),
            ]
        ]);
    }
}
