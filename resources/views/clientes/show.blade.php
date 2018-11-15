@extends('home')

@section('content')
        <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h2 align="center"> Cliente</h2>
        </div>
        <div class="pull-right" >
        <a class="btn btn-primary" href="{{ route('clientes.index') }}">
        Volver </a>
        </div>
        </div>
        </div>
        <br>
            <div class="row" >
            
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>NRO:</strong>
                        {{ $cliente->id}}
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>DNI:</strong>
                        {{ $cliente->persona->pers_dni}}
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
                        {{ $cliente->persona->pers_email}}
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contacto Nombre:</strong>
                        {{ $cliente->cli_contact_nombre}}
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contacto Apellido:</strong>
                        {{ $cliente->cli_contact_apellido}}
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contacto Telefono:</strong>
                        {{ $cliente->cli_contact_telefono}}
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        @if($cliente->cli_activo)
                            <a class="btn-sm  btn-success" disabled="disabled" >ACTIVO</a>
                        @else
                        <a class="btn-sm btn-danger" disabled="disabled" >INACTIVO</a>
                        @endif    
                    </div>
            </div>

             <div class="pull-right" >
        <a class="btn btn-primary" href="cuotas">
        Pagar Cuota </a>
        </div>


           
        </div>
@endsection
   