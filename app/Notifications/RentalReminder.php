<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RentalReminder extends Notification
{
    use Queueable;

    public function __construct(private $rental)
    {
        //
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database', 'broadcast']; // 🔥 broadcast qo‘shildi
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Salom ' . $notifiable->name)
            ->line('Siz olgan "' . $this->rental->book->title . '" kitobning muddati tugashiga 3 kun qoldi.')
            ->line('Iltimos, kitobni vaqtida qaytaring.')
            ->action('Ijara Tafsilotlari', url('/admin/rentals'))
            ->line('Rahmat!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Siz olgan "' . $this->rental->book->title . '" kitob muddati tugashiga 3 kun qoldi.',
        ];
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'message' => 'Siz olgan "' . $this->rental->book->title . '" kitob muddati tugashiga 3 kun qoldi.',
        ]);
    }
}
