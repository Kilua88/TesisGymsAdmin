

@extends('home')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2 align="center"> Actividades</h2>
</div>
<div class="pull-right">
<a class="btn  btn-success" href ="{{ route('actividades.create') }}"> Nuevo </a>
</div>
</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>Nro</th>
<th>Nombre</th>
<th>Moneda</th>
<th>Cuota</th>

<th width="280px">Acciones</th>
</tr>
@foreach ($actividades as $actividad)
<tr>
<td>{{ $actividad->id }}</td>
<td>{{ $actividad->act_nombre}}</td>
<td>{{ $actividad->act_moneda}}</td>
<td>{{ $actividad->act_cuota}}</td>

<td>
<a class="btn btn-info btn-sm" href="{{ route('actividades.show',$actividad->id)}}">Show</a>
<a class="btn btn-primary btn-sm" href="{{ route('actividades.edit',$actividad->id) }}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['actividades.destroy',$actividad->id],'style'=>'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}

</td>
</tr>
@endforeach
</table>
@endsection
  