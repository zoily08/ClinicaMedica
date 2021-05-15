@extends('layouts.admin')
@section('contenido')
{!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}
 

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3 style="color:#EE2121" style="background-image: url({{asset ('img/Hospital.jpg')}});" >Listado de Tratamientos <a href="tratamiento/create"><button class="btn btn-success"><span class="fa fa-plus"></span></button></a></h3>
		@include('tratamientos.tratamiento.search') 
	</div>
</div> 

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
		<div type="hidden" class="table-responsive" id="table_list">
			<table class="table table-striped table-bordered table-condensed table-hover" style="text-align:center;" >
				<thead style="background-color:#26A6C8"> 
					<th style="color:#FFFFFF" style="text-align:left" >NOMBRE TRATAMIENTO</th>
					<th style="color:#FFFFFF" style="text-align:left" >TIPO DE TRATAMIENTO</th>
					<th style="color:#FFFFFF" style="text-align:left" >FECHA REGISTRO</th>
					<th style="color:#FFFFFF" style="text-align:center">OPCIONES</th>
				</thead>
				@foreach ($tratamientos as $tra)  
				<tr> 
					<td align="left" >{{ $tra-> nombre_tratamiento}}</td>
					<td align="left" >{{ $tra-> tipo_tratamiento}}</td>
          <td align="left"><?php echo formatoFecha($tra->fecharegistro);?></td>
          
					<td align="center">
						<a href="{{URL::action('ProductoController@show',$tra->idtratamiento)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a>
						<a href="{{URL::action('ProductoController@edit',$tra->idtratamiento)}}"><button type="button" class="btn btn-info"><span class="fa fa-pencil"></span></button></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$tratamientos->render()}}
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
    return date("d-m-Y",strtotime($fecha));
  } 
?>