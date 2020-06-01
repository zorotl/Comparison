@extends('layouts.app')

@section('sitetitle', 'Fragen - Übersicht')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fragen - Übersicht</div>

                    <div class="card-body">
                        {{ dd($questions) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
