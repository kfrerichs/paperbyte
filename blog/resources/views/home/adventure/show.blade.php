@extends('layouts.main')

@section('content')

@include('inc.homeBar')

    <a href="/adventure" class="btn btn-default">Go Back</a>
    <h1>{{$adventure->title}}</h1>
    <br><br>
    <div>
        {!!$adventure->body!!}
    </div>
    <hr>
    <small>Written on {{$adventure->created_at}} by {{$adventure->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $adventure->user_id)
            <a href="/adventure/{{$adventure->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['AdventureController@destroy', $adventure->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Löschen', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection