@extends ('layouts.admin')
@section ('contenido')
 {!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}
 <script type="text/javascript">
jQuery(function($) {
      
      $('#date').mask('99/99/9999',{placeholder:"mm/dd/yyyy"});
      $('#telefono_p').mask('9999-9999');
     
   });
</script> 
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color:#A9D0F5">
							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
								<div class="form-group">
									<label for="codigo_barra">Código de Barra</label>
										<p>{{$prod->codigo_barra}}</p>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
								<div class="form-group">
									<label for="nombre_producto">Nombre Producto</label>
										<p>{{$prod->nombre_producto}}</p>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
								<div class="form-group">
									<label for="medida">Medida</label>
										<p>{{$prod->medida}}</p>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
								<div class="form-group">
									<label for="fecha_registro">Fecha Registro</label>
										<p><?php echo formatoFecha($prod->fecha_registro);?></p>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
								<div class="form-group">
									<label for="imagen">Imagen</label>
										<p> <img src="{{asset('imagenes/productos/'.$prod->imagen)}}" alt="$prod-> nombre_producto" height="200px" width="200px" class="img-thumbnail"> </p>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
								<div class="form-group">
									<label for="idpresentacion">Presentación</label>
										@foreach ($presentacion as $pre)
											@if ($pre->idpresentacion==$prod->idpresentacion)
												<option value="{{$pre->idpresentacion}}" selected>{{$pre->nombre}}</option>
											@else
												<option value="{{$pre->idpresentacion}}">{{$pre->nombre}}</option>
											@endif
										@endforeach
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
								<div class="form-group">
									<label for="idproveedor">Proveedor</label>
										@foreach ($proveedor as $prov)
											@if ($prov->idproveedor==$prod->idproveedor)
												<option value="{{$prov->idproveedor}}" selected>{{$prov->nombre_p}}</option>
											@else
												<option value="{{$prov->idproveedor}}">{{$prov->nombre_p}}</option>
											@endif
										@endforeach
								</div>
							</div>
						</thead>
					</table>
				</div>
			</div>
		</div>
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