<div data-backdrop="static" class="modal fade" id="modal-consulta_psicologica-edit-{{ $conp->idconsulta_psicologica }}"> 
<div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                            <!--<h3>NUEVO PRODUCTO</h3>-->
                            <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Consulta Psicológica </p></font> 
                                @if (count($errors)>0)  
                                    <div class="alert alert-danger">  
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul> 
                                    </div> 
                                @endif  
                            </div>  
    {!! Form::model($conp,['route'=>['consulta_psicologica.update',$conp->idconsulta_psicologica],'method'=>'PATCH','autocomplete'=>'off']) !!}

     <div class="modal-body">
      <br> 
        <div class="row">  
          <br>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
            <div class="form-group">
              <label for="idpaciente">(*) Paciente:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" readonly name="idpaciente" required value="{{$conp->nombre_p}}" class="form-control"  onkeypress="return soloLetras(event)"  > 
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
              <label for="detalle">(*) Detalle:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
              <input type="text" name="detalle" required value="{{$conp->detalle}}" class="form-control"  onkeypress="return soloLetras(event)"  placeholder="Detalle">
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
              <label for="observacion">(*) Observacion:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-medkit"></i></span>
              <textarea class="form-control" type="text" name="observacion" id="sintomas" rows="4" cols="40"  onkeypress="return soloLetras(event)"  placeholder="Observacion">{{$conp->observacion}}</textarea>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="fecha_consulta">(*) Fecha Consulta:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input class="form-control" id="fecha_consulta" type="date" name="fecha_consulta" value="<?php echo date('Y-m-d', strtotime($conp->fecha_consulta)) ?>"> 
                </div>
              </div> 
          </div> 
          <div class="col-lg-22 col-sm-22 col-md-22 col-xs-12">
            <div class="form-group">
              <div style="text-align: right;">
                <button  class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
                <button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
                <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> <span class="fa fa-retweet"></span><span aria-hidden="true">Salir</span></button>
              </div>
            </div> 
          </div>
        </div>
    </div>
  </div>
</div>
</div>
  
        {!!Form::close()!!} 
 
        @push('scripts')
        <script>
          function soloLetras(e) {
            key = e.keyCode || e.which;
              tecla = String.fromCharCode(key).toLowerCase();
              letras = " áéíóúabcdefghijklmnñopqrstuvwxyz,";
              especiales = [8, 37, 39, 46];

              tecla_especial = false
              for(var i in especiales) {
                if(key == especiales[i]) { 
                  tecla_especial = true;
                      break;
                    }
                  }
                  if(letras.indexOf(tecla) == -1 && !tecla_especial)
                    return false;
                }
              </script>
            @endpush  





