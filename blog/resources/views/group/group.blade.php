@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Gruppe</h1>
                @foreach($members as $member)
                    @php
                        $charactername = $member->charactername;
                    @endphp
                    @foreach($allCharacters as $character)
                        @if($charactername == $character->name)
                        <div>{{$character->name}}</div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div> 
</div>

@endsection