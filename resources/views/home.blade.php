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
                                <h2>Entdecke Gemeinsamkeiten, verbinde dich auf spielerische Weise!</h2>
                                <p>Hast du dich jemals gefragt, wie ähnlich du anderen Menschen wirklich bist? Comparison bietet dir eine einzigartige und unterhaltsame Möglichkeit, genau das herauszufinden.</p>

                                <h3>So funktioniert's:</h3>
                                <ol>
                                    <li><b>Beantworte Fragen:</b> Nimm an einem unserer spannenden Fragebögen teil. Die Fragen sind vielfältig und regen zum Nachdenken an.</li>
                                    <li><b>Lade Freunde ein:</b> Teile den Fragebogen mit deinen Freunden, deiner Familie oder deinem Partner.</li>
                                    <li><b>Vergleiche Antworten:</b> Comparison analysiert die Antworten und zeigt euch auf einen Blick, wo eure Übereinstimmungen liegen. Entdeckt Gemeinsamkeiten, die ihr vielleicht nie vermutet hättet!</li>
                                </ol>

                                <h3>Was Comparison besonders macht:</h3>
                                <ul>
                                    <li><b>Spielerischer Vergleich:</b> Vergleich ist mehr als nur ein Test. Es ist eine Gelegenheit, sich auf spielerische Weise besser kennenzulernen.</li>
                                    <li><b>Vielfältige Themen:</b> Unsere Fragebögen decken ein breites Spektrum an Themen ab, von persönlichen Vorlieben bis hin zu tiefgründigen Ansichten.</li>
                                    <li><b>Einfache Bedienung:</b> Die intuitive Benutzeroberfläche macht die Teilnahme und den Vergleich der Antworten zum Kinderspiel.</li>
                                    <li><b>Gemeinsamkeiten entdecken:</b> Entdeckt Gemeinsamkeiten, die verbinden.</li>
                                    <li><b>Spass haben:</b> Comparison ist eine unterhaltsame Art, Zeit miteinander zu verbringen.</li>
                                </ul>

                                <p>Egal, ob du neue Freunde finden, deine Beziehungen vertiefen oder einfach nur Spaß haben möchtest, Comparison ist die perfekte Plattform für dich.</p>
                                <p><b>Probiere es jetzt aus und entdecke, wie viel ihr gemeinsam habt!</b></p>
                            </div>
                        @endauth

                        @guest
                            <div>
                                <p>Hallo Gast :-)</p>
                                <h2>Entdecke Gemeinsamkeiten, verbinde dich auf spielerische Weise!</h2>
                                <p>Hast du dich jemals gefragt, wie ähnlich du anderen Menschen wirklich bist? Comparison bietet dir eine einzigartige und unterhaltsame Möglichkeit, genau das herauszufinden.</p>

                                <h3>So funktioniert's:</h3>
                                <ol>
                                    <li><b>Beantworte Fragen:</b> Nimm an einem unserer spannenden Fragebögen teil. Die Fragen sind vielfältig und regen zum Nachdenken an.</li>
                                    <li><b>Lade Freunde ein:</b> Teile den Fragebogen mit deinen Freunden, deiner Familie oder deinem Partner.</li>
                                    <li><b>Vergleiche Antworten:</b> Comparison analysiert die Antworten und zeigt euch auf einen Blick, wo eure Übereinstimmungen liegen. Entdeckt Gemeinsamkeiten, die ihr vielleicht nie vermutet hättet!</li>
                                </ol>

                                <h3>Was Comparison besonders macht:</h3>
                                <ul>
                                    <li><b>Spielerischer Vergleich:</b> Vergleich ist mehr als nur ein Test. Es ist eine Gelegenheit, sich auf spielerische Weise besser kennenzulernen.</li>
                                    <li><b>Vielfältige Themen:</b> Unsere Fragebögen decken ein breites Spektrum an Themen ab, von persönlichen Vorlieben bis hin zu tiefgründigen Ansichten.</li>
                                    <li><b>Einfache Bedienung:</b> Die intuitive Benutzeroberfläche macht die Teilnahme und den Vergleich der Antworten zum Kinderspiel.</li>
                                    <li><b>Gemeinsamkeiten entdecken:</b> Entdeckt Gemeinsamkeiten, die verbinden.</li>
                                    <li><b>Spass haben:</b> Comparison ist eine unterhaltsame Art, Zeit miteinander zu verbringen.</li>
                                </ul>

                                <p>Egal, ob du neue Freunde finden, deine Beziehungen vertiefen oder einfach nur Spaß haben möchtest, Comparison ist die perfekte Plattform für dich.</p>
                                <p><b>Probiere es jetzt aus und entdecke, wie viel ihr gemeinsam habt!</b></p>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
