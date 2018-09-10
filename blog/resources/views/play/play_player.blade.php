@extends('layouts.main')

@section('content')
<style>
  .checkbox{
    cursor:pointer;
  }
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
    border: 1px solid #4d3328;
    margin:5px;
    padding:10px;
    cursor:pointer;
  }
  .runes{
    display:flex;
    flex-wrap:wrap;
    width: 90vw;
    margin:auto;
    align-items:flex-start;
    justify-content:flex-start;
  }
  .rune{
    width:150px;
    text-align:center;
    border: 1px solid brown;
    margin:5px;
    padding:10px;
    cursor:pointer;
  }
  .selectedBox{
    background-color:brown;
    color:white;
  }
  .selectedBox, .ability:hover{
    background-color: #4d3328;
    color: #ffffff;
  }
  .abilityresult{
    display:none;
  }
  h1{
    padding-bottom: 20px;
  }

  .effects{
    display:flex;
    width: 500px;
    justify-content: space-between;
  }
  .effects-head{
    width:150px;
    text-align:center;
    border: 1px solid brown;
    margin:5px;
    padding:10px;
  }
  .disabled{
    color:grey;
    background-color:#cfcfcf;
    border:grey;
  }
  .disabled:hover{
    color:grey;
    background-color:#cfcfcf;
    border:grey;
  }
  .showRune{
    display:none;
  }

</style>
  <h1>Spielen</h1>
  <form method="post" action="{{url('/play')}}" id="pointForm">
    @csrf
    <label for="hp">Trefferpunkte:</label>
    <input type="hidden" name="max_hp" id="max_hp" value="{{$character->max_hp}}">
    <input type="number" name="hp" id="hp" value="{{old('hp')?old('hp'):$character->hp}}">
    <label for="mp">Magiepunkte:</label>
    <input type="hidden" name="max_mp" id="max_mp" value="{{$character->max_mp}}">
    <input type="number" name="mp" id="mp" value="{{old('mp')?old('mp'):$character->mp}}"></br>
    <a class="btn btn-default save" onClick="savePoints()">Änderung speichern</a>
    <a class="btn btn-default regenerate" onClick="regenerate()">TP und MP Regenerieren</a>
  </form>
  <p class="dice open">Offener Wurf:<span id="testDice">0</span></p></br>
  <p class="dice modified">Unmodifizierter Wurf:<span id="testDiceUnmodified">0</span></p></br>
  <p>Fertigkeitswurf:<span id="abilitypoint-result">0</span></p></br>
  <label for="withoutOpen">Ohne Open-End</label>
  <input type="checkbox" name="withoutOpen" class="checkbox" id="withoutOpen" onClick="changeDice()"></br>
  <label for="withoutAbility">Ohne Fertigkeit</label>
  <input type="checkbox" name="withoutAbility" class="checkbox" id="withoutAbility" onClick="deleteSelection()"></br>
  <a class="btn btn-info dice" onClick="throwDice()">Würfeln</a>
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
    <div class="row">
      <span class="label">Würfel:</span>
      <span class="data" id="play_dice"></span>
    </div>
    <div class="row">
      <span class="label">Ergebnis:</span>
      <span class="data" id="play_result"></span>
    </div>
      <h2 class="patzer"></h2>
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
  <h3>Fertigkeiten</h3></br>
  <div class="abilities">
  @foreach($abilities as $ability)
    @php 
      $bonus1 = $ability->attr_1; 
      $bonus2 = $ability->attr_2;
      $abilityname = $ability->engl;
    @endphp
    <div class="ability" id="playAbility-{{$ability->engl}}" onClick="saveAbility('{{$ability->engl}}',{{$character->$bonus1}},{{$character->$bonus2}},{{$character->$abilityname}})">{{$ability->name}}</div>
  @endforeach
  </div>
  <h3>Runen</h3></br>
  <div class="runes">
  @foreach($runes as $rune)
    @php 
     
    @endphp
    <div class="rune" id="playRune-{{$rune->name}}" onClick="saveRune('{{$rune->name}}',{{$character->runes_use}},{{$character->sd}},{{$character->ge}})">{{$rune->name}}</div>
  @endforeach
  </div>

@endsection​