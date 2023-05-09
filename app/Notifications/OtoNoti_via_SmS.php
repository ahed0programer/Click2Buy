<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;

class OtoNoti_via_SmS extends Notification implements ShouldQueue
{
    use Queueable;

    public $otp_code;
    /**
     * Create a new notification instance.
     */
    public function __construct($otp_code)
    {
        //
        $this->otp_code=$otp_code;
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
                    ->line('this the verification code')
                    ->line('Do not give it to anyone ')
                    ->line($this->otp_code)
                    ->line('Thank you for using our application!');
    }

    public function toVonage(object $notifiable): VonageMessage
    {
        return (new VonageMessage)
                    ->content('Your SMS message content')
                    ->from("+963996840955");
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
