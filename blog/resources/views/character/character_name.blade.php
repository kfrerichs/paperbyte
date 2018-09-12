@extends('layouts.loginRegisterGroup')

@section('content')
<form method="post" action="{{url('/character/name')}}" class="characterformular">
  @csrf
  <div class="characterformular-top">
    <div class="input-row">
      <label for="name">Charakter Name</label>
      <input type="text" name="name" id="name" value="{{old('name')?old('name'):''}}">
      @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>
  </div>
  <button type="submit" class="savechanges">Änderungen speichern</button>
</form>

@endsection​