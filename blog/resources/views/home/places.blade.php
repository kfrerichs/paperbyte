@extends('layouts.main')

@section('content')

@include('inc.homeBar')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Orte</h1>
                @foreach($places as $place)
                    <div>
                        <table class="placesTable">
                            <h4 class="placesHeader">{{$place->name}}</h4>
                            <tr>
                                <td id="imgCell">
                                    <!-- @php
                                        $img = 'images/' . $place->img_name;
                                    @endphp -->
                                    <img src="{{ asset('images/' . $place->img_name) }}" width="20%">
                                </td>
                                <td id="scriptCell">
                                    {{$place->description}}
                                </td>
                            </tr>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div> 
</div>

@endsection