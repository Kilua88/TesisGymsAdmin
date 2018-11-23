

<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Nombre:</strong>
            {!! Form::text('act_nombre', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
            </div>
        </div>
       
        <div class="form-group ">
            <label class="col-sm-2 col-form-label">Moneda  </label>
            <div class="col-sm-12">
            
                <select id="moneda" name='moneda' class="form-control" style="text-align:rigth;">
                        <option selected="true" disabled="disabled">Seleccione una moneda</option>
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
        <form method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>
            </div>
          </form>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
</div>