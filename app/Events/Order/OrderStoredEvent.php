<?php

namespace App\Events\Order;

use App\Models\Artwork;
use App\Models\Order;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderStoredEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Artwork $product;

    /**
     * Create a new event instance.
     * @param Order $order
     * @param User $user
     * @param Artwork $product
     */
    public function __construct(public Order $order, public User $user, Artwork $product)
    {
        $this->order = $order;
        $this->user = $user;
        $this->product = $product;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
