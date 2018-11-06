@extends('home')

@section('content')
        <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h2> Show Pacientes</h2>
        </div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('clientes.index') }}">
        Volver </a>
        </div>
        </div>
        </div>
            <div class="row">
            
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Id:</strong>
                        {{ $cliente->id}}
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
                        <strong>Direccion:</strong>
                        {{ $cliente->persona->pers_direccion}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Telefono:</strong>
                        {{ $cliente->persona->pers_telefono}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $cliente->cli_edad}}
                    </div>
            </div>
           
        </div>
@endsection
   