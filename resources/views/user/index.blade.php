@extends('layouts.app')

@section('sitetitle', 'User - Übersicht')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fragen - Übersicht</div>

                    <div class="card-body">
                        <div class="card-body">
                            <p><b>Username:</b> {{ $user->name }}</p>
                            <p><b>Eigener Code</b> {{ $user->code }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
