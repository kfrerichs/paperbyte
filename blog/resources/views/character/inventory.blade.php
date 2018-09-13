@extends('layouts.main')

@section('content')

@include('inc.characterBar')

<style>
.bonusList{
  list-style-type:none;
  display:flex;
  color:grey;
}
.bonusList li:nth-child(2n+2){
  margin-left:5px;
}
.selected{
  color:black;
}

</style>
<table>
  <tr>
    <th>Gegenstand</th>
    <th>Beschreibung</th>
    <th>Modulo</th>
    <th>Fertigkeit</th>
  </tr>
  <!-- display existing items -->
  @foreach($inventories as $inventory)
  <tr>
    <td>{{$inventory->item_name}}</td>
    <td>{{$inventory->description}}</td>
    <td>{{$inventory->modulo}}</td>
    @foreach($abilities as $ability)
      <?php if($ability->id == $inventory->ability_id){ ?>
        <td>{{$ability->name}}</td>
      <?php } ?>
    @endforeach
    <td>
      <a href="{{url('character/inventory/delete/'.$inventory->id)}}" class="btn btn-danger" onClick="return confirm('Wirklich löschen?');"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
  @endforeach
  <!-- add new items -->
  <form method="post" action="{{url('/character/inventory')}}" id="inventoryform">
    @csrf
      <tr>
        <td><input type="text" name="item_name" id="item_name" placeholder="Name"></td>
        <td><input type="text" name="description" id="description" placeholder="Beschreibung"></td>
        <td><input type="text" name="modulo" id="modulo" placeholder="Modulo"></td>
        <td> 
          <select name="ability_id">
              <option value="">Fertigkeit</option>
            @foreach($abilities as $ability)
              <option value="{{$ability->id}}">{{$ability->name}}</option>
            @endforeach
          </select>
        </td>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <button type="submit" class="savechanges">Änderungen speichern</button>
          </td>
      </tr>
      </tr>
  </form>
</table>

@endsection​