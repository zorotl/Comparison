<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::toMailUsing(function ($notifiable) {
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify', Carbon::now()->addMinutes(60), [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );

            return (new MailMessage)
                ->from('noreply@comparison.ch', 'Comparison')
                ->subject( 'E-Mail Adresse bestätigen | comparison.stws.ch' )
                ->greeting( 'Hallo' )
                ->line('Klicke auf den Button, um deine E-Mail Adresse zu bestätigen.')
                ->action('E-Mail Adresse bestätigen', $verifyUrl)
                ->line( 'Falls du kein neues Passwort angefragt hast, ignoriere bitte dieses E-Mail.' );
        });
    }
}
