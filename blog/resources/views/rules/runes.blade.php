@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Runentabelle</h1>
                    <div>
                        <p>
                            Hier kann man die Runentabelle herunterladen
                        </p>
                        <!-- <a href='../pdf/Runenzauber.pdf' title='Runenzauber Download'>Hier könnt ihr die Runenzauber herunterladen</a> -->
                        <object data="../pdf/Runenzauber.pdf" type="application/pdf" style="width:100%; height:800px;">
                            <a href="../pdf/Runenzauber.pdf">PDF laden</a>
                        </object>
                    </div>
            </div>
        </div>
    </div> 
</div>

@endsection