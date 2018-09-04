@extends('layouts.main')

@section('content')
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
                                <td>{{$npc->meetingpoint_id}}</td>
                            </tr>
                            <tr>
                                <td></td>
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