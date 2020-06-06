<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $link = url( "/password/reset/?token=" . $notifiable->remember_token );

        return ( new MailMessage )
            ->from('noreply@comparison.ch', 'Comparison')
            ->subject( 'Passwort zurücksetzen | comparison.stws.ch' )
            ->greeting( 'Hallo' )
            ->line( "Du empfängst dieses E-Mail, weil wir für deinen Account
                          eine Anfrage zum Zurücksetzen des Passworts erhalten haben." )
            ->action( 'Jetzt zurücksetzen', $link )
            ->line( 'Dieser Link ist 60 Minuten lang gültig.' )
            ->line( 'Falls du kein neues Passwort angefragt hast ist keine weitere Aktion nötig.' )
            ->salutation('Freundliche Grüsse, dein Comparison-Team');

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
