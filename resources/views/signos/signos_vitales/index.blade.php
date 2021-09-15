@extends('layouts.admin')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3><FONT FACE="times new roman" size="6" color="0e4743"> Toma de Signos Vitales </FONT>
      @can('signos.signos_vitales.creat')
      <a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus" color="0e4743"></span> 
      </button></a> 
      @endcan  
    </h3>
    {!! Form::open(['route'=>'signos_vitales.store','method'=>'POST','autocomplete'=>'off']) !!}          
   
    <div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content"> 
          <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
            <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Registro de Signos Vitales</p></font>
            <div style="text-align: right;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">X</span>
              </button>
            </div>
          </div>
          <div class="modal-body">
            <form>
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
                <div class="form-group">
                  <label for="idpaciente">(*) Paciente:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <select name="idpaciente" class="form-control selectpicker" id="idpaciente" data-live-search="true">
                      @foreach($paciente as $paciente)
                        <option value="{{$paciente->idpaciente}}">{{$paciente->nombre_p}} {{$paciente->apellido_p}}</option>
											@endforeach
										</select> 
									</div>
								</div>
							</div>    
							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
								<div class="form-group">
									<label for="temperatura">(*) Temperatura:  °C</label>
										<div class="input-group margin-bottom-sm">
		  								<span class="input-group-addon"><i class="fa fa-magic"></i></span>
		  								<input type="text" name="temperatura" id="temperatura" class="form-control"  maxlength="4"  onkeypress="return soloNumeros(event)" onkeyup ="validaTemp();" onchange="validacionesTemp();"  placeholder="Temperatura">
		  							</div>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
								<div class="form-group">
									<label >(*) Presión:  mmHG</label>
										<div class="input-group">
			  								<div class="input-group margin-bottom-xs">
			  									<label></label>
			  										<span class="input-group-addon"><i class="fa fa-stethoscope"></i></span>
                            <label for="presionsistolica"></label>
			  										<div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
			  											<input type="number" name="presionsistolica" id="presionsistolica" required class="form-control" onkeyup ="validaPresion();" onchange="validacionesPres();" value="120"  placeholder="Sistolica">
			  										</div>
			  										<label for="presiondiastolica"></label>
														<div class="col-lg-5 col-sm-5 col-md-5 col-xs-5" />
															<input type="number" name="presiondiastolica" id="presiondiastolica" required class="form-control" onkeyup ="validaPresion();" onchange="validacionesPres();" value="80" placeholder="P. Diastolica">
														</div>
												</div>
                      </div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="peso">(*) Peso:  Kg</label>
										<div class="input-group margin-bottom-sm">
			  							<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
										  <input type="text" name="peso" id="peso" class="form-control" onkeyup="calculaIMC();" onchange="validacionesPeso();" onkeypress="return soloNumeros(event)" placeholder="Peso">
										</div>
									</div>
								</div> 
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="estatura">(*)Estatura:  cm</label>
										<div class="input-group margin-bottom-sm">
			  							<span class="input-group-addon"><i class="fa fa-male"></i></span>
										  <input type="text" name="estatura" id="estatura" class="form-control" onkeyup="calculaIMC();" onchange="validacionesEstatura();" onkeypress="return soloNumeros(event)" placeholder="Estatura...">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="IMC">IMC:  </label>
                    <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><a class="Ntooltip"><i class="fa fa-heartbeat"></i><span><img src="{{asset('imagenes/peso_.jpg')}}" /></span></a>
                      </span>
                      <input type="text" name="IMC" id="IMC" class="form-control" readonly="readonly" maxlength="2" placeholder="IMC...">
										</div>
									</div>
								</div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="fecharegistro">(*) Fecha Registro:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  										<input class="form-control" type="date" name="fecharegistro" id="fechaActual"  required value="{{old('fecharegistro')}}" >  
										</div>
									</div> 
								</div>
								<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">	
								 	<div class="form-group">
										<div class="input-group margin-bottom-sm">
									 	 <p class="text-danger">(*) Campos Requeridos</p>
										</div>
									</div>
								</div>
      			</form>
					</div>
					<div class="modal-footer">
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<div class="form-group">
								<button class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
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
</div>



	{!!Form::close()!!}

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
		<FONT FACE="times new roman" size="4" color="0e4743"> Listado de Pacientes a Consulta </FONT>
    <div class="table-responsive" style="overflow: auto">
      <table class="table table-striped table-bordered table-condensed table-hover datatable" style="text-align:center;">
				<thead style="background-color:#1c779e">
					<th style="text-align:left;"><font color="white" >FECHA DE REGISTRO</th>
					<th style="text-align:left;"><font color="white" >NOMBRE PACIENTE</th>
					<th style="text-align:center;"><font color="white" >ESTADO</th>
					<th style="text-align:center;"><font color="white" >OPCIONES</th>      
				</thead>
				@foreach ($signos as $sig) 
				<tr>
					<td align="left"><i class="fa fa-calendar"></i> <?php echo formatoFecha( $sig->fecharegistro);?></td>
					<td align="left"><i class="fa fa-user"></i> {{$sig->nombre_p}} {{$sig->apellido_p}}</td>
					<td>
						@if($sig->estado == 'A CONSULTA')

						<p class="text-center"><small class="label pull center p1 bg-olive">{{$sig->estado}} </small></p>
            			
            			@endif
 
					</td>
					<td align="center">
						@can('signos.signos_vitales.show')
						<a href="{{URL::action('SignosVitalesController@show',$sig->idsignos_vitales)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a> 
						 @endcan
                        
                        @can('signos.signos_vitales.edit')
						<a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-signos-edit-{{ $sig->idsignos_vitales }}"><i class="fa fa-pencil"></i></a>
						 @endcan

                        
                        @can('signos.signos_vitales.destroy')
						 <a href="" data-target="#modal-delete-{{$sig->idsignos_vitales}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-user-md"></span></button></a> 
						  @endcan


 
					</td>
				</tr>

				@include('signos.signos_vitales.edit', ['sig' => $sig])
				@include('signos.signos_vitales.modal')
				@endforeach
			</table>
		</div>
		{{$signos->render()}}
	</div>
</div>
			


			<script>

    	function soloNumeros(e){
    		key = e.keyCode || e.which;
    		tecla = String.fromCharCode(key).toLowerCase();
    		letras = " 0123456789.";
    		especiales = [8,37,39,46];

    		tecla_especial = false
    		for(var i in especiales){
    			if(key == especiales[i]){
    				tecla_especial = true;
    				break;
    			} 
    		}
    		if(letras.indexOf(tecla)==-1 && !tecla_especial)
    			return false;
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

    	IMC=0;
    	$("#IMC").change(calculaIMC);
    	function calculaIMC(){
    		peso=document.getElementById("peso").value;
    		estatura=document.getElementById("estatura").value;
    		//comprobamos que los campos
    		//no vengan vacíos
    		if(peso!="" && estatura!="" && peso>0 && estatura>0 && estatura<=300){
    			//aplicamos la fórmula
    			estatura = parseInt(estatura)/100;
    			IMC=(peso/(estatura*estatura)).toFixed(2);
    			$("#IMC").val(IMC);
    			IMC=document.getElementById("IMC").value;
    			if(IMC<19){
    				document.getElementById("IMC").style.color = "red";
    				document.getElementById("mensaje").value('Bajo Peso');

    			}
    			else{
    				if(IMC>=19 && IMC<24){
    					document.getElementById("IMC").style.color = "green";
    				}
    				else{
    					if(IMC>=24 && IMC<29){
    						document.getElementById("IMC").style.color = "orange";
    					}
    					else{
    						if(IMC>=29 && IMC<39){
    							document.getElementById("IMC").style.color = "red";

    						}
    						else{
    							if(IMC>=39){
    								document.getElementById("IMC").style.color = "red";
    							}
    						}
    					}
    				}
    			}  
    		}
    	}

 

    	$("#temperatura").change(validaTemp);
    	function validaTemp(){
    		temperatura=document.getElementById("temperatura").value;
    		if(temperatura<35){
    			document.getElementById("temperatura").style.color = "red";
    		}
    		else{
    			if(temperatura>=35.1 && temperatura<=37){
    				document.getElementById("temperatura").style.color = "green";
    			}
    			else{
    				if(temperatura>=37.1 && temperatura<=37.9){
    					document.getElementById("temperatura").style.color = "orange";
    				}
    				else{
    					if(temperatura>=38){
    						document.getElementById("temperatura").style.color = "red";

    					}
    				}

    			}
    		}
    	}


    	$("#presionsistolica").change(validaPresion);
    	$("#presiondiastolica").change(validaPresion);
    	function validaPresion(){
    		presionsistolica=document.getElementById("presionsistolica").value;
    		presiondiastolica=document.getElementById("presiondiastolica").value;
    		if(presionsistolica==120 && presiondiastolica==80){
    			document.getElementById("presionsistolica").style.color = "green";
    			document.getElementById("presiondiastolica").style.color = "green";

    		}
    		else{       
    			if(presionsistolica<90   && presiondiastolica <60){
    				document.getElementById("presionsistolica").style.color = "orange";
    				document.getElementById("presiondiastolica").style.color = "orange";
    			}
    			else{
    				if(presionsistolica>=140 && presiondiastolica>=90){
    					document.getElementById("presionsistolica").style.color = "red";
    					document.getElementById("presiondiastolica").style.color = "red";
    				}
    			}
    		}
    	}

      $('[data-toggle="popover-hover"]').popover({
        html: true,
        trigger: 'hover',
        placement: 'bottom',
        content: function () { return '<img src="' + $(this).data('img') + '" />'; }
      });

      function validacionesTemp(){
      	temp=document.getElementById("temperatura").value;
      	if(temp<35){
      		alert("La temperatura está muy baja");
      	}
      	else{
      		if(temp>40){
      			alert("La temperatura está muy alta");
      		}
      	}
      }

      function validacionesPres(){
      	pressistolica=document.getElementById("presionsistolica").value;
      	presdiastolica=document.getElementById("presiondiastolica").value;

      	if(pressistolica<90 && presdiastolica <60){
      		alert("La presión es muy baja");
      	}
      	else{
      		if(pressistolica>140 && pressistolica<=180 && presdiastolica>90 && presdiastolica<=120){
      			alert("La presión es muy Alta");
      		}
      		else{
      			if(pressistolica>180 && presdiastolica>120){
      				alert("La presión es Peligrosamente Alta");
      			}
      		}
      	}
      }


      function validacionesPeso(){
      	pes=document.getElementById("peso").value;
      	if(pes<=0){
      		alert("El peso no está en el rango");
      	}
      	else{
      		if(pes>=700){
      			alert("El peso no está en el rango");
      		}
      	}
      }

      function validacionesEstatura(){
      	est=document.getElementById("estatura").value;
      	if(est<=0){
      		alert("La estatura no está en el rango");
      	}
      	else{
      		if(est>=300){
      			alert("La estatura no está en el rango");
      		}
      	} 		
      }

      

		</script>

    <style>
      
    a.Ntooltip {
position: relative;
text-decoration: none !important;
color:#0080C0 !important;
font-weight:bold !important;
}
 
a.Ntooltip:hover {
z-index:999;
background-color:#000000;
}
 
a.Ntooltip span {
display: none;
}
 
a.Ntooltip:hover span {
display: block;
position: absolute;
bottom:2em; left:2em;
width:250px;
height=300px;
padding:6px;

color: white;
}
 
    </style>

         

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