@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Gruppe</h1>
                @foreach($roles as $role)
                    <div>
                        <table>
                            <h4>{{$role->name}}</h4>
                            <!-- <tr>
                                <td>Spieler:</td>
                                <td>{{$group->username}}</td>
                            </tr>
                            <tr>
                                <td>Geschlecht:</td>
                                <td>{{$group->gender}}</td>
                            </tr>
                            <tr>
                                <td>Treffpunkt:</td>
                                <td>{{$group->meetingpoint_id}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>{{$group->background}}</td>
                            </tr>  -->
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div> 
</div>

@endsection