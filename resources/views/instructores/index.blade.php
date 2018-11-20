

@extends('home')
@section('content')
<div class="row">

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 align="center"> Instructores </h2>
        </div>
        <div class="pull-right">
            <a class="btn  btn-success" href ="{{ route('instructores.create') }}"> Nuevo </a>
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
        <th class="bg-primary   text-white">Nombre</th>
        <th class="bg-primary   text-white">Apellido</th>
        <th class="bg-primary   text-white">DNI</th>

        <th class="bg-primary   text-white" width="280px">Acciones</th>
    </tr>
    @foreach ($instructores as $instructor)
        <tr>
            <td>{{ $instructor->persona->pers_nombre}}</td>
            <td>{{ $instructor->persona->pers_apellido}}</td>
            <td>{{ $instructor->persona->pers_dni}}</td>



            <td>
                <a class="btn btn-info btn-sm" href="{{ route('instructores.show',$instructor->id)}}">Ver</a>
                <a class="btn btn-primary btn-sm" href="{{ route('instructores.edit',$instructor->id) }}">Editar</a>
                {!! Form::open(['method' => 'DELETE','route' => ['instructores.destroy',$instructor->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}

            </td>
        </tr>
    @endforeach
</table>
@endsection
  