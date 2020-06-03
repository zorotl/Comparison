@extends('layouts.app')

@section('sitetitle', 'Fragen - Übersicht')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fragen - Übersicht</div>

                    <div class="card-body">
                        <form class="form" method="post" action="{{ asset("/select") }}">
                            @csrf
                            <fieldset>
                                <table style="width: 600px">
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
                                            <td style="text-align: center">
                                                <input id="ja" type="radio" name="{{ $q->id }}" value="ja"
                                                       @if (isset($answers[$q->id]) and $answers[$q->id] === "ja")
                                                       checked="checked"
                                                       @endif
                                                       required>
                                            </td>
                                            <td style="text-align: center">
                                                <input id="ev" type="radio" name="{{ $q->id }}" value="ev"
                                                       @if (isset($answers[$q->id]) and $answers[$q->id] === "ev")
                                                       checked="checked"
                                                       @endif
                                                       required>
                                            </td>
                                            <td style="text-align: center">
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
                                <input type="submit" value="Absenden" name="submit" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
