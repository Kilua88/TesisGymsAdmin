@extends('home')

@section('content')
        <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h2 align="center"> Ver Actividad</h2>
        </div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('actividades.index') }}">
        Volver </a>
        </div>
        </div>
        </div>
        <br>
            <div class="row">
            
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $actividad->act_nombre}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Moneda:</strong>
                        {{ $actividad->act_moneda}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Cuota:</strong>
                        {{ $actividad->act_cuota}}
                    </div>
                </div>
           
        </div>
@endsection
   