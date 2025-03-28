<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPasswordNotification extends Notification
{
    use Queueable;

    protected $token = "";

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        $link = url( "/password/reset/" . $this->token . "?email=" . $notifiable->email);

        return ( new MailMessage )
            ->from('noreply@comparison.ch', 'Comparison')
            ->subject( 'Passwort zurücksetzen | comparison.stws.ch' )
            ->greeting( 'Hallo' )
            ->line( "Du empfängst diese E-Mail, weil wir für deinen Account
                          eine Anfrage zum Zurücksetzen des Passworts erhalten haben." )
            ->action( 'Jetzt zurücksetzen', $link )
            ->line( 'Dieser Link ist die nächsten 60 Minuten gültig.' )
            ->line( 'Falls du kein neues Passwort angefragt hast, ignoriere bitte dieses E-Mail.' );
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
