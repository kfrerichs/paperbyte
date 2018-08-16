@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    Group: {{$cookieGroup}}
                    Character: {{$cookieCharacter}}

                    @if(Auth::user()->hasRole('master'))
                        <p>You'r a Master!</p>
                    @endif
                    @if(Auth::user()->hasRole('player'))
                        <p>You'r a player...</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
