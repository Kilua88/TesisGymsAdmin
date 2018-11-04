

@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>CRUD Pacientes</h2>
</div>
<div class="pull-right">
<a class="btn  btn-success" href ="{{ route('gimnasios.create') }}"> Nuevo </a>
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
<th>Email</th>

<th width="280px">Acciones</th>
</tr>
@foreach ($gimnasios as $gimnasio)
<tr>
<td>{{ $gimnasio->id }}</td>
<td>{{ $gimnasio->name}}</td>
<td>{{ $gimnasio->email}}</td>


<td>
<a class="btn btn-info btn-sm" href="{{ route('gimnasios.show',$gimnasio->id)}}">Show</a>
<a class="btn btn-primary btn-sm" href="{{ route('gimnasios.edit',$gimnasio->id) }}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['gimnasios.destroy',$gimnasio->id],'style'=>'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}

</td>
</tr>
@endforeach
</table>
@endsection
  