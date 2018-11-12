@extends('home')

@section('content')
        <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h2 align="center">  Gimnasio</h2>
        </div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('gimnasios.index') }}">
        Volver </a>
        </div>
        </div>
        </div>
        <br>
            <div class="row">
            
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $gimnasio->name}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $gimnasio->email}}
                    </div>
            </div>
           
        </div>
@endsection
   