

@extends('home')
@section('content')
<div class="row">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar">

<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2  align="center" > Control de Asistencia </h2>
</div>

</div>
</div>
<br>

{!! $asistencias->links() !!}
<br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning">
<p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('alert'))
<div class="alert alert-danger">
<p>{{ $message }}</p>
</div>
@endif
<table id="myTable" class="table table-bordered">
<tr>
<th class="bg-primary   text-white"> Fecha y Hora</th>
<th class="bg-primary   text-white"> Nombre del Cliente</th>
<th class="bg-primary   text-white"> Apellido del Cliente </th>

<th class="bg-primary   text-white" width="280px">Acciones</th>
</tr>
@foreach ($asistencias as $asistencia)
<tr>
<td>{{ $asistencia->asis_fecha}}</td>
        @foreach ($clientes as $cliente)
            @if($cliente->id == $asistencia->cli_id)
                <td>{{ $cliente->persona->pers_nombre}}</td>
                <td>{{ $cliente->persona->pers_apellido}}</td>
            @endif
        @endforeach

<td>
{!! Form::open(['method' => 'DELETE','route' => ['asistencias.destroy',$asistencia->id],'style'=>'display:inline']) !!}
{!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}

</td>
</tr>
@endforeach
</table>
@endsection
  