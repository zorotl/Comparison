@extends('layouts.app')

@section('sitetitle', 'Fragen - Übersicht')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fragen beantworten</div>

                    <div class="card-body">
                        <div class="">
                            Um von allen Vorteilen zu profitieren,
                            <a href="/login">logge dich ein</a> oder
                            <a href="/register">registriere dich</a> noch heute.

                            Es besteht aber auch die Möglichkeit, diese Website ohne Login
                            und ohne Angabe persönlicher Daten (Name, eMail, usw.) zu verwenden.
                        </div>
                        <form class="form" method="post">
                            @csrf
                            <fieldset>
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
