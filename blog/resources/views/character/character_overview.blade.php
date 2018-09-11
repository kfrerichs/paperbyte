@extends('layouts.main')

@section('content')

@include('inc.characterBar')

<style>
.characterformular{
  width: 80vw;
  margin:auto;
}
/* .characterformular > form{
  display:flex;
  flex-direction: column;
  width: 100%;
} */
.characterformular textarea{
  height: 100px;
  width: 100%;
}
.characterformular-top{
  display:flex;
}
.characterformular-left{
  display:flex;
  flex-direction:column;
}
.characterformular-left input{
  margin-top: 20px;
}
.characterformular-right{
  display:flex;
  flex-flow: row wrap;
  width: 100%;
  justify-content: space-between;
}
.characterformular-right textarea{
  width: 100%;
}
.box{
  display:flex;
  flex-direction:column;
  width: 45%;
  margin-bottom: 20px;
}
.box .input-row{
  padding: 10px 0;
  margin-bottom: 20px;
}
.box .input-row label{
  width: 100px;
  text-align: left;
}
.gear .input-row select{
  margin-bottom: 20px;
  width: 100%
}
.gear .input-row label{
  width: 200px;
}
.form-control, label, textarea, input, select{
  width: 100%;
}
label{
  display: block;
  width: 50%;
  float:left;
}
.savechanges{
  display:block;
  margin-left: auto;
  /* margin-right: 10vw; */
  margin-right: 20px;
  margin-top: 20px;
  margin-bottom: 100px;
  font-family: 'EagleLake', Helvetica, sans-serif;
}
#placeholder{
  width: 200px;
  margin-right: 20px;
  margin-top: 20px;
}
textarea{
  margin-bottom: 20px;
}
#file{
  display: none;
}
#buttonUpload, .savechanges{
  width: 200px;
  font-size: 12px;
  background-color: #4d3328;
  border: none;
  color: #ffffff;
  padding: 5px;
}
#buttonUpload:hover, .savechanges:hover{
  background-color: #32cdcd;
}
table{
  margin-top: 20px;
  font-family: 'EagleLake', Helvetica, sans-serif;
  border-collapse: separate;
  border-spacing: 10px 20px;
}
.gear{
  margin-top: 20px;
  margin-right: 20px;
}

</style>

<form method="post" action="{{url('/character')}}" class="characterformular" enctype="multipart/form-data">
  @csrf
  <div class="characterformular-top">
    <div class="characterformular-left" >
    
      @if(empty($character->image ))
        <img src="http://placehold.it/200x300" alt="" width= "200px">
      @else
        <img src="{{ asset('images/character' . $character->image) }}" alt="" width= "200px">
      @endif
      <input type="file" name="file" id="file">
      <input type="button" id="buttonUpload" value="Profilbild wählen" onclick="document.getElementById('file').click();"/>
    </div>
    <div class="characterformular-right">
      <div class="box">
          <div class="input-row">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{old('name')?old('name'):$character->name}}" disabled>
          </div>
          <div class="input-row">
            <label for="gender">Geschlecht</label>
            <input type="text" name="gender" id="gender" value="{{old('gender')?old('gender'):$character->gender}}">
          </div>
          <div class="input-row">
            <label for="job">Beruf</label>
            <select name="job_id">
              @foreach($jobs as $job)
                <option value="{{$job->id}}" <?php if($job->id == $character->job_id) echo ' selected="selected"';?>>{{$job->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="input-row">
            <label for="age">Alter</label>
            <input type="text" name="age" id="age" value="{{old('age')?old('age'):$character->age}}">
          </div>
      </div>
      <div class="box">
          <div class="input-row">
            <label for="hair">Haarfarbe</label>
            <input type="text" name="hair" id="hair" value="{{old('hair')?old('hair'):$character->hair}}">
          </div>
          <div class="input-row">
            <label for="eyes">Augenfarbe</label>
            <input type="text" name="eyes" id="eyes" value="{{old('eyes')?old('eyes'):$character->eyes}}">
          </div>
          <div class="input-row">
            <label for="size">Größe</label>
            <input type="number" name="size" id="size" value="{{old('size')?old('size'):$character->size}}">
          </div>
          <div class="input-row">
            <label for="weight">Gewicht</label>
            <input type="number" name="weight" id="weight" value="{{old('weight')?old('weight'):$character->weight}}">
          </div>
      </div>
      <!-- <label for="family">Familie</label>
      <textarea name="family" id="family">{{$character->family}}</textarea> -->
    </div>
  </div>
  <div class="characterformuluar-bottom" style="margin-right: 20px;">
    <label for="personality">Persönlichkeit</label>
    <textarea name="personality" id="personality">{{$character->personality}}</textarea>
    <label for="looks">Aussehen</label>
    <textarea name="looks" id="looks">{{$character->looks}}</textarea>
    <label for="family">Familie</label>
    <textarea name="family" id="family">{{$character->family}}</textarea>
    <label for="background">Hintergrund</label>
    <textarea name="background" id="background" >{{$character->background}}</textarea> 
  </div>
  <div class="attributes">
      <table>
        <tr>
          <th>Attribut</th>
          <th>Rang</th>
          <th>Bonus</th>
        </tr>
        <tr>
          <td>List(Li)</td>
          <td>
            <input type="number" name="li_rank" id="li_rank" value="{{old('li_rank')?old('li_rank'):$character->li_rank}}">
          </td>
          <td>
            <input type="number" name="li" id="li" value="{{old('li')?old('li'):$character->li}}">
          </td>
        </tr>
        <tr>
          <td>Logik(Lo)</td>
          <td>
            <input type="number" name="lo_rank" id="lo_rank" value="{{old('lo_rank')?old('lo_rank'):$character->lo_rank}}">
          </td>
          <td>
            <input type="number" name="lo" id="lo" value="{{old('lo')?old('lo'):$character->lo}}">
          </td>
        </tr>
        <tr>
          <td>Intuition(In)</td>
          <td>
            <input type="number" name="in_rank" id="in_rank" value="{{old('in_rank')?old('in_rank'):$character->in_rank}}" >
          </td>
          <td>
            <input type="number" name="in" id="in" value="{{old('in')?old('in'):$character->in}}" >
          </td>
        </tr>
        <tr>
          <td>Stärke(St)</td>
          <td>
            <input type="number" name="st_rank" id="st_rank" value="{{old('st_rank')?old('st_rank'):$character->st_rank}}">
          </td>
          <td>
            <input type="number" name="st" id="st" value="{{old('st')?old('st'):$character->st}}">
          </td>
        </tr>
        <tr>
          <td>Reaktion(Re)</td>
          <td>
            <input type="number" name="re_rank" id="re_rank" value="{{old('re_rank')?old('re_rank'):$character->re_rank}}">
          </td>
          <td>
            <input type="number" name="re" id="re" value="{{old('re')?old('re'):$character->re}}">
          </td>
        </tr>
        <tr>
          <td>Geschicklichkeit(Ge)</td>
          <td>
            <input type="number" name="ge_rank" id="ge_rank" value="{{old('ge_rank')?old('ge_rank'):$character->ge_rank}}">
          </td>
          <td>
            <input type="number" name="ge" id="ge" value="{{old('ge')?old('ge'):$character->ge}}">
          </td>
        </tr>
        <tr>
          <td>Selbstdisziplin(Sd)</td>
          <td>
            <input type="number" name="sd_rank" id="sd_rank" value="{{old('sd_rank')?old('sd_rank'):$character->sd_rank}}">
          </td>
          <td>
            <input type="number" name="sd" id="sd" value="{{old('sd')?old('sd'):$character->sd}}">
          </td>
        </tr>
        <tr>
          <td>Charisma(Ch)</td>
          <td>
            <input type="number" name="ch_rank" id="ch_rank" value="{{old('ch_rank')?old('ch_rank'):$character->ch_rank}}">
          </td>
          <td>
            <input type="number" name="ch" id="ch" value="{{old('ch')?old('ch'):$character->ch}}">
          </td>
        </tr>
      </table>
        
    </div>
  
  <div class="gear">
    <div class="input-row">
      <label for="weapon_1">Waffe 1</label>
      <select name="weapon_1_id">
        @foreach($weapons as $weapon)
          <option value="{{$weapon->id}}" <?php if($weapon->id == $character->weapon_1_id) echo ' selected="selected"';?>>{{$weapon->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="input-row">
      <label for="weapon_2">Waffe 2</label>
      <select name="weapon_2_id">
        @foreach($weapons as $weapon)
          <option value="{{$weapon->id}}" <?php if($weapon->id == $character->weapon_2_id) echo ' selected="selected"';?>>{{$weapon->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="input-row">
      <label for="armour">Rüstungsklasse</label>
      <select name="armour_id">
        @foreach($armours as $armour)
          <option value="{{$armour->id}}" <?php if($armour->id == $character->armour_id) echo ' selected="selected"';?>>{{$armour->id}} {{$armour->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <button type="submit" class="savechanges">Änderungen speichern</button>
</form>
</div>

@endsection​
