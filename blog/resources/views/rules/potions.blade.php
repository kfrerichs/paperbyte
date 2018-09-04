@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Trankliste</h1>
                    <div>
                        <p>
                            Hier ist die Liste der Kräuter, ihr religiöser Wert (Beispielsweise für Opferungen und Feste) sowie ihre Heil- und Schutzwirkung. Diese Liste ist besonders für Spieler der Berufe Heiler oder Druide wichtig.
                        </p>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Kraut</th>
                                    <th scope="col">Religion</th>
                                    <th scope="col">Heilwirkung</th>
                                    <th scope="col">Schutzwirkung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row ">Augentrost</th>
                                    <td>Thor</td>
                                    <td>Augenkrankheiten</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Kamille / Baldurs Braue</th>
                                    <td>Sonnengott</td>
                                    <td>entzündungshemmend, antibakteriell, krampflösend</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Bärlapp</th>
                                    <td>Thor</td>
                                    <td></td>
                                    <td>Behexung</td>
                                </tr>
                                <tr>
                                    <th scope="row">Beifuß</th>
                                    <td>Frigga</td>
                                    <td></td>
                                    <td>Krankheiten</td>
                                </tr>
                                <tr>
                                    <th scope="row">Brennessel / Donnernessel</th>
                                    <td>Thor</td>
                                    <td>Fruchtbarkeit</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Eberwurz</th>
                                    <td>Freyja, Thor</td>
                                    <td>Männliche Kraft, Potenz</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Ehrenpreis</th>
                                    <td>Thor</td>
                                    <td>Kühnheit, Mut, Kraft, Nüchtern</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Eisenkraut</th>
                                    <td>Freyja, Odin, Tyr</td>
                                    <td></td>
                                    <td>Neugeborene werden zu starken Kriegern gesegnet</td>
                                </tr>
                                <tr>
                                    <th scope="row">Erdbeeren</th>
                                    <td>Frigga</td>
                                    <td>Sommersprossen, Mundfäule, lichter Haarwuchs, unreine Haut, blutreinigend</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Fetthenne / Donnerkraut</th>
                                    <td>Thor</td>
                                    <td>Blutungen, Brüche, Hämorrhoiden, Kropf</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Frauenmantel</th>
                                    <td>Freyja, Sunna</td>
                                    <td>Frauenleiden</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Gänseblümchen</th>
                                    <td>Freyja (Tränen)</td>
                                    <td>Fieber, Zahnschmerzen, Augenkrankheiten</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Knabenkraut</th>
                                    <td>Freyr, Freyja</td>
                                    <td>Aphrodisiakum</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Gundelrebe / Donnerrebe</th>
                                    <td>Thor</td>
                                    <td></td>
                                    <td>Pflanzengeist bannt böse Zauber</td>
                                </tr>
                                <tr>
                                    <th scope="row">Hagebutte</th>
                                    <td>Freyja</td>
                                    <td></td>
                                    <td>Schützt in der Jûlzeit vor Krankheiten und Unfällen</td>
                                </tr>
                                <tr>
                                    <th scope="row">Hauswurz / Donars Bart</th>
                                    <td>Thor</td>
                                    <td></td>
                                    <td>Blitzschlag, Feuer, Krankheit, Verzauberung</td>
                                </tr>
                                <tr>
                                    <th scope="row">Klette</th>
                                    <td></td>
                                    <td>Blutreinigend, Geschwüre, Beulen, Krämpfe, Eiter, Ausschlag</td>
                                    <td>In der Klette wohnt der Pflanzengeist "Butz", der böse Dämonen abwehrt.</td>
                                </tr>
                                <tr>
                                    <th scope="row">Königskerze</th>
                                    <td>Thor, Freyja</td>
                                    <td>Ölgetränkte Stengel dienen als Fackel</td>
                                    <td>Mittsommer: wird durchs Feuer gezogen und über Stalltüren gehängt, um das Vieh vor Krankheiten zu schützen</td>
                                </tr>
                                <tr>
                                    <th scope="row">Labkraut</th>
                                    <td>Freyja</td>
                                    <td>Fördert die Geburt</td>
                                    <td>Schützt (ungeborenes) Kind vor bösem Zauber</td>
                                </tr>
                                <tr>
                                    <th scope="row">Mistel</th>
                                    <td>Heimdall</td>
                                    <td>Gegengift, fruchtbar</td>
                                    <td>Schutz vor schädlichen Erdstrahlen (Krebs) und bösen Einflüssen</td>
                                </tr>
                                <tr>
                                    <th scope="row">Baldrian / Mondwurz</th>
                                    <td>Freyja</td>
                                    <td>Liebesmittel</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Arnika / Mutterwurz</th>
                                    <td>Sol</td>
                                    <td>Herzstärkend</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Odermennig</th>
                                    <td>Odin</td>
                                    <td>Leibschmerzen, Blutfluss</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Quendel</th>
                                    <td>Freyja</td>
                                    <td>Gebärmutterschmerzen</td>
                                    <td>Gebärende Frauen, stillende Mütter</td>
                                </tr>
                                <tr>
                                    <th scope="row">Rainfarm</th>
                                    <td>Thor, Freyja, Frigga</td>
                                    <td></td>
                                    <td>Blitzschlag, Dämonen</td>
                                </tr>
                                <tr>
                                    <th scope="row">Schafgarbe</th>
                                    <td>Freyja</td>
                                    <td>Wunden, Geschwüre</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Seidelbast</th>
                                    <td>Tyr</td>
                                    <td>Hochgiftig</td>
                                    <td>Dämonen</td>
                                </tr>
                                <tr>
                                    <th scope="row">Wegwarte / Sonnenbraut</th>
                                    <td>Sol</td>
                                    <td>Wunden heilen</td>
                                    <td>Gefahren</td>
                                </tr>
                                <tr>
                                    <th scope="row">Sonnentau</th>
                                    <td>Sol</td>
                                    <td>Warzen, zeigt Gifte</td>
                                    <td>böse Geister</td>
                                </tr>
                                <tr>
                                    <th scope="row">Johanniskraut</th>
                                    <td>Freyja, Sol, Balder</td>
                                    <td></td>
                                    <td>Strahlungen, Geistwesen, Verzauberung, Unwetter, Plagen</td>
                                </tr>
                                <tr>
                                    <th scope="row">Löwenzahn</th>
                                    <td>Sol</td>
                                    <td>Blutreinigend, regt Milchfluss beim Stillen an</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Teufelsabbiss</th>
                                    <td>Thor</td>
                                    <td>Augenkrankheiten</td>
                                    <td>Geister, böser Blick</td>
                                </tr>
                                <tr>
                                    <th scope="row">Veilchen</th>
                                    <td>Tyr</td>
                                    <td>Kopfleiden</td>
                                    <td>Krankheit</td>
                                </tr>
                                <tr>
                                    <th scope="row">Wegerich</th>
                                    <td></td>
                                    <td>Tollwut (Bisse), Schlangengift, Skorpiongift, Bienenstiche</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row">Wermut</th>
                                    <td>Erdgöttin / Todesgöttin</td>
                                    <td></td>
                                    <td>Zur Jûlzeit: Kontakt mit Ahnengeistern</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div> 
</div>

@endsection