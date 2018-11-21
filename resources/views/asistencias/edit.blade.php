@extends('home')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2 align="center">Editar Membresia o Plan</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('actividades.index') }}">
Volver</a>
</div>
</div>
</div>
<br>
@if (count($errors) > 0)
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your
input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
{!! Form::model($actividad,['method'=> 'PATCH','route'=>['actividades.update', $actividad->id]]) !!}
@include('actividades.form')
{!! Form::close() !!}


@endsection
