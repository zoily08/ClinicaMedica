@extends ('layouts.admin')
@section ('content') 
<div  style=" background-color:#f2f2f1 " >
	<fieldset  style="min-width: 0;padding:.35em .625em .75em!important;margin:0 2px;
	border:2px solid silver!important;margin-bottom: 10em;box-shadow: -6px 10px 20px 0px; ">

	<legend  style="width: inherit;padding:inherit;border:2px solid silver;" class="legend" align= "center"  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><div style="color: #112b56"  ><B>Información  de Proveedor</B></div></legend>
	<div class="container" > 
		<br>
			<div class="row justify-content-center">
        		<div class="col-md-10">
        			<div  style=" background-color:#f2f2f1 " >
						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
							<thead style="background-color:#A9D0F5">
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="nombre_empresa">EMPRESA</label>
										<p>{{$proveedor->nombre_empresa}}</p>
									</div> 
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="registro_sanitario">REGISTRO SANITARIO</label>
										<p>{{$proveedor->registro_sanitario}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="nombre_p">NOMBRE PROVEEDOR</label>
										<p>{{$proveedor->nombre_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="direccion_p">DIRECCIÓN</label>
										<p>{{$proveedor->direccion_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="telefono_p">TELÉFONO</label>
										<p>{{$proveedor->telefono_p}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">FECHA REGISTRO</label>
										<p><?php echo formatoFecha($proveedor->fecha_registro_p);?></p>
								</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
										<label for="estado_p">ESTADO</label>
										<p>{{$proveedor->estado_p}}</p>
									</div>
								</div>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!--<a href="{{ route('paciente.pdf') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download"> IMPRIMIR LISTADO DE PACIENTES</span></button></a>-->
				<a href="{{URL::action('ProveedorController@index',$proveedor->idproveedor)}}"><button type="button" class="btn btn-danger"><span class="fa fa-retweet" aria-hidden="true" > Regresar</span></button></a>
			</div>
		</div>
	</div>
</fieldset>
 </div>  
@endsection
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





<?php 
 
   function formatoFecha($fecha){
    return date("d-m-Y",strtotime($fecha));
  } 
?>