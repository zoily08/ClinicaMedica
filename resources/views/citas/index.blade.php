@extends('layouts.admin')
@section('content') 



  

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

  $( "#fechaActual" ).date({
  beforeShowDay: $.datepicker.noWeekends
}); 
}



var hoy             = new Date();
var fechaFormulario = new Date('2016-11-10');

// Comparamos solo las fechas => no las horas!!
hoy.setHours(0,0,0,0);
fechaFormulario.setHours(0,0,0,0); // Lo iniciamos a 00:00 horas

if (hoy <= fechaFormulario) {

  console.log("Fecha a partir de hoy");
}
else {
  console.log("Fecha pasado");
}



</script>



</script>

<div  class="row"  >
  <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
  <!--<h3><font color="0e4743">Listado de Pacientes </font>-->
  <h3><FONT FACE="times new roman " size="6" color="0e4743" >Listado de Citas</FONT>



@can('citas.create')
    <a ><button type="button"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" title="Agregar  Nueva Cita" style="color: #003366; background-color: #99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span></button></a>
@endcan

    </h3>
    
    {!!Form::open(array('url'=>'citas','method'=>'POST','autocomplete'=>'off'))!!}
      {{Form::token()}}
      

      <div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                   <div style="background-image:url({{asset ('img/100.jpg')}});" class="modal-header">

                     
                     <font size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center" >Registro de Citas</p></font>






                     

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


      
                <div class="row" style="background-color: #f2f2f1"> 
            

  <form >
   

              


                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group">
                    <label for="idpaciente"> Pacientes:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="idpaciente" class="form-control selectpicker" id="idpaciente" data-live-search="true">
                        @foreach($paci as $paciente)
                          <option value="{{$paciente->idpaciente}}">{{$paciente->nombre_p}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>


                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                        <label for="fecha"><span>(*)Fecha de Cita:</span></label>
                     <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        <input  type="Date"  class="form-control"  name="fecha"  id="fechaActual" required value="{{old('fecha')}}"  placeholder="fecha"
                        min = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")));?>" >
 
                        </div>
                  </div>
               </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                        <label for="hora"><span>(*)Hora de Cita:</span></label>
                     <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        <input  type="time"  class="form-control"  name="hora" value="08:00:00" max="16:00:00" min="08:00:00"  required="true">
                        </div>
                  </div>
               </div>

               <!--<input type="time" name="hora" value="11:45:00" max="22:30:00" min="10:00:00" step="1">
              <input type="submit" value="enviar">-->

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="idespecialidad">Especialidad:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="idespecialidad" class="form-control selectpicker" id="idespecialidad" data-live-search="true">
                        @foreach($espe as $especialidad)
                          <option value="{{$especialidad->idespecialidad}}">{{$especialidad->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="idmedico">Medicos:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="idmedico" class="form-control selectpicker" id="idmedico" data-live-search="true">
                        @foreach($medi as $medico)
                          <option value="{{$medico->idmedico}}">{{$medico->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="idconsultorio">Consultorio:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="idconsultorio" class="form-control selectpicker" id="idconsultorio" data-live-search="true">
                        @foreach($consul as $consultorio)
                          <option value="{{$consultorio->idconsultorio}}">{{$consultorio->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="form-group">
                        <label >(*) Observacion:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                        <textarea class="form-control" type="text" name="observacion"   rows="3" cols="50" placeholder="Observacion..."></textarea>
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
                            <button  class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>

                            <button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>

                            
                            <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> <span class="fa fa-retweet"></span><span aria-hidden="true">Salir</span></button>
                        </div>
                    </div>
                </div>

                </form>
                  




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
      <table  class="table datatable" style="text-align:center;">
        <thead style="background-color:#1c779e">
          <th style="text-align:left"><font color="white">FECHA DE CITA</font></th>
          <th style="text-align:left"><font color="white">HORA</font></th>
          <th style="text-align:left"><font color="white">OBSERVACION</font></th> 
          <th style="text-align:left"><font color="white">ESTADO</font></th> 
          <th style="text-align:center"><font color="white">OPCIONES</font></th>
        </thead>
        @foreach ($cits as $cita)
          <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
            <td align="left"><i class="fa fa-calendar"></i> <?php echo formatoFecha( $cita->fecha);?></td>
            <td  align="left">{{ $cita-> hora}}</td>
            <td  align="left">{{ $cita-> observacion}}</td>
            <td>
              @if($cita->estado== 'ACTIVO')
                <p class="text-center"><small class="label pull center p1 bg-olive">{{$cita->estado}} </small></p>
              @else
                <small class="label pull center p1 bg-red">{{$cita->estado}} </small>
              @endif
            </td>
            <td>
              @can('citas.edit')
                <a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-citas-edit-{{ $cita->idcitas }}"><i class="fa fa-pencil"></i></a>
              @endcan
              @can('citas.destroy')
                @if($cita->estado == 'ACTIVO')
                  <a href="" data-target="#modal-delete-{{$cita->idcitas}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-level-down"></span></button></a>
                @else
                  <a href="" data-target="#modal-delete-{{$cita->idcitas}}" data-toggle="modal"><button type="button" class="btn btn-primary mb1 bg-red" style="color: #003366; background-color: #5affab"><span class="fa fa-level-up"></span></button></a>
                @endif
              @endcan
            </td>
          </tr>
          @include('citas.edit', ['cita' => $cita])
          @include('citas.modal')
        @endforeach
      </table>
    </div>
    {{$cits->render()}}
  </div>
</div>

<?php 
$time=time();
    
    function dameFecha($fecha,$dia){
        list($year,$mon,$day)=explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));    
    }
   $total=0; 
   function formatoFecha($fecha){
    return date("d-m-Y",strtotime($fecha));
  } 
?>
   
@endsection









