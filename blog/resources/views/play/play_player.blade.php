@extends('layouts.main')

@section('content')
<style>
.abilities{
  display:flex;
  flex-wrap:wrap;
  width: 90vw;
  margin:auto;
  align-items:flex-start;
  justify-content:flex-start;
}
.ability{
  width:150px;
  text-align:center;
  border: 1px solid brown;
  margin:5px;
  padding:10px;
}
.selectedAbility{
  background-color:brown;
  color:white;
}
.abilityresult{
  display:none;
}
</style>
<!-- <form method="post" action="{{url('/play')}}" class="playformular"> -->
<!-- HP und MP plus modifikation | Runen Auswahl -->
  @csrf
  <p class="dice open">Offener Wurf:<span id="testDice">0</span></p></br>
  <p class="dice modified">Unmodifizierter Wurf:<span id="testDiceUnmodified">0</span></p></br>
  <p>Fertigkeitswurf:<span id="abilitypoint-result">0</span></p></br>
  <label for="withoutOpen">Ohne Open-End</label>
  <input type="checkbox" name="withoutOpen" id="withoutOpen" onClick="changeDice()"></br>
  <label for="withoutAbility">Ohne Fertigkeit</label>
  <input type="checkbox" name="withoutAbility" id="withoutAbility" onClick="deleteSelection()"></br>
  <a class="btn btn-info" onClick="throwDice()">Würfeln</a>
  <!-- <button class="btn btn-info" onClick="throwDiceUnmodified()">Würfeln ohne Fertigkeit</button> -->
  <!-- <button type="submit" class="savechanges">Änderungen speichern</button> -->
<!-- </form> -->
  <div class="output">
    <div class="row abilityresult">
      <span class="label">Fertigkeit:</span>
      <span class="data" id="play_ability"></span>
    </div>
    <div class="row abilityresult">
      <span class="label">Grundwert:</span>
      <span class="data" id="play_base"></span>
    </div>
    <div class="row abilityresult">
      <span class="label">Bonus:</span>
      <span class="data" id="play_bonus"></span>
    </div>
    <!-- <div class="row">
      <span class="label">Modifikatoren durch das Inventar:</span>
      <span class="data" id="play_modifier"></span>
    </div> -->
    <div class="row">
      <span class="label">Würfel:</span>
      <span class="data" id="play_dice"></span>
    </div>
    <div class="row">
      <span class="label">Ergebnis:</span>
      <span class="data" id="play_result"></span>
    </div>
  </div>
  <input type="hidden" name="chosenAbility" id="chosenAbility" value="">
  <div class="abilities">
  @foreach($abilities as $ability)
    @php 
      $bonus1 = $ability->attr_1; 
      $bonus2 = $ability->attr_2;
      $abilityname = $ability->engl;
      /*$abilitybonus = $character->$bonus1 + $character->$bonus2;
      $abilitypoints = $character->$bonus1 + $character->$bonus2 + $character->$abilityname; */
    @endphp
    <div class="ability" id="playAbility-{{$ability->engl}}" onClick="saveAbility('{{$ability->engl}}',{{$character->$bonus1}},{{$character->$bonus2}},{{$character->$abilityname}})">{{$ability->name}}</div>
  @endforeach
  </div>

@endsection​