@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <!--div class="panel-heading">Dashboard</div-->
                <h1>Abenteuer</h1>
                    {!! Form::open(['action' => 'AdventureController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Titel')}}
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titel'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('body', 'Was wird geschehen?')}}
                            {{Form::textarea('body', '', ['id' => 'message-area', 'class' => 'form-control ckeditor', 'placeholder' => 'Was wird geschehen?'])}}
                        </div>
                        {{Form::submit('Speichern', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}

                <div class="panel-body">
                    <br/><br/>
                    <h3>Abenteuerleitfaden</h3>
                    <br/><br/>
                    @if(count($adventures) > 0)
                        @foreach($adventures as $adventure)
                            <div class="well">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <h4>{{$adventure->title}}</h4>
                                        <p>{!!$adventure->body!!}</p>         
                                        <small>Von {{$adventure->user->name}} <!--am {{$adventure->created_at}}--></small>
                                        <br/><br/>
                                    </div>

                                    @if(!Auth::guest())
                                        @if(Auth::user()->id == $adventure->user_id)
                                            <a href="adventure/{{$adventure->id}}/edit" class="btn btn-default">Bearbeiten</a>
                                            {!!Form::open(['action' => ['AdventureController@destroy', $adventure->id], 'method' => 'POST', 'onsubmit' => 'return ConfirmDelete()', 'class' => 'pull-right delete'])!!}
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
                        <p>Es sind noch keine Abenteuer vorhanden.</p>
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