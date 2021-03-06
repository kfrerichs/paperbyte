@extends('layouts.loginRegisterGroup')

@section('content')

    <div class="container">
        <div>
            <p>Wenn du eine Gruppe erstellst bist du ihr Meister</p>
        </div>

        <form method="POST" action="{{url('creategroup/new')}}">
            @csrf
            <div class="form-group row">
                <!-- Enter name of the group-->
                <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif                                              
                </div>
                <!-- submit of create group-->
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Erstellen
                        </button>
                    </div> 
                </div>
            </div>
        </form>
    </div>
@endsection
