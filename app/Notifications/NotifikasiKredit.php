<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifikasiKredit extends Notification
{
    use Queueable;
    private $dataKredit;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($dataKredit)
    {
        $this->dataKredit = $dataKredit;
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
                    ->subject($this->dataKredit['title'])
                    ->line($this->dataKredit['to'])
                    ->line($this->dataKredit['body'])
                    ->line($this->dataKredit['body1'])
                    ->line($this->dataKredit['body2'])
                    ->line($this->dataKredit['isi'])
                    ->line($this->dataKredit['body3']);
            
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
