@extends('layouts.main')

@section('content')
<style>
    h4{
        margin-top: 30px;
    }
    table{
        font-family: 'EagleLake', Helvetica, sans-serif;
        font-size: 14px;
        color: #4d3328;
        width: 100%;
    }
    #imgCell{
        width: 35%;
    }
    #imgCell img{
        width: 100%;
        height: auto;
    }
    #scriptCell{
        padding-left: 20px;
    }
</style>
@include('inc.homeBar')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Orte</h1>
                @foreach($places as $place)
                    <div>
                        <table>
                            <h4>{{$place->name}}</h4>
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