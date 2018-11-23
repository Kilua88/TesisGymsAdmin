@extends('home')

@section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 align="center"> Cuota </h2>
                </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cuotas.index') }}">
                    Volver a las Cuotas </a>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clientes.show',$cliente->id) }}">
                    Volver al Cliente </a>
            </div>
            </div>
        </div>
        <br><br><br>
        <div class="container">

            <div class="row">
            
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Id:</strong>
                        {{ $cuotadetalle->id}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $cliente->persona->pers_nombre}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Apellido:</strong>
                        {{ $cliente->persona->pers_apellido}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Fecha:</strong>
                        {{ $cuotadetalle->det_cuota_inicio }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Actividad:</strong>
                        {{ $actividade->act_nombre}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Moneda:</strong>
                        {{ $cuotadetalle->moneda}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Valor:</strong>
                        {{ $cuotadetalle->valor}}
                    </div>
                </div>
        </div>
           
        </div>
@endsection
   