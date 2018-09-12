@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div id="container-columns">
                    <div class="column-first">
                        <a href="{{ url('group/') }}">
                            <div class="backtogroup">
                                <span>Zurück zur Gruppe</span>
                            </div>
                        </a>
                        <h1 id="groupUser">{{ $character->user }}</h1>
                        <!-- <div class="userbox"><span>Spieler: {{$character->user}}</span></div> -->
                    </div>
                    <div class="characterformular-top">
                        <div class="characterformular-left" > 
                        @if(empty($character->image ))
                            <img id="placeholder" src="http://placehold.it/200x300" alt="" width= "200px">
                        @else
                            <img id="placeholder" src="{{ asset('images/character' . $character->image) }}" alt="" width= "200px">
                        @endif
                        </div>
                        <div class="characterformular-right">
                            <div class="box">
                                <div class="rightbound">
                                    <span>Name:</span>
                                    <span>{{ $character->name }}</span>
                                </div>
                                <div class="rightbound">
                                    <span>Geschlecht:</span>
                                    <span>{{ $character->gender }}</span>
                                </div>
                                <div class="rightbound">
                                    <span>Beruf:</span>
                                    <span><?php if($job->id == $character->job_id)?>{{$job->name}}</span>
                                </div>
                                <div class="rightbound">
                                    <span>Alter:</span>
                                    <span>{{ $character->age }}</span>
                                </div>
                            </div>
                            <div class="box">
                                <div class="rightbound">
                                    <span>Haarfarbe:</span>
                                    <span>{{ $character->hair }}</span>
                                </div>
                                <div class="rightbound">
                                    <span>Augenfarbe:</span>
                                    <span>{{ $character->eyes }}</span>
                                </div>
                                <div class="rightbound">
                                    <span>Größe:</span>
                                    <span >{{ $character->size }}</span>
                                </div>
                                <div class="rightbound">
                                    <span>Gewicht:</span>
                                    <span>{{ $character->weight }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="characterformuluar-bottom" style="margin-right: 20px;">
                        <label class="labelTop" for="personality">Persönlichkeit:</label>
                        <span>{{ $character->personality }}</span>
                        <label class="labelTop" for="looks">Aussehen:</label>
                        <span>{{ $character->looks }}</span>
                        <label class="labelTop" for="family">Familie:</label>
                        <span>{{ $character->family }}</span>
                        <label class="labelTop" for="background">Hintergrund:</label>
                        <span>{{ $character->background }}</span> 
                    </div>
                    
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection