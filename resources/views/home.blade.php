@extends('layouts.app')

@section('sitetitle', 'Home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Startseite</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @auth
                            <div>
                                <p>Hallo {{ auth()->user()->name ?? '' }}</p>
                            </div>
                        @endauth

                        @guest
                            <div>
                                <p>Hallo Gast :-)</p>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
