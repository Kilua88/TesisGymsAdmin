

@extends('home')
@section('content')
<div class="row">

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca">

<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2 align="center">Clientes</h2>
</div>
<div class="pull-right">
<a class="btn  btn-success" href ="{{ route('clientes.create') }}"> Nuevo </a>
</div>
</div>
</div>
<br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table id="myTable" class="table table-bordered">
<tr>
<th>Nro</th>
<th>DNI</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Direccion</th>
<th>Telefono</th>
<th>Email</th>
<th>Contacto Nombre</th>
<th>Contacto Apellido</th>
<th>Contacto Telefono</th>
<th>Status</th>

<th width="280px">Acciones</th>
</tr>
@foreach ($clientes as $cliente)
<tr>
<td>{{ $cliente->id }}</td>
<td>{{ $cliente->persona->pers_dni}}</td>
<td>{{ $cliente->persona->pers_nombre}}</td>
<td>{{ $cliente->persona->pers_apellido}}</td>
<td>{{ $cliente->persona->pers_direccion}}</td>
<td>{{ $cliente->persona->pers_telefono}}</td>
<td>{{ $cliente->persona->pers_email}}</td>
<td>{{ $cliente->cli_contact_nombre}}</td>
<td>{{ $cliente->cli_contact_apellido}}</td>
<td>{{ $cliente->cli_contact_telefono}}</td>
<td> @if($cliente->cli_activo)
            <a class="btn-sm  btn-success" disabled="disabled" >ACTIVO</a>
     @else
            <a class="btn-sm btn-danger" disabled="disabled">INACTIVO</a>
    @endif 
</td>

<td>
<a class="btn btn-info btn-sm" href="{{ route('clientes.show',$cliente->id)}}">Ver</a>
<a class="btn btn-primary btn-sm" href="{{ route('clientes.edit',$cliente->id) }}">Editar</a>
{!! Form::open(['method' => 'DELETE','route' => ['clientes.destroy',$cliente->id],'style'=>'display:inline']) !!}
{!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}

</td>
</tr>
@endforeach
</table>
@endsection
  