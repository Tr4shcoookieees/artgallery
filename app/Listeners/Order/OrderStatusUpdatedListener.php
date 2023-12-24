<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderStatusUpdatedEvent;
use App\Models\Activity;

class OrderStatusUpdatedListener
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
    public function handle(OrderStatusUpdatedEvent $event): void
    {
        $this->activity->create([
            'user_id' => auth()->user()->id,
            'type' => 'order-status-updated',
            'text' => 'The status of order #:order changed from :old_status to :new_status.',
            'data' => [
                'order' => $event->order->id,
                'old_status' => $event->old_status,
                'new_status' => $event->new_status,
                'datetime' => $event->order->updated_at->format('d/m/Y H:i')
            ]
        ]);
    }
}
