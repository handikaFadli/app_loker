<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LamaranTahapAkhirNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $header;
    private $description;
    private $link;
    private $time;
    private $date;
    private $notif;

    /**
     * Create a new notification instance.
     */
    public function __construct($header, $description, $link, $time, $date, $notif)
    {
        $this->header = $header;
        $this->description = $description;
        $this->link = $link;
        $this->time = $time;
        $this->date = $date;
        $this->notif = $notif;
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
    public function toMail($notifiable): MailMessage
    {

        $mailMessage = (new MailMessage)
            ->subject('Universitas Catur Insan Cendekia')
            ->view('emails.lamaran-tahap-akhir', [
                'header' => $this->header,
                'description' => $this->description,
                'link' => $this->link,
                'time' => $this->time,
                'date' => $this->date,
                'notif' => $this->notif,
            ]);

        return $mailMessage;
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
            'time' => $this->time,
            'date' => $this->date,
            'notif' => $this->notif,
        ];
    }
}
