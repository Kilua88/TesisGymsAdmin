

@extends('home')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2 align="center"> Perfil</h2>
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

<th>Nombre de Usuario</th>
<th>Email</th>
<th>Nombre del Gimnasio</th>
<th>Direccion del Gimnasio</th>
<th>Telefono del Gimnasio</th>
<th>Url Personalizada</th>

<th width="280px">Acciones</th>
</tr>

<tr>
<td>{{ $gimnasio->users->name}}</td>
<td>{{ $gimnasio->users->email}}</td>
<td>{{ $gimnasio->gym_nombre }}</td>
<td>{{ $gimnasio->gym_direccion}}</td>
<td>{{ $gimnasio->gym_telefono}}</td>
<td>http://{{ $gimnasio->gym_url}}.misitio.com</td>



<td>
<a class="btn btn-primary btn-sm" href="{{ route('perfiles.edit',$gimnasio->id) }}">Editar</a>


</td>
</tr>

</table>
@endsection
  