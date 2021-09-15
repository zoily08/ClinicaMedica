@extends ('layouts.admin')
@section ('contenido')
 {!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar: {{$tratamiento->nombre_producto}}  </h3>
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
	{!!Form::model($tratamiento, ['method'=>'PATCH', 'url'=>['proveedor/producto', $producto->idproducto],'files'=>'true'])!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="codigo_barra">(*) Código de Barra:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-barcode"></i></span>
					<input type="text" name="codigo_barra" required value="{{$producto->codigo_barra}}" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="medida">(*) Medida:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-flask"></i></span>
					<input type="text" name="medida" required value="{{$producto->medida}}" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre_producto">(*) Nombre:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-medkit"></i></span>
					<input type="text" name="nombre_producto"  required value="{{$producto->nombre_producto}}" onkeypress="return soloLetras(event)" class="form-control">
					</div>
			</div>
		</div> 
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Proveedor:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
				<select name="idproveedor" class="form-control">
					@foreach ($proveedor as $prov)
						@if ($prov->idproveedor==$producto->idproveedor)
							<option value="{{$prov->idproveedor}}" selected>{{$prov->nombre_p}}</option>
						@else
							<option value="{{$prov->idproveedor}}">{{$prov->nombre_p}}</option>
						@endif
					@endforeach
				</select>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Presentacion:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-th-list"></i></span>
				<select name="idpresentacion" class="form-control">
					@foreach ($presentacion as $pre)
						@if ($pre->idpresentacion==$producto->idpresentacion)
							<option value="{{$pre->idpresentacion}}" selected>{{$pre->nombre}}</option>
						@else
							<option value="{{$pre->idpresentacion}}">{{$pre->nombre}}</option>
						@endif
					@endforeach
				</select>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
			<label>(*) Imagen:</label></label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-picture-o" ></i></span>
				<input type="file" min="200px" max="200px" name="imagen"  class="form-control">
					@if (($producto->imagen)!="")
						<img src="{{asset('imagenes/productos/'.$producto->imagen)}}">
					@endif
				</div>
			</div>
		</div>
			<div class="col-lg-22 col-sm-22 col-md-22 col-xs-12">
				<div class="form-group">
					<button type="submit" class="btn btn-primary"> Guardar </button>
					<button type="reset" class="btn btn-danger">  Cancelar </button>
					
				</div>
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