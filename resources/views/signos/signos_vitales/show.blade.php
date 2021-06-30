@extends ('layouts.admin')
@section ('content') 
<div  style=" background-color:#f2f2f1 " >
	<fieldset  style="min-width: 0;padding:.35em .625em .75em!important;margin:0 2px;
	border:2px solid silver!important;margin-bottom: 10em;box-shadow: -6px 10px 20px 0px; ">
	<legend  style="width: inherit;padding:inherit;border:2px solid silver;" class="legend" align= "center"  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><div style="color: #112b56"  ><B>Información  de Signos Vitales</B></div></legend>
	<div class="container" > 
		<br>
		<div class="row justify-content-center"> 
			<div class="col-md-10">
				<div  style=" background-color:#f2f2f1 " >
					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color:#A9D0F5">
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="idpaciente">PACIENTE</label>  
											<p>{{$signos->nombre_p}}</p> 
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="temperatura">TEMPERATURA</label>
											<p>{{$signos->temperatura}} °C</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="nombre_p">PRESION</label>
											<p>{{$signos->presionsistolica}}/{{$signos->presiondiastolica}} mmHg</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="direccion_p">PESO</label>
											<p>{{$signos->peso}} kg</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="telefono_p">ESTATURA</label>
											<p>{{$signos->estatura}} cm</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="telefono_p">IMC</label>
											<p>{{$signos->IMC}} </p>
									</div>
								</div>
							</thead>
						</table>
				</div> 
			</div>
		</div>
		<div class="modal-footer">
			<!--<a href="{{ route('paciente.pdf') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download"> IMPRIMIR LISTADO DE PACIENTES</span></button></a>-->
			<a href="{{URL::action('SignosVitalesController@index',$signos->idsignos_vitales)}}"><button type="button" class="btn btn-danger"><span class="fa fa-retweet" aria-hidden="true" > Regresar</span></button></a>
		</div>
	</div>
</fieldset>
</div>            
		
@endsection



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

<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
@section('scripts')