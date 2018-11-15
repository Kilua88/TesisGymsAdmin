@extends('home')

@section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 align="center"> Instructor </h2>
                </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('instructores.index') }}">
                    Volver </a>
            </div>
            </div>
        </div>
        <br><br><br>
        <div class="container">

            <div class="row">
            
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>DNI:</strong>
                        {{ $instructor->persona->pers_dni}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $instructor->persona->pers_nombre}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Apellido:</strong>
                        {{ $instructor->persona->pers_apellido}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Direccion:</strong>
                        {{ $instructor->persona->pers_direccion}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Telefono:</strong>
                        {{ $instructor->persona->pers_telefono}}
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $instructor->persona->pers_email}}
                    </div>
            </div>
        </div>
           
        </div>
@endsection
   