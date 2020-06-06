@extends('layouts.app')

@section('sitetitle', 'User - Übersicht')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User-Details</div>

                    <div class="card-body">
                        <ul class="list-group">

                            <li class="list-group-item"><b>Username: </b>{{ $user->name }}</li>
                            <li class="list-group-item"><b>E-Mail: </b>{{ $user->email }}</li>
                            <li class="list-group-item"><b>Benutzerrolle: </b>
                                {{ \Illuminate\Support\Str::of($user->role)->ucfirst() ?? "User" }}</li>
                            <li class="list-group-item"><b>Eigener Code: </b>{{ $user->code }}</li>
                            <li class="list-group-item"><b>Mitglied seit: </b>
                                {{ \Illuminate\Support\Carbon::parse($user->created_at)->locale('de_CH')->isoFormat('LL') }}
                                ({{ \Illuminate\Support\Carbon::parse($user->created_at)->diffForHumans() }})
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
