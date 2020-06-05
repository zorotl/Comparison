@extends('layouts.app')

@section('sitetitle', 'Fragen - Übersicht')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Frage - Bearbeiten</div>

                    <div class="card-body">
                        <form action="/question/{{ $question->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : ''}}"
                                       id="name" name="name" value="{{ $question->name ?? old('name') }}">
                                <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="shortName">Kurz-Name</label>
                                <input type="text" class="form-control {{ $errors->has('shortName') ? 'border-danger' : ''}}"
                                       id="shortName" name="shortName" maxlength="10" value="{{ $question->shortName ?? old('shortName') }}">
                                <small class="form-text text-danger">{!! $errors->first('shortName') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="description">Beschreibung</label>
                                <input type="text" class="form-control {{ $errors->has('description') ? 'border-danger' : ''}}"
                                       id="description" name="description" value="{{ $question->description ?? old('description') }}">
                                <small class="form-text text-danger">{!! $errors->first('description') !!}</small>

                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Ändern">
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
