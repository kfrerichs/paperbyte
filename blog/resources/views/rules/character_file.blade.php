@extends('layouts.main')

@section('content')

@include('inc.ruleBar')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Charakterbogen</h1>
                    <div>
                        <p>
                            Hier kann man den Charakterbogen herunterladen
                        </p>
                        <!-- <a href='../pdf/Charakterbogen.pdf' title='Charakterbogen Download'>Hier könnt ihr den Charakterbogen herunterladen</a> -->
                        <object data="../pdf/Charakterbogen.pdf" type="application/pdf" style="width:100%; height:800px;">
                            <a href="../pdf/Charakterbogen.pdf">PDF laden</a>
                        </object>
                    </div>
            </div>
        </div>
    </div> 
</div>

@endsection