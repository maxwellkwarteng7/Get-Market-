<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class subscriberMail extends Notification
{
    use Queueable;

    private $mail ;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mail)
    {
        $this->mail= $mail ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->mail['greeting'])
                    ->line($this->mail['description'])
                    ->line($this->mail['body'])
                    ->action($this->mail['button'], $this->mail['link'])
                    ->line($this->mail['lastline']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
