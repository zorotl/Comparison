@extends('layouts.app')

@section('sitetitle', 'Fragen - Übersicht')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fragen beantworten</div>

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

                        <form class="form" method="post">
                            @csrf
                            <fieldset>

                                @guest
                                    <br>
                                    <div>
                                        Füllst du dieses Formular als 1. oder als 2 Person aus?<br>
                                        <div class="form-check d-inline">
                                            <input class="form-check-input" type="radio" name="firstSecond" id="first"
                                                   value="first" checked>
                                            <label class="form-check-label" for="first">
                                                Person 1
                                            </label>
                                        </div>
                                        <div class="form-check d-inline ml-5">
                                            <input class="form-check-input" type="radio" name="firstSecond" id="second"
                                                   value="second">
                                                <label class="form-check-label" for="second">
                                                    Person 2
                                                </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="generalCode">Gemeinsamer Code</label>
                                        <input type="text" class="form-control" name="generalCode"  id="generalCode" aria-describedby="generalCode"
                                               placeholder="1. Person: Gemeinsamen Code festlegen | 2.Person: Gemeinsamen Code eingeben">
                                    </div>
                                    <br>
                                @endguest

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 55%">Name</th>
                                        <th style="width: 15%">Ja</th>
                                        <th style="width: 15%">Vielleicht</th>
                                        <th style="width: 15%">Nein</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($questions as $q)
                                        <tr>
                                            <td>{{ $q->name }} ({{ $q->description }})</td>
                                            <td>
                                                <input id="ja" type="radio" name="{{ $q->id }}" value="ja"
                                                       @if (isset($answers[$q->id]) and $answers[$q->id] === "ja")
                                                       checked="checked"
                                                       @endif
                                                       required>
                                            </td>
                                            <td>
                                                <input id="ev" type="radio" name="{{ $q->id }}" value="ev"
                                                       @if (isset($answers[$q->id]) and $answers[$q->id] === "ev")
                                                       checked="checked"
                                                       @endif
                                                       required>
                                            </td>
                                            <td>
                                                <input id="nein" type="radio" name="{{ $q->id }}" value="nein"
                                                       @if (!isset($answers[$q->id]) or $answers[$q->id] === "nein" or $answers[$q->id] === "")
                                                       checked="checked"
                                                       @endif
                                                       required>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <input class="btn btn-primary mt-4" type="submit" value="Antworten speichern">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
