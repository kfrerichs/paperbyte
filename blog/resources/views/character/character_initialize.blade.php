@extends('layouts.main')

@section('content')
<style>
  .newChar{
    width: 300px;
    margin:auto;
  }

</style>
<div class="newChar">
    <form method="post" action="{{url('/character/new')}}">
      <div class="input-row">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
      </div>
    </form>
  <button type="submit" class="savechanges">Änderungen speichern</button>
</div>
     
@endsection​