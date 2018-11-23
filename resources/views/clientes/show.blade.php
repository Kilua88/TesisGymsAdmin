@extends('home')

@section('content')
        <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h2 align="center"> Cliente</h2>
        </div>
        <div class="pull-right" >
        <a class="btn btn-primary" href="{{ route('clientes.index') }}">
        Volver </a>
        </div>
        </div>
        </div>
        <br>
            <div class="col" >
            
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>NRO:</strong>
                        {{ $cliente->id}}
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>DNI:</strong>
                        {{ $cliente->persona->pers_dni}}
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $cliente->persona->pers_nombre}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Apellido:</strong>
                        {{ $cliente->persona->pers_apellido}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Direccion:</strong>
                        {{ $cliente->persona->pers_direccion}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Telefono:</strong>
                        {{ $cliente->persona->pers_telefono}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Email:</strong>
                        {{ $cliente->persona->pers_email}}
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contacto Nombre:</strong>
                        {{ $cliente->cli_contact_nombre}}
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contacto Apellido:</strong>
                        {{ $cliente->cli_contact_apellido}}
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contacto Telefono:</strong>
                        {{ $cliente->cli_contact_telefono}}
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        @if($cliente->cli_activo == 'activo')
                            <a class="btn-sm  btn-success" disabled="disabled" >ACTIVO</a>
                        @elseif($cliente->cli_activo == 'inactivo')
                            <a class="btn-sm btn-danger" disabled="disabled">INACTIVO</a>
                        @else
                            <a class="btn-sm btn-warning" disabled="disabled">ACTIVO</a>   
                        @endif    
                    </div>
            </div>

           </div>
           
           

        <div class="col">
                 <a href="../{{$cliente->persona->pers_url}}"  >
                    <img src="../{{$cliente->persona->pers_url}}"  higth= "400px" width="400px" class="rounded mx-auto d-block">
                </a>
                </div>
                <div class="float-xl-left"  >
        <a class="btn-lg btn-primary" href="{{ route('inscripciones.create') }}">
        Inscribir </a>
        <input type="hidden" name="id_clientes" value="{{$cliente->id}}">

        </div>
           
             <div class="float-xl-right" >
        <a class="btn-lg btn-success" href="{{ route('asist') }}">
        Cargar Asistencia </a>

      
        </div>
<br><br>
        <div class="container">
             

        <div class="row">

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca">
        <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        
        <h2 align="center"> Inscripto</h2>
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
        <th class="bg-primary   text-white">Actividad </th>
        <th class="bg-primary   text-white">Finaliza</th>
        <th class="bg-primary   text-white">Estado</th>

        <th class="bg-primary   text-white" width="280px">Acciones</th>
        </tr>
        
        @foreach ($inscripciones as $inscripcion)
        <tr>
                @foreach ($actividades as $actividad)
                    @if ($actividad->id == $inscripcion->act_id)
                        <td>{{ $actividad->act_nombre}}</td>
                    @endif
                @endforeach
                <td>{{ $inscripcion->insc_finaliza}}</td>

                <td>
                 @if($inscripcion->insc_estado)
                            <a class="btn-sm  btn-success" disabled="disabled" >ACTIVO</a>
                        @else
                            <a class="btn-sm btn-danger" disabled="disabled">INACTIVO</a>
                @endif  
                </td>
        <td>
        {!! Form::open(['method' => 'DELETE','route' => ['inscripciones.destroy',$inscripcion->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
        {!! Form::close() !!}

        </td>
        </tr>
        @endforeach
        </table>


                </div>
@endsection
   