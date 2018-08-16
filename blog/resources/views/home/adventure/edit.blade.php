@extends('layouts.main')

@section('content')
    <h1>Bearbeiten</h1>
    {!! Form::open(['action' => ['AdventureController@update', $adventure->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Titel')}}
            {{Form::text('title', $adventure->title, ['class' => 'form-control', 'placeholder' => 'Titel'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Was wird geschehen?')}}
            {{Form::textarea('body', $adventure->body, ['id' => 'message-area', 'class' => 'form-control ckeditor', 'placeholder' => 'Was wird geschehen?'])}}
        </div>

        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Speichern', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

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