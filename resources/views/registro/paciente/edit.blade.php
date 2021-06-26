{!!Html::script('js/jquery.mask.min.js')!!}
<script type="text/javascript">
 window.onload = function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
          dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
          mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
}
</script>

<script type="text/javascript">
  jQuery(function($) {
      $('#telefono_p').mask('9999-9999');
      $("#telefono_p").mask("0000-0000",{placeholder: '0000-0000'} );
   });
 
</script> 
 

<div data-backdrop="static" class="modal fade" id="modal-paciente-edit-{{ $pa->idpaciente }}"> 
  <div class="modal-dialog modal-lg"> 
    <div class="modal-content"> 
      <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
        <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Paciente</p></font>
          @if (count($errors)>0)  
            <div class="alert alert-danger"> 
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul> 
            </div> 
          @endif
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::model($pa,['route'=>['paciente.update',$pa->idpaciente],'method'=>'PATCH','autocomplete'=>'off']) !!}
        <div class="modal-body">
          <div class="row"> 
            <br>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                  <label for="nombre_p"><span> (*) Nombres:</span></label>
                    <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input autocomplete="off" autofocus placeholder=" Nombres del paciente" minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"   type="text" name="nombre_p" required value="{{$pa->nombre_p}}" class="form-control" placeholder="Nombre Paciente..." onkeyup="vNom(this)">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="apellido_p"><span> (*) Apellidos:</span></label>
                      <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                          <input autocomplete="off" autofocus placeholder=" Apellido del paciente" minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"   type="text" name="apellido_p" required value="{{$pa->apellido_p}}" class="form-control" placeholder="Apellido del Paciente..." onkeyup="vNom(this)">
                      </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label> (*) Genero: </label>
                    <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span>
                        <input onFocus="" type="text" name="genero_p" readonly="readonly" class="form-control" value="{{ $pa->genero_p}}">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group" id="a">
                    <label for="edad_p"><span> (*) Fecha de Nacimiento:</span></label>
                      <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                          <input type="date" min="1980"  name="fechanacimiento_p" value="<?php echo formatoFecha($pa->fechanacimiento_p);?>" id ="idfecha" required class="form-control" placeholder="fecha de nacimiento del Paciente..." onchange="llama_Edad()"  max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>"/> 
                      </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="edad_p"><span> Edad:</span></label>
                      <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                          <input type="text" name="edad_p" required value="{{$pa->edad_p}}" class="form-control" placeholder="Edad del Paciente..." readonly="readonly" Id="Idedad_p">
                      </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="direccion_p"><span> (*)  Dirección:</span></label>
                      <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                          <input  type="text" name="direccion_p" value="{{$pa->direccion_p}}" class="form-control" placeholder="Dirección del paciente..." onkeyup="vNom(this)">
                      </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="nombre_padre_p"><span> Nombre del padre:</span></label>
                      <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-male fa-fw"></i></span>
                          <input autocomplete="off" autofocus placeholder=" Nombres del paciente" minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"   type="text" name="nombre_padre_p" value="{{$pa->nombre_padre_p}}" class="form-control" placeholder="nombre del padre del paciente..." onkeyup="vNom(this)">
                      </div>
                  </div>
                </div> 
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="nombre_madre_p"><span> (*) Nombre de la madre:</span></label>
                      <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-female fa-fw"></i></span>
                          <input  autocomplete="off" autofocus placeholder=" nombre de la pmadre del paciente" minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"  type="text" name="nombre_madre_p" value="{{$pa->nombre_madre_p}}" class="form-control" onkeyup="vNom(this)">
                      </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="nombre_conyuge_p"><span> Nombre del Conyuge:</span></label>
                      <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span>
                          <input autocomplete="off" autofocus placeholder=" nombre del conyuge del paciente. " minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"   type="text" name="nombre_conyuge_p" value="{{$pa->nombre_conyuge_p}}" class="form-control" onkeyup="vNom(this)">
                      </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="nombre_responsable_p"><span> (*) Nombre del responsable:</span></label>
                      <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                          <input autocomplete="off" autofocus placeholder=" nombre del conyuge del paciente. " minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"   type="text" name="nombre_responsable_p" value="{{$pa->nombre_responsable_p}}" class="form-control" onkeyup="vNom(this)">
                      </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group ">
                    <label for="telefono_p"><span> (*) Teléfono:</span></label> 
                      <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input  onkeypress="return soloNumero(event)"  type="text" id="telefono_p" name="telefono_p" value="{{$pa->telefono_p}}" class="form-control" placeholder= "0000-0000" >
                      </div>
                  </div> 
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="fecha_registro_p">(*) Fecha Registro:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input class="form-control" id="fecha_registro_p" type="date" name="fecha_registro_p"  value="<?php echo formatoFecha($pa->fecha_registro_p);?>" max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>">
                    </div>
                  </div>
                </div>
                <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8">
                  <div class="form-group">
                    <div class="input-group margin-bottom-sm">
                      <p class="text-danger"> (*)  Campos requeridos</p>
                    </div>
                  </div>
                </div> 
                <div class="col-lg-22 col-sm-22 col-md-22 col-xs-12">
                  <div class="form-group">
                    <div style="text-align: right;">
                      <button  class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit ">  <span class="fa fa-floppy-o"></span> Guardar </button>
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
{!! Form::close() !!}






 