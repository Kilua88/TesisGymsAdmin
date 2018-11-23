

@extends('home')
@section('content')
<div class="row">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar">

<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2  align="center" > Actividades o Planes </h2>
</div>
<div class="pull-right">
<a class="btn  btn-success" href ="{{ route('actividades.create') }}"> Nuevo </a>
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
<th class="bg-primary   text-white">Nombre</th>
<th class="bg-primary   text-white"> Moneda</th>
<th class="bg-primary   text-white">Cuota</th>
<th class="bg-primary   text-white"> Imagen</th>

<th class="bg-primary   text-white" width="280px">Acciones</th>
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
        <td> <div class="col-sm-6 col-md-3">
                 <a href="{{$actividad->act_url}}" class="img-fluid img-thumbnail">
                    <img src="{{$actividad->act_url}}" onerror="this.src='URL_de_imagen_alternativa.jpg';" width="100px" height="100px">
                </a>
                </div>
            </td>


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
@endsection
  