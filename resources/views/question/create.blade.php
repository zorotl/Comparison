@extends('layouts.app')

@section('sitetitle', 'Fragen - Übersicht')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Frage - Hinzufügen</div>

                    <div class="card-body">
                        <form action="/question" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : ''}}"
                                       id="name" name="name" value="{{ old('name') }}">
                                <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="shortName">Kurz-Name</label>
                                <input type="text" class="form-control {{ $errors->has('shortName') ? 'border-danger' : ''}}"
                                       id="shortName" name="shortName" maxlength="10" value="{{ old('shortName') }}">
                                <small class="form-text text-danger">{!! $errors->first('shortName') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="description">Beschreibung</label>
                                <input type="text" class="form-control {{ $errors->has('description') ? 'border-danger' : ''}}"
                                       id="description" name="description" value="{{ old('description') }}">
                                <small class="form-text text-danger">{!! $errors->first('description') !!}</small>

                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Hinzufügen">
                        </form>

                        <a class="btn btn-primary btn-sm mt-3 float-lg-right" href="/question">
                            <i class="fas fa-arrow-circle-up"></i>
                            Zurück
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
