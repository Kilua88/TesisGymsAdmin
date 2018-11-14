
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Titulo:</strong>
            {!! Form::text('titulos', $imagene->titulos, array('placeholder' => 'DNI','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Descripcion:</strong>
            {!! Form::text('descripcion', $imagene->descripcion, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>  

            
        
        

       
        <div class="form-group row">

</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
</div>