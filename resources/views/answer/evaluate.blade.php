@extends('layouts.app')

@section('sitetitle', 'Antworten vergleichen')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Antworten vergleichen</div>

                    <div class="card-body">
                        <form action="/evaluate" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="codeOwn">Eigener Code</label>
                                <input type="text" class="form-control {{ $errors->has('codeOwn') ? 'border-danger' : ''}}"
                                       id="codeOwn" name="codeOwn" value="{{ $user->code ?? old('codeOwn') }}" readonly>
                                <small class="form-text text-danger">{!! $errors->first('codeOwn') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="codeOther">Zweiter Code</label>
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
