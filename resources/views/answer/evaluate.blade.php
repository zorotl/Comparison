@extends('layouts.app')

@section('sitetitle', 'Antworten vergleichen')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Antworten vergleichen</div>

                    <div class="card-body">

                        @guest
                            <div class="alert alert-primary" role="alert">
                                Hallo Gast,
                                <br><br>
                                Um von allen Vorteilen zu profitieren,
                                <a class="alert-link" href="/login">logge dich ein</a> oder
                                <a class="alert-link" href="/register">registriere dich</a> noch heute.
                                <br><br>
                                Es besteht aber auch die Möglichkeit, diese Website ohne Login
                                und ohne Angabe persönlicher Daten (Name, E-Mail, usw.) zu verwenden.
                            </div>
                        @endguest

                        <form action="/evaluate" method="post">
                            @csrf
                            @guest
                                <div class="form-group">
                                    <label for="generalCode">Gemeinsamer Code</label>
                                    <input type="text" class="form-control {{ $errors->has('generalCode') ? 'border-danger' : ''}}"
                                           id="generalCode" name="generalCode" value="{{ old('generalCode') }}">
                                    <small class="form-text text-danger">{!! $errors->first('generalCode') !!}</small>
                                </div>
                            @endguest
                            <div class="form-group">
                                <label for="codeOwn">Erster persönlicher Code</label>
                                @auth
                                    <input type="text" class="form-control {{ $errors->has('codeOwn') ? 'border-danger' : ''}}"
                                           id="codeOwn" name="codeOwn" value="{{ $user->code ?? old('codeOwn') }}" readonly>
                                @endauth
                                @guest
                                    <input type="text" class="form-control {{ $errors->has('codeOwn') ? 'border-danger' : ''}}"
                                           id="codeOwn" name="codeOwn" value="{{ old('codeOwn') }}" >
                                @endguest
                                <small class="form-text text-danger">{!! $errors->first('codeOwn') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="codeOther">Zweiter persönlicher Code</label>
                                <input type="text" class="form-control {{ $errors->has('codeOther') ? 'border-danger' : ''}}"
                                       id="codeOther" name="codeOther" value="{{ old('codeOther') }}">
                                <small class="form-text text-danger">{!! $errors->first('codeOther') !!}</small>
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Vergleichen">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
