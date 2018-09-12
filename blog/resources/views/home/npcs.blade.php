@extends('layouts.main')

@section('content')
<style>
    h4{
        margin-top: 30px;
    }
    table{
        border: 1px solid #4d3328;
        font-family: 'EagleLake', Helvetica, sans-serif;
        font-size: 14px;
        /* width: 100%; */
    }
    table td, table th{
        padding: 8px;
    }
</style>
@include('inc.homeBar')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <h1>NPCS</h1>
                    @foreach($npcs as $npc)
                    <div>
                        <table>
                            <h4>{{$npc->name}}</h4>
                            <tr>
                                <td>Name:</td>
                                <td>{{$npc->name}}</td>
                            </tr>
                            <tr>
                                <td>Geschlecht:</td>
                                <td>{{$npc->gender}}</td>
                            </tr>
                            <tr>
                                <td>Treffpunkt:</td>
                                @foreach($places as $place)
                                    @if($place->id==$npc->meetingpoint_id)    
                                        <td>{{$place->name}}</td>
                                    @endif 
                                @endforeach
                            </tr>
                            <tr>
                                <td>Hintergrund</td>
                                <td>{{$npc->background}}</td>
                            </tr> 
                        </table>
                    </div>
                    @endforeach
            </div>
        </div>
    </div> 
</div>

@endsection