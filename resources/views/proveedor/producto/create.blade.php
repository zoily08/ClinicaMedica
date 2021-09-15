@extends ('layouts.admin')
@section ('contenido')
 {!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}
 <script type="text/javascript">
jQuery(function($) {
      
      $('#fecha_vencimiento').mask('99/99/9999',{placeholder:"dd/mm/yyyy"});
     
   });
</script> 
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Producto</h3>
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
			{!!Form::open(array('url'=>'proveedor/producto','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
				<label for="codigo_barra">(*) Código de Barra:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-barcode"></i></span>
  							<input class="form-control" type="text" name="codigo_barra" placeholder="Código de Barra">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
				<label for="medida">(*) Medida:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-flask"></i></span>
  							<input class="form-control" type="text" name="medida" placeholder="Medida">
					</div>
				</div>
			</div> 
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
				<label for="nombre_producto">(*) Nombre:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-medkit"></i></span>
  							<input class="form-control" type="text" name="nombre_producto" onkeypress="return soloLetras(event)" placeholder="Nombre Producto">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
				<label for="imagen">(*) Imagen:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
  							<input class="form-control" type="file" name="imagen" placeholder="Imagen">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
					<label for="idproveedor">Proveedor:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
							<select name="idproveedor" class="form-control selectpicker" id="idproveedor" data-live-search="true">
								@foreach($proveedor as $prov)
								<option value="{{$prov->idproveedor}}">{{$prov->nombre_p}}</option>
								@endforeach
							</select>
						</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
					<label for="idpresentacion">Presentación:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-th-list"></i></span>
							<select name="idpresentacion" class="form-control selectpicker" id="idpresentacion" data-live-search="true">
								@foreach($presentacion as $pre)
								<option value="{{$pre->idpresentacion}}">{{$pre->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
			</div>
			
			<div class="col-lg-22 col-sm-22 col-md-22 col-xs-12">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">  Guardar </button>
					<button type="reset" class="btn btn-danger"> Cancelar </button>
					
				</div>
			</div>
		</div>
			
			{!!Form::close()!!}

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

    	function soloNumeros(e){
    		key = e.keyCode || e.which;
    		tecla = String.fromCharCode(key).toLowerCase();
    		letras = " 0123456789";
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

		</script>
		 
	@endpush



@endsection