@extends('layouts.main')

@section('content')

@include('inc.homeBar')
    
    <a href="/protocol" class="btn btn-default">Go Back</a>
    <h1>{{$protocol->title}}</h1>
    <br><br>
    <div>
        {!!$protocol->body!!}
    </div>
    <hr>
    <small>Written on {{$protocol->created_at}} by {{$protocol->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $protocol->user_id)
            <a href="/protocol/{{$protocol->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['ProtocolController@destroy', $protocol->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Löschen', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection