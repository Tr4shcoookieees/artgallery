<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStored extends Notification
{
    use Queueable;

    private Order $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->from('artgallery.info@gmail.com', 'ArtGallery Team')
            ->subject(__('Order has been stored', ['order_id' => $this->order->id]))
            ->greeting(__('Hello, :name', ['name' => $this->order->user->name]))
            ->line(__('Your order of  :product_name has been stored.', ['product_name' => $this->order->artwork->title]))
            ->line(__('When the order will be processed, you will receive an email with the order details.'))
            ->line(__('Thank you for shopping with us!'))
            ->salutation(__('Best regards, ArtGallery Team'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
