

@extends('home')
@section('content')
<div class="row">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2 align="center"> Membresias o Planes </h2>
</div>
<div class="pull-right">
<a class="btn  btn-success" href ="{{ route('actividades.create') }}"> Nuevo </a>
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
<th>Nombre</th>
<th>Moneda</th>
<th>Cuota</th>

<th width="280px">Acciones</th>
</tr>
@foreach ($actividades as $actividad)
<tr>
<td>{{ $actividad->act_nombre}}</td>
        @foreach ($monedas as $moneda)
            @if($moneda->id == $actividad->monedas_id)
                <td>{{ $moneda->tipo_moneda}}</td>
            @endif
        @endforeach
<td>{{ $actividad->act_cuota}}</td>

<td>
<a class="btn btn-info btn-sm" href="{{ route('actividades.show',$actividad->id)}}">Ver</a>
<a class="btn btn-primary btn-sm" href="{{ route('actividades.edit',$actividad->id) }}">Editar</a>
{!! Form::open(['method' => 'DELETE','route' => ['actividades.destroy',$actividad->id],'style'=>'display:inline']) !!}
{!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}

</td>
</tr>
@endforeach
</table>

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
@endsection
  