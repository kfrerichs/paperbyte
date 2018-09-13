@extends('layouts.main')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Accountnamen ändern</div>
 
                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{ url('/profile/name') }}">
                            {{ csrf_field() }}
                            <!-- enter the password -->
                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="col-md-4 control-label">Passwort</label>
    
                                <div class="col-md-6">
                                    <input id="current-password" type="password" class="form-control" name="current-password" required>
    
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- enter the new accountname -->
                            <div class="noForm form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                                <label for="new-name" class="newNL col-md-4 control-label">Neuer Accountname</label>
    
                                <div class="col-md-6">
                                    <input id="new-name" type="text" class="form-control" name="new-name" required>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- accountname change submit -->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Name ändern
                                    </button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
