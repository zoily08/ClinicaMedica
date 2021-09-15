@extends ('layouts.admin')
@section ('contenido')


   {!!Html::script('js/jquery-1.9.0.min.js')!!}
   {!!Html::script('js/sweetalert.min.js')!!}
   {!!Html::style('css/sweetalert.css')!!}
    {!!Html::script('js/jquery-1.7.2.min.js')!!}
     {!!Html::script('js/jquery.numeric.js')!!}
   {!!Html::script('js/jquery.mask.min.js')!!}

<script type="text/javascript">


jQuery(function($) {
      $('input,form').attr('autocomplete','off');
      $("#telefono_p").mask("0000-0000",{placeholder: '0000-0000'} );
      //$('textarea,form').attr('autocomplete','off');
   });

function soloNumero(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        numerito="0123456789./";
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

</script>

<?php $message=Session::get('message');  ?>
@if($message=='store')
<script type="text/javascript">
swal("Guardado con exito","Haz click en el boton","success")
</script>
@endif


       <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <!--<h3>Registro de Paciente</h3>-->
         <font size=6 face="Comic Sans MS,arial,verdana" color="red" ><p align="center"> Registro de Paciente </p></font>
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
   </div>
         {!!Form::open(array('url'=>'registro/paciente','method'=>'POST','autocomplete'=>'off'))!!}
         {{Form::token()}}
      <div class="row"> 
      
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
              <label for="nombre_p" danger="text"><span> (*)Nombre y apellido:</span></label>
          <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
           <input autocomplete="off" autofocus placeholder=" Nombres del paciente" minlength="3" onkeypress="return soloLetras(event)" onpaste="return false" class="form-control" type="text" name="nombre_p" id="nombre_p" required value="{{old('nombre paciente')}}"  placeholder="Nombre del Paciente...">

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
               <select name="genero_p" class="form-control">
               
                     <option value="MASCULINO">MASCULINO</option>
                     <option value="FEMENINO">FEMENINO</option>
               </select>
            </div>
            </div>
         </div>



            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             <label for="fechanacimiento_p"><span> (*) Fecha de Nacimiento:</span></label>
          <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
           <input type="Date" min="1980" max="2018" class="form-control" type="text" name="fechanacimiento_p"   id ="idfecha" placeholder="fecha de nacimiento del paciente... " onchange="llama_Edad()"/>
            </div>
            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             <label for="direccion_p"><span> (*)  Dirección:</span></label>
          <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
           <input class="form-control" type="text" name="direccion" required value="{{old('direccion del paciente')}}"  placeholder="Direccion del Paciente...">
            </div>
            </div>
            </div>

            


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             <label for="nombre_padre_p"><span> Nombre del padre:</span></label>
          <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-male fa-fw"></i></span>
           <input  autocomplete="off" autofocus placeholder="Nombre del padre del Paciente..." minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"  class="form-control" type="text" name="nombre_padre_p" required value="{{old('nombre del padre del paciente')}}">
            </div>
            </div>
            </div>

             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             <label for="nombre_madre_p"><span> (*) Nombre de la madre:</span></label>
          <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-female fa-fw"></i></span>
           <input autocomplete="off" autofocus placeholder="Nombre de la madre del Paciente..." minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"  class="form-control" type="text" name="nombre_madre_p" required value="{{old('nombre de la madre del paciente')}}"  >
            </div>
            </div>
            </div>

             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             <label for="nombre_conyuge_p"><span> Nombre del Conyuge:</span></label>
          <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span>
           <input  autocomplete="off" autofocus placeholder="Nombre del conyuge del paciente..." minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"  class="form-control" type="text" name="nombre_conyuge_p">
            </div>
            </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             <label for="nombre_responsable_p"><span> (*) Nombre del responsable:</span></label>
          <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
           <input autocomplete="off" autofocus placeholder="Nombre del responsable del paciente..." minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"  class="form-control" type="text" name="nombre_responsable_p" required value="{{old('nombre del responsable del paciente')}}"  >
            </div>
            </div>
            </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
             <label for="telefono_p"><span> (*) Teléfono:</span></label>
          <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-phone-square fa-fw"></i></span>
           <input  onkeypress="return soloNumero(event)" onpaste="return false" maxlength="8" class="form-control" type="text" name="telefono_p" required value="{{old('Telefono del paciente')}}"  placeholder="Telefono del paciente...">
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
           
  </div> 

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
               <button class="btn btn-primary" type="submit">Guardar</button>
               <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
         </div>
      </div>

         
         {!!Form::close()!!}
   
@endsection
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
@section('scripts')

 <!-- jQuery 2.1.4 -->
    
<script type="text/javascript">

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

        return edad + " años y " + meses + " meses  ";
    }

</script>

@endsection