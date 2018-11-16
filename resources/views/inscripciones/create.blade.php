@extends('home')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 align="center"> Nueva Inscripcion</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('clientes.index') }}">Volver</a>
        </div>
    </div>
</div>
<br><br>
@if (count($errors) < 0)
    <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
    
@endif

{!! Form::open( ['method' => 'POST', 'route' => ['inscripciones.store']]) !!}
            @include('inscripciones.form')
{!! Form::close() !!}
            @endsection


