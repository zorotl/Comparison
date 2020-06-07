<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class CustomEmailVerificationNotification extends Notification
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
//        VerifyEmail::toMailUsing(function ($notifiable) {
//            $verifyUrl = URL::temporarySignedRoute(
//                'verification.verify', Carbon::now()->addMinutes(60), [
//                    'id' => $notifiable->getKey(),
//                    'hash' => sha1($notifiable->getEmailForVerification()),
//                ]
//            );
//
//            return (new MailMessage)
//                ->from('noreply@comparison.ch', 'Comparison')
//                ->subject( 'E-Mail Adresse bestätigen | comparison.stws.ch' )
//                ->greeting( 'Hallo' )
//                ->line('Klicke auf den Button, um deine E-Mail Adresse zu bestätigen.')
//                ->action('E-Mail Adresse bestätigen', $verifyUrl)
//                ->line( 'Falls du kein neues Passwort angefragt hast, ignoriere bitte dieses E-Mail.' );
//        });
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
