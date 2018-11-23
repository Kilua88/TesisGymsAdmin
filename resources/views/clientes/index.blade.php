

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

<br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table id="myTable" class="table table-bordered">
<tr>
<th class="bg-primary   text-white">Nro</th>
<th class="bg-primary   text-white">DNI</th>
<th class="bg-primary   text-white">Nombre</th>
<th class="bg-primary   text-white">Apellido</th>
<th class="bg-primary   text-white">Direccion</th>
<th class="bg-primary   text-white"> Telefono</th>
<th class="bg-primary   text-white">Email</th>
<th class="bg-primary   text-white">Contacto Nombre</th>
<th class="bg-primary   text-white">Contacto Apellido</th>
<th class="bg-primary   text-white">Contacto Telefono</th>
<th class="bg-primary   text-white">Status</th>

<th  class="bg-primary   text-white" width="280px">Acciones</th>
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
<td> @if($cliente->cli_activo == 'activo')
            <a class="btn-sm  btn-success" disabled="disabled" >ACTIVO</a>
       @elseif($cliente->cli_activo == 'inactivo')
            <a class="btn-sm btn-danger" disabled="disabled">INACTIVO</a>
       @else
           <a class="btn-sm btn-warning" disabled="disabled">ACTIVO</a>   
      
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
  