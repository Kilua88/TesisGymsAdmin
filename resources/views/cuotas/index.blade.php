

@extends('home')
@section('content')
<div class="row">

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca">

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 align="center"> Cuotas  </h2>
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
        <th>Cuota Pagada</th>
        <th>Actividad Pagada </th>
        <th>Moneda</th>
        <th>Valor</th>
        <th>Cliente Nombre</th>
        <th>Cliente Apellido</th>

        <th width="280px">Acciones</th>
    </tr>
    @foreach ( $cuotadetalles as $cuotadetalle )
        <tr>
            <td>{{ $cuotadetalle->det_cuota_inicio }}</td>
            
            @foreach ( $actividades as $actividade )
                @if( $actividade->id == $cuotadetalle->act_id )
                    <td>{{ $actividade->act_nombre }}</td>
                @endif
            @endforeach

            <td>{{ $cuotadetalle->moneda}}</td>
            <td>{{ $cuotadetalle->valor}}</td>
            
            @foreach ( $clientes as $cliente )
                @if($cliente->id == $cuotadetalle->cli_id)
                    <td>{{ $cliente->persona->pers_nombre }}</td>
                    <td>{{ $cliente->persona->pers_apellido }}</td>
                @endif
            @endforeach

            <td>
                <a class="btn btn-info btn-sm" href="{{ route('cuotas.show',$cuotadetalle->id)}}">Ver</a>
                {!! Form::open(['method' => 'DELETE','route' => ['cuotas.destroy',$cuotadetalle->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}

            </td>
        </tr>
    @endforeach
</table>
@endsection
  