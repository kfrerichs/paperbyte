@extends('layouts.main')

@section('content')
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
  justify-content: space-between;
}
.characterformular-right textarea{
  width: 100%;
}
.box{
  display:flex;
  flex-direction:column;
  width: 50%;
}
.box .input-row{
  padding: 10px 0;
}
.box .input-row label{
  width: 100px;
}
.savechanges{
  display:block;
  margin-left: auto;
  margin-right: 10vw;
}

</style>

<form method="post" action="{{url('/character/new')}}" class="characterformular">
  @csrf
  <div class="characterformular-top">
    <div class="characterformular-left">
      <img src="http://placehold.it/200x300" alt="">
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <div class="characterformular-right">
      <div class="box">
          <div class="input-row">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{old('name')?old('name'):$character->name}}" disabled>
          </div>
          <div class="input-row">
            <label for="gender">Geschlecht</label>
            <input type="text" name="gender" id="gender" value="{{old('gender')?old('gender'):''}}">
          </div>
          <div class="input-row">
            <label for="job">Beruf</label>
            <select name="job_id">
              <option value="">Bitte wählen</option>
              @foreach($jobs as $job)
                <option value="{{$job->id}}" {{(old('job_id')== $job ? 'selected="selected"':'')}}>{{$job->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="input-row">
            <label for="age">Alter</label>
            <input type="text" name="age" id="age" value="{{old('age')?old('age'):''}}">
          </div>
      </div>
      <div class="box">
          <div class="input-row">
            <label for="hair">Haarfarbe</label>
            <input type="text" name="hair" id="hair" value="{{old('hair')?old('hair'):''}}">
          </div>
          <div class="input-row">
            <label for="eyes">Augenfarbe</label>
            <input type="text" name="eyes" id="eyes" value="{{old('eyes')?old('eyes'):''}}">
          </div>
          <div class="input-row">
            <label for="size">Größe</label>
            <input type="number" name="size" id="size" value="{{old('size')?old('size'):''}}">
          </div>
          <div class="input-row">
            <label for="weight">Gewicht</label>
            <input type="number" name="weight" id="weight" value="{{old('weight')?old('weight'):''}}">
          </div>
      </div>
      <label for="family">Familie</label>
      <textarea name="family" id="family"></textarea>
    </div>
  </div>
  <div class="characterformuluar-bottom">
    <label for="looks">Aussehen</label>
    <textarea name="looks" id="looks" ></textarea>
    <label for="background">Persönlichkeit</label>
    <textarea name="background" id="background"></textarea> 
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
            <input type="text" name="li_rank" id="li_rank" value="{{old('li_rank')?old('li_rank'):''}}">
          </td>
          <td>
            <input type="text" name="li" id="li" value="{{old('li')?old('li'):''}}">
          </td>
        </tr>
        <tr>
          <td>Logik(Lo)</td>
          <td>
            <input type="text" name="lo_rank" id="lo_rank" value="{{old('lo_rank')?old('lo_rank'):''}}">
          </td>
          <td>
            <input type="text" name="lo" id="lo" value="{{old('lo')?old('lo'):''}}">
          </td>
        </tr>
        <tr>
          <td>Intuition(In)</td>
          <td>
            <input type="text" name="in_rank" id="in_rank" value="{{old('in_rank')?old('in_rank'):''}}" >
          </td>
          <td>
            <input type="text" name="in" id="in" value="{{old('in')?old('in'):''}}" >
          </td>
        </tr>
        <tr>
          <td>Stärke(St)</td>
          <td>
            <input type="text" name="st_rank" id="st_rank" value="{{old('st_rank')?old('st_rank'):''}}">
          </td>
          <td>
            <input type="text" name="st" id="st" value="{{old('st')?old('st'):''}}">
          </td>
        </tr>
        <tr>
          <td>Reaktion(Re)</td>
          <td>
            <input type="text" name="re_rank" id="re_rank" value="{{old('re_rank')?old('re_rank'):''}}">
          </td>
          <td>
            <input type="text" name="re" id="re" value="{{old('re')?old('re'):''}}">
          </td>
        </tr>
        <tr>
          <td>Geschicklichkeit(Ge)</td>
          <td>
            <input type="text" name="ge_rank" id="ge_rank" value="{{old('ge_rank')?old('ge_rank'):''}}">
          </td>
          <td>
            <input type="text" name="ge" id="ge" value="{{old('ge')?old('ge'):''}}">
          </td>
        </tr>
        <tr>
          <td>Selbstdisziplin(Sd)</td>
          <td>
            <input type="text" name="sd_rank" id="sd_rank" value="{{old('sd_rank')?old('sd_rank'):''}}">
          </td>
          <td>
            <input type="text" name="sd" id="sd" value="{{old('sd')?old('sd'):''}}">
          </td>
        </tr>
        <tr>
          <td>Charisma(Ch)</td>
          <td>
            <input type="text" name="ch_rank" id="ch_rank" value="{{old('ch_rank')?old('ch_rank'):''}}">
          </td>
          <td>
            <input type="text" name="ch" id="ch" value="{{old('ch')?old('ch'):''}}">
          </td>
        </tr>
      </table>
        
    </div>
  </div>
  <div class="gear">
    <div class="input-row">
      <label for="weapon_1">Waffe 1</label>
      <select name="weapon_1_id">
          <option value="">Bitte wählen</option>
        @foreach($weapons as $weapon)
          <option value="{{$weapon->id}}" {{(old('weapon_1_id')== $weapon ? 'selected="selected"':'')}}>{{$weapon->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="input-row">
      <label for="weapon_2">Waffe 2</label>
      <select name="weapon_2_id">
        <option value="">Bitte wählen</option>
        @foreach($weapons as $weapon)
          <option value="{{$weapon->id}}" {{(old('weapon_2_id')== $weapon ? 'selected="selected"':'')}}>{{$weapon->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="input-row">
      <label for="armour">Rüstungsklasse</label>
      <select name="armour_id">
        <option value="">Bitte wählen</option>
        @foreach($armours as $armour)
          <option value="{{$armour->id}}" {{(old('armour_id')== $armour ? 'selected="selected"':'')}}>{{$armour->id}} {{$armour->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <button type="submit" class="savechanges">Änderungen speichern</button>
</form>

@endsection​