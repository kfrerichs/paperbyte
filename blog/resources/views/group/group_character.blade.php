@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                
                @foreach($members as $member)
                    @php
                        $charactername = $member->charactername;
                    @endphp
                    
                        @if($charactername == $character->name)
                        <h1>{{ $character->name }}</h1>
                        <a href="">
                            <div class="box">
                                <span>{{$character->name}}</span>
                                <!-- <span>{{$character->gender}}</span>
                                <span>{{$character->hair}}</span>
                                <span>{{$character->eyes}}</span> -->
                            </div>
                        </a>
                        @endif
                    
                @endforeach
            </div>
        </div>
    </div> 
</div>

@endsection