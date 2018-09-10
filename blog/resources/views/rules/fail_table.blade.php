@extends('layouts.main')

@section('content')

@include('inc.ruleBar')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Patzertabelle</h1>
                    <div>
                        <p>
                            Die Patzertabelle verschafft einen Überblick über die möglichen Konsequenzen nach einem Patzer-Wurf, also einem Fehlwurf. Würfelt ein Spieler bei einer Aktion eine 1, so steht der "Patzer" fest. Anschließend wird mit erneutem Würfeln die Höhe und der Umfang des Patzers bestimmt. 
                        </p>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Patzerbereich</th>
                                    <th scope="col">1-Handwaffen</th>
                                    <th scope="col">2-Handwaffen</th>
                                    <th scope="col">Fernkampfwaffen</th>
                                    <th scope="col">Allgemein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row ">01 - 25</th>
                                    <td>Wisch deine schwitzigen Hände trocken und halte deine Waffe besser fest!</td>
                                    <td>Du musst deine Waffe schon mit beiden Händen festhalten. Egal wie stark du bist.</td>
                                    <td>Du musst nochmal umgreifen. Irgendwas fühlt sich falsch an.</td>
                                    <td>Na das war wohl nichts. Versuchs einfach nochmal.</td>
                                </tr>
                                <tr>
                                    <th scope="row">26 - 30</th>
                                    <td>Warum lässt du deine Waffe fallen? Du brauchst eine Runde, um sie aufzuheben.</td>
                                    <td>Ist ein 2-Händer doch zu schwer für dich? Geh besser trainieren oder such dir ne leichtere Waffe. Du brauchst 1 Runde, um Kraft zu sammeln.</td>
                                    <td>Du musst die Munition auch richtig anlegen wenn du treffen willst. 1 Runde nachladen.</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">31 - 40</th>
                                    <td>Du stolperst über einen eingebildeten Stiefel. Vielleicht war es auch dein eigener. Setze eine Runde aus.</td>
                                    <td>War das ein Einhorn? Kleiner Tipp: NEIN! Setze eine Runde aus während du das Wesen suchst.</td>
                                    <td></td>
                                    <td>Dir fällt diese verdammte letzte Zutat ein, die deine Großmutter in ihren Eintopf getan hat.</td>
                                </tr>
                                <tr>
                                    <th scope="row">41 - 50</th>
                                    <td>Dein Angriff überlastet deine Muskeln. Du erhältst 1-5 Treffer. Nächstes Mal etwas weniger Enthusiasmus.</td>
                                    <td></td>
                                    <td>Du bekommst einen Krampf in der Waffenhand. Setze eine Runde aus und denk dran: gegen strecken.</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">51 - 60</th>
                                    <td>Du setzt zwei Runden aus, nachdem dein Angriff zu einem Wirbelwind wurde.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">61 - 65</th>
                                    <td>Versuch deine Waffe zu fangen, wenn du sie schon in die Luft wirfst. Aber nicht an der Klinge!</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">66</th>
                                    <td>Deine Waffe bricht ab. Jetzt heißt es improvisieren oder aufgeben. Das mit Tanzen ist vielleicht eine Alternative.</td>
                                    <td>Deine Waffe verliert ihren Griff. Jetzt heißt es improvisieren oder aufgeben. Vielleicht kannst du den Rest werfen.</td>
                                    <td>Deine Waffe bricht entzwei. Jetzt heißt es improvisieren oder aufgeben. Vielleicht doch Nahkampf?</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">67 - 70</th>
                                    <td>Guter Schlag. Allerdings triffst du deinen Freund. 1W10 TP und krit.B</td>
                                    <td>Guter Wurf! Du wolltest nicht werfen? Du brauchst 2 Runden um deine Waffe zu holen.</td>
                                    <td>Guter Schuss! Der jedoch nach hinten ging. Nächstes Mal nach vorne schauen!</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">71 - 80</th>
                                    <td>Etwas in deinem Augenwinkel lenkt dich ab. Setze 2 Runden aus.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">81 - 85</th>
                                    <td>Kurzer Asthmaanfall. Du brauchst 2 Runden um wieder Luft zu bekommen.</td>
                                    <td>Krampf im Oberarm. Du brauchst 2 Runden, um ihn wieder bewegen zu können.</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">86 - 90</th>
                                    <td>Du bist 2 Runden benommen während du über deine Tanzkarriere nachdenkst.</td>
                                    <td>Du bist 2 Runden benommen während du über deine Bodybuilder-Karriere nachdenkst.</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">91 - 95</th>
                                    <td>Das war wohl etwas zu viel Schwung! Du landest mit dem Kopf voran auf dem Boden. 3 Runden benommen.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">96 - 99</th>
                                    <td>Das ging daneben! Du brauchst 3 Runden bis dir bewusst ist, wo du jetzt stehst.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">100</th>
                                    <td>War das ein Selbstmordversuch? Such dir besser einen Therapeuten! 1W10 TP und krit. C</td>
                                    <td>Das tut weh! Dir ist bewusst, dass du nicht gegen dich selbst kämpfen musst oder? 1W10 TP und krit. C</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div> 
</div>

@endsection