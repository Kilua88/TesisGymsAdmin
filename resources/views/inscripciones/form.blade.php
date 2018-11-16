

<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <label value="{{$cliente->persona->pers_nombre}}">{{$cliente->persona->pers_nombre}}</label>
           </div>
        </div>
       

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido:</strong>
                <label value="{{$cliente->persona->pers_nombre}}">{{$cliente->persona->pers_apellido}}</label>
           </div>
        </div>

        <div class="form-group ">
            <label class="col-sm-2 col-form-label">Actividad  </label>
            <div class="col-sm-12">
            
                <select id="actividad" name='actividad' class="form-control" style="text-align:rigth;">
                        <option selected="true" disabled="disabled">Seleccione una actividad</option>
                    @foreach($actividades as $actividade)
                        <option value="{{$actividade->id}}">{{$actividade->act_nombre}} </option>
                    @endforeach
                </select>
            </div>
        </div>

       

</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
</div>