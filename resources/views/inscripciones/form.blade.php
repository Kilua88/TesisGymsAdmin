

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
            
                <select id="actividad" onchange="ShowSelected();" name='actividad' class="form-control" style="text-align:rigth;">
                        <option selected="true" disabled="disabled">Seleccione una actividad</option>
                    @foreach($actividades as $actividade)
                        <option value="{{$actividade->id}}">{{$actividade->act_nombre}} </option>
                    @endforeach
                </select>

                <br><br>

                <label name="lbl" id="lbl"> 
              
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Apellido:</strong>
            {!! Form::text('meses', null, array('placeholder' => 'Meses a Pagar','class' => 'form-control')) !!}
            </div>
        </div>

       

</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
</div>

<script type="text/javascript"> 
function ShowSelected() { 
/* Para obtener el valor */
    var cod = document.getElementById("actividad").value; 
  
     /* Para obtener el texto */
    var combo = document.getElementById("actividad"); 
    var selected = combo.options[combo.selectedIndex].text; 
  

    var actividades = [
        @foreach ($actividades as $actividade)
           
            @foreach ($monedas as $moneda)
              @if($actividade->monedas_id == $moneda->id)
              ["{{$actividade->act_nombre}}","{{$moneda->tipo_moneda}}","{{$actividade->act_cuota}}" ],

              @endif
            @endforeach
                
        @endforeach
    ];
  

    for (i = 0; i < actividades.length; i++) {
        if(selected == actividades[i][0]) { 
            var Moneda = actividades[i][1]+" "+": "+ actividades[i][2];            
        }
    } 
    
    document.querySelector('#lbl').innerText = Moneda;
} 
</script>