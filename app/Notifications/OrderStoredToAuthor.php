<?php

namespace App\Notifications;

use App\Models\Author;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStoredToAuthor extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private Order $order;
    private Author $author;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->author = $order->author;
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
            ->subject(__('Order notification'))
            ->greeting(__('Hello, :name', ['name' => $this->author->name]))
            ->line(__('Your artwork :title was bought by :name', ['title' => $this->order->artwork->title, 'name' => $this->order->user->name]))
            ->line(__('When that user pay for the artwork you will receive a notification about the payment'))
            ->action(__('Go to ArtGallery'), url(route('home')))
            ->line(__('Thank you for using our platform to spread the word of Art!'))
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
