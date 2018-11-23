@extends('home')

@section('content')
        <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h2 align="center"> Ver Membresia o Plan</h2>
        </div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('actividades.index') }}">
        Volver </a>
        </div>
        </div>
        </div>
        <br>
            <div class="column-left">
            
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $actividad->act_nombre}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Moneda:</strong>
                        {{ $moneda->tipo_moneda}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Cuota:</strong>
                        {{ $actividad->act_cuota}}
                    </div>
                </div>
           
        </div>

        <div class="fluid">
                 <a href="../{{$actividad->act_url}}"  >
                    <img src="../{{$actividad->act_url}}"  higth= "400px" width="400px" class="rounded mx-auto d-block">
                </a>
                </div>
@endsection
   