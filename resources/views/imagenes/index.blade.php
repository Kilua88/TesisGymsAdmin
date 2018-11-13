

@extends('home')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 align="center"> Mis Imagenes </h2>
        </div>
        <div class="pull-right">
           @include('new')
             </div>
    </div>
</div>
<br>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <tr>
        <th>URL</th>
        <th>Titulo</th>
        <th>Descripcion</th>
        <th>imagen</th>

        <th width="280px">Acciones</th>
    </tr>
    @foreach ($imagenes as $imagene)
        <tr>
            <td>{{  $imagene->url}}</td>
            <td>{{  $imagene->titulos}}</td>
            <td>{{  $imagene->descripcion}}</td>
            <td> <div class="col-sm-6 col-md-3">
                 <a href="#" class="thumbnail">
                    <img src="{{$imagene->url}}" alt="..." width="100px" height="100px">
                </a>
                </div></td>



            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('imagenes.edit',$imagene->id) }}">Editar</a>
                {!! Form::open(['method' => 'DELETE','route' => ['imagenes.destroy',$imagene->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}

            </td>
        </tr>
    @endforeach
</table>
@endsection
  