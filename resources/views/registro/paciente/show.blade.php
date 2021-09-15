@extends ('layouts.admin')
@section ('content') 

<div  style=" background-color:#f2f2f1 " >
	<fieldset  style="min-width: 0;padding:.35em .625em .75em!important;margin:0 2px;
	border:2px solid silver!important;margin-bottom: 10em;box-shadow: -6px 10px 20px 0px; ">

	<legend  style="width: inherit;padding:inherit;border:2px solid silver;" class="legend" align= "center"  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><div style="color: #112b56"  ><B>Información  del Paciente</B></div></legend>
	<div class="container" >  
		<br>
			<div class="row justify-content-center">
        		<div class="col-md-10">
        			<div  style=" background-color:#f2f2f1 " >
        				<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
							<thead style="background-color:#A9D0F5">
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="Estado">ESTADO:</label>
										<p>{{$paciente->estado_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">FECHA DE REGISTRO:</label>
										<p><?php echo formatoFecha($paciente->fecha_registro_p);?></p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">NOMBRE:</label>
										<p>{{$paciente->nombre_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">APELLIDO:</label>
										<p>{{$paciente->apellido_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">EDAD:</label>
										<p>{{$paciente->edad_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">GENERO:</label>
										<p>{{$paciente->genero_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">FECHA DE NACIMIENTO</label>
										<p><?php echo formatoFecha($paciente->fechanacimiento_p);?></p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">DIRECCIÓN:</label>
										<p>{{$paciente->direccion_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">NOMBRE DEL PADRE:</label>
										<p>{{$paciente->nombre_padre_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">NOMBRE DE LA MADRE:</label>
										<p>{{$paciente->nombre_madre_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">NOMBRE DEL Ó LA CONYUGE:</label>
										<p>{{$paciente->nombre_conyuge_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">NOMBRE DEL RESPONSABLE:</label>
										<p>{{$paciente->nombre_responsable_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">NUMERO DE TELEFONO:</label>
										<p>{{$paciente->telefono_p}}</p>
									</div>
								</div>
							</thead>
						</table>
					</div>

					<div class="modal-footer">
						<!--<a href="{{ route('paciente.pdf') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download"> IMPRIMIR LISTADO DE PACIENTES</span></button></a>-->
						<a href="{{URL::action('PacienteController@index',$paciente->idpaciente)}}"><button type="button" class="btn btn-danger"><span class="fa fa-retweet" aria-hidden="true" > Regresar</span></button></a>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
</div>  

 


			@push('scripts')
				<script>
					function soloLetras(e) {
						key = e.keyCode || e.which;
    					tecla = String.fromCharCode(key).toLowerCase();
    					letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
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