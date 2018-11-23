@extends('home')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2 align="center">Editar Instructor</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('imagenes.index') }}">
Volver</a>
</div>
</div>
</div>
<br><br>
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
{!! Form::model($imagene,['method'=> 'PATCH', 'files' => true,'route'=>['imagenes.update', $imagene->id]]) !!}
@include('imagenes.form')
{!! Form::close() !!}


@endsection
