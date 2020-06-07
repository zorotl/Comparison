@extends('layouts.app')

@section('sitetitle', 'E-Mail Verifizierung')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bestätige deine Email Addresse') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ein neuer Verifizierungs-Link wurde an deine E-Mail Adresse gesendet.') }}
                        </div>
                    @endif

                    {{ __('Bevor du diese Seite nutzen kannst, prüfe deine E-Mails und verifiziere dich.') }}
                    {{ __('Falls du kein E-Mail erhalten hast') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klicke hier, um ein neues zu erhalten') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
