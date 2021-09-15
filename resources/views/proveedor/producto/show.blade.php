@extends ('layouts.admin')
@section ('content')
<div  style=" background-color:#f2f2f1 " >
	<fieldset  style="min-width: 0;padding:.35em .625em .75em!important;margin:0 2px;
	border:2px solid silver!important;margin-bottom: 10em;box-shadow: -6px 10px 20px 0px; ">

	<legend  style="width: inherit;padding:inherit;border:2px solid silver;" class="legend" align= "center"  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><div style="color: #112b56"  ><B>Información  de Producto</B></div></legend>
	<div class="container" > 
		<br>
			<div class="row justify-content-center">
        		<div class="col-md-10">
        			<div  style=" background-color:#f2f2f1 " >
						@foreach ($prod as $pro) 
							<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
								<thead style="background-color:#A9D0F5">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="codigo_barra">Código de Barra</label>
											<p>{{$pro->codigo_barra}}</p>
										</div> 
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="nombre_producto">Nombre Producto</label>
											<p>{{$pro->nombre_producto}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="unidad_medida">Unidad de Medida</label>
											<p>{{$pro->unidad_medida}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="margen_ganancia">Margen Ganancia</label>
											<p>{{$pro->margen_ganancia}} %</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="indicacion">Indicación</label>
											<p>{{$pro->indicacion}} </p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="descuento">Descuento</label>
											<p>{{$pro->descuento}} %</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="presentacion">Presentación</label>
											<p>{{$pro->presentacion}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="fecha_registro">Fecha Registro</label>
											<p><?php echo formatoFecha($pro->fecha_registro);?></p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="idproveedor">Proveedor</label>
												@foreach ($proveedor as $prov) 
													@if ($pro->idproveedor==$prov->idproveedor)
														<option value="{{$prov->idproveedor}}" selected>{{$prov->nombre_p}}</option>
													@endif
												@endforeach
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="imagen">Imagen</label>
												<p> <img src="{{asset('imagenes/productos/'.$pro->imagen)}}" alt="$pro->nombre_producto" height="200px" width="200px" class="img-thumbnail"> </p>
										</div> 
									</div>
								</thead>
							</table>
						@endforeach
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!--<a href="{{ route('paciente.pdf') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download"> IMPRIMIR LISTADO DE PACIENTES</span></button></a>-->
				<a href="{{URL::action('ProductoController@index',$pro->idproducto)}}"><button type="button" class="btn btn-danger"><span class="fa fa-retweet" aria-hidden="true" > Regresar</span></button></a>
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