@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
            <input type="button" value="zurück zur Gruppe" url="{{ url('/group') }}"/>
                <h1>{{ $character->name }}</h1>
                <span>{{$character->user}}</span>
                    <div>
                        <span>{{$character->name}}</span>
                        <span>{{$character->gender}}</span>
                        <span>{{$character->hair}}</span>
                        <span>{{$character->eyes}}</span>
                    </div>
            </div>
        </div>
    </div> 
</div>

@endsection