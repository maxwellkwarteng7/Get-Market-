<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class contactMail extends Notification
{
    use Queueable;
    private $contactmail ;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contactmail)
    {
       $this->contactmail = $contactmail ;
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
                    ->greeting($this->contactmail['greeting'])
                    ->line($this->contactmail['description'])
                    ->line($this->contactmail['body'])
                    ->action($this->contactmail['button'],$this->contactmail['url'])
                    ->line($this->contactmail['lastline']);
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
