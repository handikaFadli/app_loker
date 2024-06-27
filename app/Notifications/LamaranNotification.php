<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LamaranNotification extends Notification
{
    use Queueable;

    private $header;
    private $description;
    private $link;

    /**
     * Create a new notification instance.
     */
    public function __construct($header, $description, $link)
    {
        $this->header = $header;
        $this->description = $description;
        $this->link = $link;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        return (new MailMessage)
            ->subject('Status Lamaran Anda')
            ->greeting('Halo!')
            ->line($this->description)
            ->action('Lihat Detail', url($this->link))
            ->line('Terima kasih.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable): array
    {
        return [
            'header' => $this->header,
            'description' => $this->description,
            'link' => $this->link,
        ];
    }
}
