@extends('layouts.loginRegisterGroup')

@section('content')
<form method="post" action="{{url('/character/name')}}" class="characterformular">
  @csrf
  <div class="characterformular-top">
    <div class="input-row">
      <label for="name">Charakter Name</label>
      <input type="text" name="name" id="name" value="{{old('name')?old('name'):''}}">
    </div>
  </div>
  <button type="submit" class="savechanges">Änderungen speichern</button>
</form>

@endsection​