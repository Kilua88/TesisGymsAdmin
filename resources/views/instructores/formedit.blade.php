
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>DNI:</strong>
            {!! Form::number('pers_dni', $instructor->persona->pers_dni, array('placeholder' => 'DNI','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Nombre:</strong>
            {!! Form::text('pers_nombre', $instructor->persona->pers_nombre, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Apellido:</strong>
            {!! Form::text('pers_apellido', $instructor->persona->pers_apellido, array('placeholder' => 'Apellido','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Direccion:</strong>
            {!! Form::text('pers_direccion', $instructor->persona->pers_direccion, array('placeholder' => 'Direccion','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Telefono:</strong>
            {!! Form::number('pers_telefono', $instructor->persona->pers_telefono, array('placeholder' => 'Telefono','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Email:</strong>
            {!! Form::email('pers_email', $instructor->persona->pers_email, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        
        
        

       
        <div class="form-group row">

</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
</div>