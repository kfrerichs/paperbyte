@extends('layouts.main')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Passwort ändern</div>
 
                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{ url('/profile/password') }}">
                            {{ csrf_field() }}
                            <!-- enter the current password -->
                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="newNL col-md-4 control-label">Aktuelles Passwort</label>
    
                                <div class="col-md-6">
                                    <input id="current-password" type="password" class="form-control" name="current-password" required>
    
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- enter the new password -->
                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                <label for="new-password" class="newNL col-md-4 control-label">Neues Passwort</label>
    
                                <div class="col-md-6">
                                    <input id="new-password" type="password" class="form-control" name="new-password" required>
    
                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('new-password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- confirm the new password -->
                            <div class="form-group">
                                <label for="new-password-confirm" class="newNL col-md-4 control-label">Neues Passwort bestätigen</label>
    
                                <div class="col-md-6">
                                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                </div>
                            </div>
                            <!-- change password submit -->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Passwort ändern
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
