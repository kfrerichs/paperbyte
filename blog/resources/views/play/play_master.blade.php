@extends('layouts.main')

@section('content')
<h1 id="headerPlay">Spielen</h1>
<div class="topPartPlay">
  @if(count($enemies) > 0)
    <form method="post" action="{{url('/play/master')}}" id="enemy">
      @csrf
      <!-- choose enemy to play, first enemy in db is preselected -->
      <select name="chooseEnemy" id="chooseEnemy" class="chooseEnemy">
        @foreach($enemies as $enemy)
          <option value="{{$enemy->id}}" class="enemy" <?php if($enemy->id == $chosenEnemy->id) echo ' selected="selected"';?>>{{$enemy->name}}</option>
        @endforeach
      </select>
      <button type='submit' class="selectEnemy btn btn-primary">Gegner auswählen</button>
    </form>
    <form method="post" action="{{url('/play')}}" id="pointForm">
      @csrf
        <div class="points">
          <div class="pointsMargin">
            <label class="checkLabel woMargin" for="hp">Trefferpunkte:</label>
            <input type="hidden" name="max_hp" id="max_hp" value="{{$chosenEnemy->max_hp}}">
            <input class="inputWidth woMargin" type="number" name="hp" id="hp" value="{{old('hp')?old('hp'):$chosenEnemy->hp}}">
          </div>
          <div class="pointsMargin">
            <label class="checkLabel woMargin" for="mp">Magiepunkte:</label>
            <input type="hidden" name="max_mp" id="max_mp" value="{{$chosenEnemy->max_mp}}">
            <input class="inputWidth woMargin" type="number" name="mp" id="mp" value="{{old('mp')?old('mp'):$chosenEnemy->mp}}"></br>
          </div>
          <a class="btn btn-primary pointsMargin save" onClick="savePoints()">Änderung speichern</a>
          <a class="btn btn-primary pointsMargin regenerate" onClick="regenerate()">TP und MP Regenerieren</a>
        </div>
    </form>
    <!-- checkboxes to throw dice w/o open-end and/or w/o ability -->
      <div class="gaming">
        <div class="gaming-left">
          <div class="checkbox-collection">
            <label class="checkLabel" for="withoutOpen">Ohne Open-End</label>
            <input type="checkbox" name="withoutOpen" class="checkbox" id="withoutOpen" onClick="changeDice()"></br>
            <label class="checkLabel" for="withoutAbility">Ohne Fertigkeit</label>
            <input type="checkbox" name="withoutAbility" class="checkbox" id="withoutAbility" onClick="deleteSelection()"></br>
          </div>
          <a class="btn btn-info dice" onClick="throwDice()">Würfeln</a>
        </div>
        <!-- output for ability-data like name, base, bonus and inventory bonus -->
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
          <div class="row abilityresult">
            <span class="label" id="play_inventory"></span>
            <span class="data" id="play_modulo"></span>
          </div>
          <!-- result of thrown dice -->
          <div class="row">
            <span class="label">Würfel:</span>
            <span class="data" id="play_dice"></span>
          </div>
          <!-- overall result -> sum of all above -->
          <div class="row">
            <span class="label">Ergebnis:</span>
            <span class="data" id="play_result"></span>
          </div>
          <!-- hints to open-end, failure and mistakes (no ability or rune chosen) -->
            <h2 class="patzer"></h2>
        </div>
        
        <!-- display of rune levels from chosen rune. On click level gets chosen and mp get subtracted when dice is thrown -->
      </div>
    </div>
  <div class="runedata">
    @foreach($runes as $rune)
      <div class="{{$rune->name}} showRune">
        <img src="{{ asset('images/' . $rune->img_name) }}" alt="{{$rune->name}}">
        <h3>{{$rune->name}}</h3>
        <input type="hidden" name="runecosts" id="runeCosts">
        <div class="effects">
          <div class="novice">
            <div class="effects-head" onClick="chooseLevel('novice','{{$rune->novice_name}}',{{$rune->novice_price}})">{{$rune->novice_name}}</div>
            <div class="effects-text">{{$rune->novice_descr}}</div>
          </div>
          <div class="adept">
            <div class="effects-head" onClick="chooseLevel('adept','{{$rune->adept_name}}',{{$rune->adept_price}})">{{$rune->adept_name}}</div>
            <div class="effects-text">{{$rune->adept_descr}}</div>
          </div>
          <div class="expert">
            <div class="effects-head" onClick="chooseLevel('expert','{{$rune->expert_name}}',{{$rune->expert_price}})">{{$rune->expert_name}}</div>
            <div class="effects-text">{{$rune->expert_descr}}</div>
          </div>
        </div>
        <p class="chosen"></p>
      </div>
    @endforeach
  </div>
  <div class="fixFlex bottomPartPlay">
    <h3>Fertigkeiten</h3>
    <!-- clickable list of all abilities with data from abilites database. chosen ability gets displayed above. -->
    <div class="abilities">
      @foreach($abilities as $ability)
        @php 
          $bonus1 = $ability->attr_1; 
          $bonus2 = $ability->attr_2;
          $abilityname = $ability->engl;
        @endphp
        <div class="ability" id="playAbility-{{$ability->engl}}" onClick="saveAbility('{{$ability->engl}}',{{$chosenEnemy->$bonus1}},{{$chosenEnemy->$bonus2}},{{$chosenEnemy->$abilityname}},{{$ability->id}})">{{$ability->name}}</div>
      @endforeach
    </div>
    <h3>Runen</h3>
    <!-- clickable list of all runes with data from runes database. chosen rune gets displayed above. -->
    <div class="runes">
      @foreach($runes as $rune)
        <div class="rune" id="playRune-{{$rune->name}}" onClick="saveRune('{{$rune->name}}',{{$chosenEnemy->runes_use}},{{$chosenEnemy->sd}},{{$chosenEnemy->ge}})">{{$rune->name}}</div>
      @endforeach
    </div>
  @else
      <p>Es muss erst ein Gegner in der Datenbank angelegt werden.</p>
  @endif
</div>
@endsection​
