@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Registro de Examen: {{$registroexamen->tipo_examen}}  </h3>
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
    		{!!Form::model($registroexamen, ['method'=>'PATCH', 'url'=>['laboratorio/RegistroExamen', $registroexamen->idregistro_examen]])!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="tipo_examen">Tipo de Examen </label>
					<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-barcode"></i></span>
					<input type="text" name="tipo_examen" required value="{{$registroexamen->tipo_examen}}" onkeypress="return soloLetras(event)" class="form-control" placeholder="Tipo de Examen...">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="precio">Precio</label>
					<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-barcode"></i></span>
					<input type="numeric" name="precio" required value="{{$registroexamen->precio}}" class="form-control" placeholder="Precio...">
				</div>
			</div>
			</div>
				<div class="form-group">
					<label for="nombre_examen">Nombre del Examen</label>
					<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-barcode"></i></span>
					<input type="text" name="nombre_examen" required value="{{$registroexamen->nombre_examen}}" onkeypress="return soloLetras(event)" class="form-control" placeholder="nombre_examen...">
				</div>
			</div>
            <label > (*) Campos Obligatorios</label>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
		</div>

		{!!Form::close()!!}		
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