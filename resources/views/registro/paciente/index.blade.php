@extends('layouts.admin')
@section('content') 



{!!Html::script('js/jQuery-2.1.4.min.js')!!}
{!!Html::script('js/jquery.mask.min.js')!!}
{!!Html::script('js/sweetalert.min.js')!!}
{!!Html::style('css/sweetalert.css')!!}
{!!Html::script('js/jquery.numeric.js')!!}
{!!Html::script('js/jquery.mask.min.js')!!}

  
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="sweetalert/sweetalert2.min.css"> 
<script type="text/javascript" src="sweetalert/sweetalert2.min.js" ></script>-->



<link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">
    <script src="jquery-3.2.1.min.js"></script>
    <script src="alertifyjs/alertify.js"></script>

    


<script type="text/javascript">   


 
jQuery(function($) {
      $('input,form').attr('autocomplete','off');
      $("#telefono_p").mask("0000-0000",{placeholder: '0000-0000'} );
      //$('textarea,form').attr('autocomplete','off');
   });

function soloNumero(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        numerito="0123456789./-";
        especiales="8-37-38-46";

        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;
            }
        }
        if(numerito.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
        }
        function soloEntero(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        numerito="0123456789";
        especiales="8-37-38-46";
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;
            }
        }
        if(numerito.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
        }

        function soloLetras(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key).toLowerCase();
        letras=" áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales="8-37-38-46-164";
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;break;
            }
        }
        if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
        }



        function llama_Edad() {

     var a =calcularEdad($('#idfecha').val());
     $('#Idedad_p').val(a);
    //alert("Holas");
}

 
////////
function calcularEdad(fecha) {
        // Si la fecha es correcta, calculamos la edad

        if (typeof fecha != "string" && fecha && esNumero(fecha.getTime())) {
            fecha = formatDate(fecha, "yyyy-MM-dd");
        }

        var values = fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];

        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth() + 1;
        var ahora_dia = fecha_hoy.getDate();

        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
        if (ahora_mes < mes) {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia)) {
            edad--;
        }
        if (edad > 1900) {
            edad -= 1900;
        }

        // calculamos los meses
        var meses = 0;

        if (ahora_mes > mes && dia > ahora_dia)
            meses = ahora_mes - mes - 1;
        else if (ahora_mes > mes)
            meses = ahora_mes - mes
        if (ahora_mes < mes && dia < ahora_dia)
            meses = 12 - (mes - ahora_mes);
        else if (ahora_mes < mes)
            meses = 12 - (mes - ahora_mes + 1);
        if (ahora_mes == mes && dia > ahora_dia)
            meses = 11;

        // calculamos los dias
        var dias = 0;
        if (ahora_dia > dia)
            dias = ahora_dia - dia;
        if (ahora_dia < dia) {
            ultimoDiaMes = new Date(ahora_ano, ahora_mes - 1, 0);
            dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
        }

        return edad + " años y " + meses + " meses";
    }


          function vNom(solicitar){
        var txt = solicitar.value;
        solicitar.value = txt.substring(0,1).toUpperCase() + txt.substring(1,txt.length);
      }

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

<?php 
$time=time();
    
    function dameFecha($fecha,$dia){
        list($year,$mon,$day)=explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));    
    }
   $total=0; 
   function formatoFecha($fecha){
    return date('Y-m-d',strtotime($fecha));
  } 
?>




  <!--<body background = {{asset ('img/2.jpg')}}
 style="background-size: 100% auto" >

<img src={{asset ('img/2.jpg')}} style="width: 200px ;height: 200px; margin-top: 90px"  gn=left >

</body>-->



 <script type="text/javascript">
jQuery(function($) {
      
      $('#date').mask('99/99/9999',{placeholder:"mm/dd/yyyy"});
      $('#telefono_p').mask('9999-9999');
     
   });
</script>   


<div  class="row"  >
  <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
  <!--<h3><font color="0e4743">Listado de Pacientes </font>-->
  <h3><FONT FACE="times new roman " size="6" color="0e4743" >Listado de Pacientes</FONT>
@can('registro.paciente.create')

    <a ><button type="button"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" title="Agregar un Nuevo Paciente" style="color: #003366; background-color: #99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span></button></a>

    <a href="{{ route('paciente.pdf') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download">  PDF</span></button>
  
  
                         </a>


                         <a href="{{ route('paciente.excel') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download">  EXCEL</span></button>
  
  
                         </a>

@endcan

    </h3>
    {!!Form::open(array('url'=>'registro/paciente','method'=>'POST','autocomplete'=>'off'))!!}
      {{Form::token()}}
      

      <div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                   <div style="background-image:url({{asset ('img/100.jpg')}});" class="modal-header">
                     <font size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center" >Registro de Nuevo Pacienteeee</p></font>
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

                <div class="modal-body">


      <br>
  <form >
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group" >
                              <label for="nombre_p" danger="text"><span> (*)Nombres:</span></label>
                              <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                   <input autocomplete="off" placeholder=" Nombres del paciente" minlength="3" onkeypress="return soloLetras(event)" onpaste="return false" class="form-control" autofocus type="text" name="nombre_p" id="nombre_p" required value="{{old('nombre paciente')}}" onkeyup="vNom(this)">
                                    @if ($errors->has('nombre_p'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre_p') }}</strong>
                                    </span>
                                @endif
                              </div>
                        </div>
                  </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label for="apellido_p" danger="text"><span> (*)Apellidos:</span></label>
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                 <input autofocus placeholder=" Apellido del paciente" minlength="3" onkeypress="return soloLetras(event)" onpaste="return false" class="form-control" type="text" name="apellido_p" id="apellido_p" required value="{{old('apellido del paciente')}}"  placeholder="Apellido del Paciente..." required autofocus onkeyup="vNom(this)">
                            </div>
                         </div>
                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <div class="form-group">
                              <label for="fechanacimiento_p"><span> (*) Fecha de Nacimiento:</span></label>
                         <div class="input-group margin-bottom-sm">
                               <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                              <input type="Date" min="1940" class="form-control" type="text" name="fechanacimiento_p"   id ="idfecha" placeholder="fecha de nacimiento del paciente... " onchange="llama_Edad()" 
                              max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>"/>
                          </div>
                      </div>
                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                       <div class="form-group">
                                <label for="edad_p"><span> Edad:</span></label>
                            <div class="input-group margin-bottom-sm">
                                  <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                                 <input class="form-control" type="text" name="edad_p" required value="{{old('edad del paciente')}}"  placeholder="Edad del Paciente..." readonly="readonly" Id="Idedad_p">
                            </div>
                            
                      </div>
                 </div>

                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                     <div class="form-group">
                          <label> (*) Genero: </label> 
                          <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span>
                                <select name="genero_p" data-live-search="true" class="form-control selectpicker">
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="FEMENINO">
                                FEMENINO</option>
                               </select>
                            </div>
                      </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                     <div class="form-group">
                            <label for="direccion_p"><span> (*)  Dirección:</span></label>
                         <div class="input-group margin-bottom-sm">
                              <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                              <input class="form-control" type="text" name="direccion" required value="{{old('direccion del paciente')}}"  placeholder="Direccion del Paciente..." onkeyup="vNom(this)">
                         </div>
                      </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <div class="form-group">
                             <label for="nombre_madre_p">
                             <span> Nombre de la madre:</span>
                             </label>
                          <div class="input-group margin-bottom-sm">
                               <span class="input-group-addon"><i class="fa fa-female fa-fw"></i></span>
                              <input autocomplete="off" autofocus placeholder="Nombre de la madre del Paciente..." minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"  class="form-control" type="text" name="nombre_madre_p" onkeyup="vNom(this)">

                           </div>
                      </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <div class="form-group">
                            <label for="nombre_padre_p"><span> Nombre del padre:</span></label>
                            <div class="input-group margin-bottom-sm">
                             <span class="input-group-addon"><i class="fa fa-male fa-fw"></i></span>
                              <input  autocomplete="off" autofocus placeholder="Nombre del padre del Paciente..." minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"  class="form-control" type="text" name="nombre_padre_p"  onkeyup="vNom(this)">
                          </div>
                      </div>
                </div>

   

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                           <label for="nombre_conyuge_p"><span> Nombre del Conyuge:</span></label>
                        <div class="input-group margin-bottom-sm">
                              <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span>
                                <input  autocomplete="off" autofocus placeholder="Nombre del conyuge del paciente..." minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"  class="form-control" type="text" name="nombre_conyuge_p" onkeyup="vNom(this)">
                         </div>
                     </div>
                </div>
            
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                    <div class="form-group">
                              <label for="nombre_responsable_p"><span> (*) Nombre del responsable:</span></label>
                          <div class="input-group margin-bottom-sm">
                              <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                              <input  autocomplete="off" autofocus placeholder="Nombre del responsable del paciente..." minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"  class="form-control" type="text" name="nombre_responsable_p" required value="{{old('nombre del responsable del paciente')}}"  onkeyup="vNom(this)">
                          </div>
                    </div>
                </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                       
                       <div class="form-group">
                                 <label for="telefono_p">(*)Teléfono:</label>
                            <div class="input-group margin-bottom-sm"   ><span    class="input-group-addon"><i      class="fa fa-phone"></i></span>
                                    <input class="form-control" type="text" id="telefono_p" name="telefono_p"  onkeypress="return sololetras(event)" required value="{{old('nombre del padre del paciente')}}" placeholder="Teléfono">
                            </div>
                        </div>
                  </div>
                  
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                        <label for="fecha_registro_p"><span>Fecha de Registro</span></label>
                     <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        <input  type="Date"  class="form-control"  name="fecha_registro_p"  id="fechaActual" required value="{{old('fecha_registro_p')}}"  placeholder="fecha_registro_p" max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>">
                        </div> 
                  </div>
               </div>
            


    
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <div class="form-group">
                          <div class="input-group margin-bottom-sm">
                              <p class="text-danger"> (*)  Campos requeridos</p>
                          </div>
                      </div>
                  </div>


                  </form>
                  




                </div>



             <div class="modal-footer" >
                  <div class="form-group" >

                      <button class="btn btn-primary" style="color: white; background-color: #0a302d"  type="submit">
                          <span class="fa fa-floppy-o">

                          </span>  Guardar

                       </button>

                     


                        <button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
                  
                      <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span class="fa fa-retweet"></span>
                    <span aria-hidden="true">Salir</span>
                     </button>

                        </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>


  </div>

        {!!Form::close()!!}

        <div class="row"> 
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="table-responsive" style="overflow: auto" >
      <table class="table datatable" style="text-align:center;" >
      <thead style="background-color:#1c779e">
       


          <th style="text-align:left">
          <font color="white">NOMBRES</font></th>
          <th style="text-align:left">
          <font color="white">APELLIDOS</font></th>
          <th style="text-align:left">
          <font color="white">DIRECCION</font></th>
          <th style="text-align:center">
          <font color="white">TELEFONO</font></th>
          <!--<th style="text-align:center">Fechanacimiento</th>-->
          <th style="text-align:center">
          <font color="white">ESTADO</font></th>
          <th style="text-align:center;"><font color="white" >OPCIONES</th>

          

        </thead>

        @foreach ($pacients as $pa)
        <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
           <td  align="left"><i class="fa fa-user fa-fw"></i>{{ $pa-> nombre_p}}</td>
           <td align="left">{{ $pa-> apellido_p}}</td>
           <td align="left">{{ $pa-> direccion_p}}</td>
           <td >{{ $pa-> telefono_p}}</td>
           <!--<td ><?php //echo formatoFecha($pa->fechanacimiento_p);?></td>-->
 
           <td>
            @if($pa->estado_p == 'ACTIVO') 

            <p class="text-center"><small class="label pull center p1 bg-olive">{{$pa->estado_p}} </small></p>
                  @else
                  <small class="label pull center p1 bg-red">{{$pa->estado_p}} </small>
                  @endif

          </td>

           
           <!--<td >


                @if($pa->estado_p == 'ACTIVO')


                
                <p class="text-center"><small class="label pull bg-green">{{$pa->estado_p}}
                </small></p>-->

                
                  
            <!--<span class="text-danger" >{{$pa->estado_p}}</span>-->
           <!-- @else

            <small class="label pull bg-red">{{$pa->estado_p}}
                </small>
              
            @endif    
            </td>-->
            
             <!--<span class="text-success">{{$pa->estado_p}}</span>-->
            
           <!--<td>{{ $pa-> estado_p}}</td>-->

         <!-- <td>

          
          <div class="btn-group">
              <button type="button" class="btn btn-warning" class="btn btn-default dropdown-toggle"
                      data-toggle="dropdown" title="Seleccione una Opcion"> 
                      <i class="fa fa-cog"></i>
                
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="{{URL::action('PacienteController@show',$pa->idpaciente)}}"><span class="fa fa-user-md"></span>  Perfil</a></li>

                <li><a href="{{URL::action('PacienteController@edit',$pa->idpaciente)}}"><span class="fa fa-pencil-square-o"></span>  Editar</a></li>

                 <li><a href="" data-target="#modal-delete-{{$pa->idpaciente}}" data-toggle="modal">
                 <span class="fa fa-trash"></span>  Dar de Baja
                 
                 </a></li>

              </ul>
          </div>

           <a href="{{URL::action('PacienteController@show',$pa->idpaciente)}}"><button class="btn btn-outline-warning" title="Expediente del Paciente"><span class="fa fa-eye"></span></button></a>
        

        </td>-->


        <td align="center">
          @can('registro.paciente.show')
            <a href="{{URL::action('PacienteController@show',$pa->idpaciente)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a>
            @endcan
            
            @can('registro.paciente.edit')
            <a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-paciente-edit-{{ $pa->idpaciente }}"><i class="fa fa-pencil"></i></a>
            @endcan

            @can('registro.paciente.destroy')
            @if($pa->estado_p == 'ACTIVO')

            <a href="" data-target="#modal-delete-{{$pa->idpaciente}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-level-down"></span></button></a>
            @else
            <a href="" data-target="#modal-delete-{{$pa->idpaciente}}" data-toggle="modal"><button type="button" class="btn btn-primary mb1 bg-red" style="color: #003366; background-color: #5affab"><span class="fa fa-level-up"></span></button></a>
            @endif 
            @endcan

          </td>

      </tr>

         

         @include('registro.paciente.edit', ['pa' => $pa])
          
        @include('registro.paciente.modal')
        @endforeach

          </table>
        </div>
          {{$pacients->render()}}
     </div>

  
</div>


 
   
@endsection





