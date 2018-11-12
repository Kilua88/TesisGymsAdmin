
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Nombre:</strong>
            {!! Form::text('act_nombre', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
       
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Moneda:</strong>
                {!! Form::text('act_moneda', "Pesos $", array('placeholder' => 'Moneda','class'=> 'form-control')) !!}
            </div>
        </div>

       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cuota:</strong>
                {!! Form::number('act_cuota', "Pesos $", array('placeholder' => 'Cuota','class'=> 'form-control')) !!}
            </div>
        </div>
        <div class="form-group row">

</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</div>