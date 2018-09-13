@extends('layouts.loginRegisterGroup')

@section('content')
<div class="container">
  <div class="card-body">
    <form method="post" action="{{url('/character/name')}}" class="characterformular">
      <div class="col-md-8 offset-md-2">
        @csrf
        <div class="charContainer">
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
          <div>
            <button type="submit" class="btn btn-primary charSave">Änderungen speichern</button>
          </div>
        </div>
      </div>
    </form>

  </div>
</div>
@endsection​