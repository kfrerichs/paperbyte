@extends('layouts.main')

@section('content')

@include('inc.homeBar')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <!--div class="panel-heading">Dashboard</div-->
                <h1>Protokoll</h1>
                    {!! Form::open(['action' => 'ProtocolController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Titel')}}
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titel'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('body', 'Was ist bisher geschehen?')}}
                            {{Form::textarea('body', '', ['id' => 'message-area', 'class' => 'form-control ckeditor', 'placeholder' => 'Was ist bisher geschehen?'])}}
                        </div>
                        {{Form::submit('Speichern', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}

                <div class="panel-body">
                    <br/><br/>
                    <h3>Was bisher geschah...</h3>
                    <br/><br/>
                    @if(count($protocols) > 0)
                        @foreach($protocols as $protocol)
                            <div class="well">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <h4>{{$protocol->title}}</h4>
                                        <p>{!!$protocol->body!!}</p>         
                                        <small>Von {{$protocol->user->name}} <!--am {{$protocol->created_at}}--></small>
                                        <br/><br/>
                                    </div>

                                    @if(!Auth::guest())
                                        @if(Auth::user()->id == $protocol->user_id)
                                            <a href="protocol/{{$protocol->id}}/edit" class="btn btn-default">Bearbeiten</a>
                                            {!!Form::open(['action' => ['ProtocolController@destroy', $protocol->id], 'method' => 'POST', 'onsubmit' => 'return ConfirmDelete()', 'class' => 'pull-right delete'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Löschen', ['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        @endif
                                    @endif
                                    <br/><br/><br/><br/>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Es sind noch keine Protokolleinträge vorhanden.</p>
                    @endif

                </div>
            </div>
        </div>
    </div> 
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'message-area')
</script>

<script>                                        // Löschen bestätigen
    function ConfirmDelete()
    {
    var confirmation = confirm("Soll dieser Eintrag wirklich gelöscht werden?");
    if (confirmation)
    return true;
    else
    return false;
    }
</script>

@endsection