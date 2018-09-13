@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Gruppe</h1>
                @if(count($members) > 1)
                    @foreach($members as $member)
                        @php
                            $charactername = $member->charactername;
                        @endphp
                        @foreach($allCharacters as $allCharacter)
                            @if($charactername == $allCharacter->name && $charactername != $character->name)
                            <a href="{{ url('group/detail/'.$allCharacter->id) }}">
                                <div class="group-box borderline">
                                    <span>{{$allCharacter->name}}</span>
                                </div>
                            </a>
                            @endif
                        @endforeach
                    @endforeach
                @else
                    <p>Die Gruppe hat noch keine Mitglieder.</p>
                @endif
            </div>
        </div>
    </div> 
</div>

@endsection