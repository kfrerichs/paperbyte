@extends('layouts.loginRegisterGroup')

@section('content')
    <!-- Bei Submit muss die existenz der Gruppe geprüft und bei dem Spieler eingetragen werden -->

    <div class="container">
        <div>
            <p>Gib den Gruppennamen ein um ihr Beizustreten. Trittst du einer Gruppe bei bist du Spieler</p>
        </div>
        <form method="POST" action="{{url('creategroup/join')}}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif                                                
                </div>
                <div>
                    {{$errorMessageJoin}}
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Beitreten
                        </button>
                    </div>
                </div>
            </div>
            
        </form>

        <a class="btn btn-primary" href="{{ url('creategroup') }}">Gruppe erstellen (Meister werden)</a>
          
        
    </div>
@endsection
