<br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Nombre de Usuario:</strong>
            {!! Form::text('users->name', $gimnasio->users->name, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
        
        

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Nombre del Gimnasio:</strong>
            {!! Form::text('gym_nombre', $gimnasio->gym_nombre , array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Direccion del Gimnasio:</strong>
            {!! Form::text('gym_direccion',  $gimnasio->gym_direccion , array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Telefono del Gimnasio:</strong>
            {!! Form::text('gym_telefono', $gimnasio->gym_telefono , array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>URL del Gimnasio:</strong>
            <a>http://</a>
            {!! Form::text('gym_url', $gimnasio->gym_url , array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            <a>.misitio.com</a>
            </div>
        </div>



        <div class="form-group row">

    </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
</div>