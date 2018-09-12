@extends('layouts.main')

@section('content')

@include('inc.characterBar')

<style>
.bonusList{
  list-style-type:none;
  display:flex;
  color:grey;
  font-size: 20px;
}
.bonusList li:nth-child(2n+2){
  margin-left:5px;
}
.selected{
  color:black;
}

</style>
<form method="post" action="{{url('/character/abilities')}}" id="abilityform">
  @csrf
    <table>
      <tr>
        <th>Fertigkeit</th>
        <th>Attribute</th>
        <th>Kosten</th>
        <th>Grundwert</th>
        <th>Bonus</th>
        <th>Gesamt</th>
      </tr>
      @foreach($abilities as $ability)
      <tr>
      <!-- show ability data -->
        <td>{{$ability->name}}</td>
        <td>{{$ability->attr_1}}/{{$ability->attr_2}}</td>
        <td>{{$ability->$costs}}</td>
        <td>
        <!-- get abiltiy base of character through his attributes-->
          @php
            $bonus1 = $ability->attr_1; 
            $bonus2 = $ability->attr_2;
            echo $character->$bonus1 + $character->$bonus2;
            $abilityname = $ability->engl;
          @endphp
        </td>
        <td>
        <!-- selectable list to save bonus points in the same manner that would happen on paper -->
            <ul class="bonusList">
              <!-- hidden input to save data without user noticing -->
              <input type="hidden" name="{{$ability->engl}}" id="{{$ability->engl}}" value="{{old($abilityname)?old($abilityname):$character->$abilityname}}" />
            @php
              for($i=1;$i<=14;$i++) {
                $selected = "";
                if(!empty($character->$abilityname) && $i<= $character->$abilityname) {
                  $selected = "selected";
                }
                $point = '0';
                if($i < 10){
                  $point = '0'.$i;
                }
                else{
                  $point = $i;
                }
            @endphp
              <li id="{{$abilityname}}-{{$point}}" class="{{$selected}}" onClick="getNumber({{$i}},'{{$abilityname}}',{{$character->$bonus1}},{{$character->$bonus2}})">x</li>
            @php
              }
            @endphp
          <ul>
        </td>
        <!-- all points summed up -->
        <td class="abilitysum">{{$character->$bonus1 + $character->$bonus2 + $character->$abilityname}}</td>
      </tr>
      @endforeach
    </table>
  <button type="submit" class="savechanges">Änderungen speichern</button>
</form>

@endsection​