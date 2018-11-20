

@extends('home')
@section('content')
<div class="row">

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2 align="center"> Gimnasios</h2>
</div>
<div class="pull-right">
<a class="btn  btn-success" href ="{{ route('gimnasios.create') }}"> Nuevo </a>
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
<th>Nombre</th>
<th>Email</th>

<th class="bg-primary   text-white" width="280px">Acciones</th>
</tr>
@foreach ($gimnasios as $gimnasio)
<tr>
<th class="bg-primary   text-white">{{ $gimnasio->id }}</td>
<th class="bg-primary   text-white">{{ $gimnasio->name}}</td>
<th class="bg-primary   text-white">{{ $gimnasio->email}}</td>


<td>
<a class="btn btn-info btn-sm" href="{{ route('gimnasios.show',$gimnasio->id)}}">Ver</a>
<a class="btn btn-primary btn-sm" href="{{ route('gimnasios.edit',$gimnasio->id) }}">Editar</a>
{!! Form::open(['method' => 'DELETE','route' => ['gimnasios.destroy',$gimnasio->id],'style'=>'display:inline']) !!}
{!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}

</td>
</tr>
@endforeach
</table>
@endsection
  