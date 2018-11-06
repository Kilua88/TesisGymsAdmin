

@extends('home')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>CRUD Clientes</h2>
</div>
<div class="pull-right">
<a class="btn  btn-success" href ="{{ route('clientes.create') }}"> Nuevo </a>
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
<th>Apellido</th>
<th>Direccion</th>
<th>Telefono</th>
<th>Edad</th>

<th width="280px">Acciones</th>
</tr>
@foreach ($clientes as $cliente)
<tr>
<td>{{ $cliente->id }}</td>
<td>{{ $cliente->persona->pers_nombre}}</td>
<td>{{ $cliente->persona->pers_apellido}}</td>
<td>{{ $cliente->persona->pers_direccion}}</td>
<td>{{ $cliente->persona->pers_telefono}}</td>
<td>{{ $cliente->cli_edad}}</td>


<td>
<a class="btn btn-info btn-sm" href="{{ route('clientes.show',$cliente->id)}}">Show</a>
<a class="btn btn-primary btn-sm" href="{{ route('clientes.edit',$cliente->id) }}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['clientes.destroy',$cliente->id],'style'=>'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}

</td>
</tr>
@endforeach
</table>
@endsection
  