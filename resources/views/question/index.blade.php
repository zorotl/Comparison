@extends('layouts.app')

@section('sitetitle', 'Fragen - Übersicht')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fragen - Übersicht</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($questions as $q)
                                <li class="list-group-item">
                                    <span>{{ $q->name }}</span>
                                    <span class="text-muted">({{ $q->description }})</span>
                                    <div class="float-right">
                                        <a class="ml-2 btn btn-sm btn-outline-primary"
                                           href="/question/{{ $q->id }}/edit">
                                            <i class="fas fa-edit"></i>
                                            Bearbeiten
                                        </a>
                                        <form style="display: inline;" action="/question/{{ $q->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-outline-danger btn-sm ml-2" type="submit"
                                                   value="Löschen">
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <a class="btn btn-success btn-sm mt-3" href="/question/create"><i
                                class="fas fa-plus-circle"></i> Neues Frage anlegen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
