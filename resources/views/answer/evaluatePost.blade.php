@extends('layouts.app')

@section('sitetitle', 'Übereinstimmungen ansehen')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nachfolgend eine Liste von Übereinstimmungen</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Beschreibung</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($result as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a class="btn btn-primary btn-sm mt-3 float-lg-right" href="/evaluate">
                            <i class="fas fa-arrow-circle-up"></i>
                            Zurück
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
