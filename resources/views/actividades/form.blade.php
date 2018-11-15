
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Nombre:</strong>
            {!! Form::text('act_nombre', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
       
        <div class="form-group ">
            <label class="col-sm-2 col-form-label">Moneda  </label>
            <div class="col-sm-10">
            
                <select id="moneda" name='moneda' class="form-control" style="text-align:rigth;">
                    @foreach($monedas as $moneda)
                        <option value="{{$moneda->id}}">{{$moneda->tipo_moneda}} </option>
                    @endforeach
                </select>
            </div>
        </div>

       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cuota:</strong>
                {!! Form::number('act_cuota', null, array('placeholder' => 'Cuota','class'=> 'form-control')) !!}
            </div>
        </div>
        <div class="form-group row">

</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
</div>