@extends ('layouts.admin')
@section('contenido')
{!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}



 <script type="text/javascript">
jQuery(function($) {
      
      $('#date').mask('99/99/9999',{placeholder:"mm/dd/yyyy"});
      $('#telefono_p').mask('9999-9999');
     
   });
</script> 


	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Examenes<a > <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" ><span class="fa fa-plus"></span> 
   		 	</button></a></h3>

			@include('laboratorio.RegistroExamen.search')
   		 	{!!Form::open(array('url'=>'laboratorio/RegistroExamen','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  				<div class="modal-dialog" role="document">
   			 		<div class="modal-content">
   			 		<div class="modal-header">
      						<h3>Nuevo Examen</h3> 
      							@if (count($errors)>0)
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{$error}}</li>
											@endforeach
										</ul> 
									</div>
								@endif
        					<!--<h5 class="modal-title" id="exampleModalLabel">Nueva Categoría</h5>-->
        						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          							<span aria-hidden="true">&times;</span>
       							 </button>
      					</div>
      					<div class="modal-body">
      					<form>	
							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
								<div class="form-group">
									<label for="tipo_examen">(*) Tipo  Examen :</label>
										<div class="input-group margin-bottom-sm">
		  								<span class="input-group-addon"><i class="fa fa-magic"></i></span>
		  								<input type="text-align" name="tipo_examen" class="form-control" placeholder="Tipo de Examen">
		  								</div>
								</div>
							</div>		
							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
								<div class="form-group">
									<label for="precio">(*) Precio del Examen :</label>
										<div class="input-group margin-bottom-sm">
		  								<span class="input-group-addon"><i class="fa fa-magic"></i></span>
		  								<input type="number" name="precio" class="form-control" placeholder="Precio del Examen">
		  								</div>
								</div>
							</div>
								<div class="form-group">
									<label for="nombre_examen">(*) Nombre del Examen:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-medkit"></i></span>
  									<input class="form-control" type="text" name="nombre_examen" onkeypress="return soloLetras(event)" placeholder="Nombre del Examen">
									</div>
								</div>
      					</form>
      					<label > (*) Campos Obligatorios</label>
      					</div>
      					<div class="modal-footer">
								<div class="form-group">
									<button type="submit" class="btn btn-primary">  Guardar </button>
									<button type="reset" class="btn btn-danger"> Cancelar </button>
					
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
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" style="text-align:center;">
				<thead style="background-color:#a9dff5">
					<th style="text-align:center">Tipo de Examen</th>
					<th style="text-align:center">Precio</th>
					<th style="text-align:center">Nombre del Examen</th>
					<th style="text-align:center">Fecha de Registro</th>
				</thead>
				@foreach ($registroexamen as $reg)
				<tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
					<td>{{ $reg->tipo_examen}}</td>
					<td>{{ $reg->precio}}</td>
					<td>{{ $reg->nombre_examen}}</td>
					<td ><?php echo formatoFecha($reg->fecha_examen);?></td>
					<td>
						<a href="{{URL::action('RegistroExamenController@show',$reg->idregistro_examen)}}"><button type="button" class="btn btn-default "><span class="fa fa-eye"></span></button></a>
						<a href="{{URL::action('RegistroExamenController@edit',$reg->idregistro_examen)}}"><button type="button" class="btn btn-warning"><span class="fa fa-pencil"></span></button></a>
						<a href="" data-target="#modal-delete-{{$reg->idregistro_examen}}" data-toggle="modal"><button type="button" class="btn btn-danger"><span class="fa fa-trash"></span></button></a>
					</td>
				</tr>
				@include('laboratorio.RegistroExamen.modal')
				@endforeach
			</table>
		</div>
		{{$registroexamen->render()}}
	</div>
</div>
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