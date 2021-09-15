@extends('layouts.admin')
@section('content') 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3><FONT FACE="times new roman" size="6" color="0e4743"> Listado de Productos </FONT>

@can('proveedor.producto.create')
			<a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span>  
        </button></a>
<!--<a href='paciente.pdf/1' target="_blank"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download"> VER REPORTE</span></button>
     
   
                         </a>-->


    <a href="{{ route('producto.pdf') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download"> PDF</span></button></a> 
    @endcan
  
  
                        
 
        </h3>           
		{!!Form::open(array('url'=>'proveedor/producto','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
			<div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  				<div class="modal-dialog modal-lg" role="document">
   			 		<div class="modal-content"> 
      					<div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
      						<!--<h3>NUEVO PRODUCTO</h3>-->
      						<font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Registro de Nuevo Producto</p></font>
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
										<label for="codigo_barra">(*) Código de Barra:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-barcode"></i></span>
  										<input class="form-control" type="text" name="codigo_barra" placeholder="Código de Barra">
										</div>
									</div>
								</div> 
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="nombre_producto">(*) Nombre:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-medkit"></i></span>
  										<input class="form-control" type="text" name="nombre_producto" onkeypress="return soloLetras(event)"  onkeyup="vNom(this)" placeholder="Nombre Producto">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro">(*) Fecha Registro:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  										<input class="form-control" type="date" name="fecha_registro" id="fechaActual"  placeholder="Fecha Registro" max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
								 	<div class="form-group">
										<label for="unidad_medida">(*) Unidad de Medida:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-flask"></i></span>
  										<input class="form-control" type="text" name="unidad_medida" placeholder="Unidad de Medida" title="10 ml,15 mg,etc">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
								 	<div class="form-group">
										<label for="margen_ganancia">(*) Margen de Ganancia: ( % )</label><div class="input-group margin-bottom-lg"><span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span> 
  										<input class="form-control" type="number" name="margen_ganancia" placeholder="Margen de Ganancia" title="00%">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
								 	<div class="form-group">
										<label for="indicacion">(*) Indicación:</label><div class="input-group margin-bottom-lg"><span class="input-group-addon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
  										<input class="form-control" type="text" name="indicacion" onkeyup="vNom(this)" placeholder="Indicación" >
										</div>
									</div>
								</div> 
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="idproveedor">(*) Proveedor:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
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
										<label for="presentacion">(*) Presentación:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-th-list"></i></span>
  										<input class="form-control" type="text" name="presentacion" onkeypress="return soloLetras(event)" onkeyup="vNom(this)" placeholder="Presentación" title="Blister, Botella, Pastilla, etc">
										</div>
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
								 	<div class="form-group">
										<label for="descuento">(*) Descuento:  ( % )</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i i class="fa fa-percent" aria-hidden="true"></i></span>
  										<input class="form-control" type="number" name="descuento" placeholder="Descuento" title="00%">
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
								<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">	
								 	<div class="form-group">
										<div class="input-group margin-bottom-sm">
									 	<p class="text-danger">(*) Campos Requeridos</p>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
								<div class="form-group">
									<button class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
									<button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
									<button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
										<span class="fa fa-retweet"></span>
										<span aria-hidden="true">Salir</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
	

			{!!Form::close()!!}

<a href="javascript:viewHide('table_img')"><button type="submit" class="btn btn-Secondary" style="color: white; background-color: #d2691e" >
        <span class="fa fa-list"></span>
</button></a>


<a href="javascript:viewHide('table_list')"><button type="submit" class="btn btn-Secondary" style="color: white; background-color: #498480">
	<span class="fa fa-picture-o"></span>
</button></a>




<!--<a href="javascript:;" onclick="document.getElementById('el_select').style.display='block';">aparece!</a>
<select id="el_select" style="display:none;">
</select>-->



<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
		<div type="hidden" class="table-responsive" id="table_list" style="display:block">
			<table class="table datatable" style="text-align:center;">

			<thead style="background-color:#1c779e">
				<!--<thead style="background-color:#26A6C8">--> 
					<th style="text-align:left;"><font color="white">CÓDIGO DE BARRA</font></th>
					<th style="text-align:left;"><font color="white">NOMBRE</th>
					<th style="text-align:left;"><font color="white">FECHA REGISTRO</th>
					<th style="text-align:center;"><font color="white">ESTADO</th>
					<th style="text-align:center;"><font color="white">OPCIONES</th> 
				</thead>
				@foreach ($productos as $prod)
				<tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
					<td align="left">{{ $prod-> codigo_barra}}</td>
					<td align="left">{{ $prod-> nombre_producto}}</td>
					<td align="left"><?php echo formatoFecha($prod->fecha_registro);?></td>
					<td>
						@if($prod->estado == 'ACTIVO')

						<p class="text-center"><small class="label pull center p1 bg-olive">{{$prod->estado}} </small></p>
            			@else
            			<small class="label pull center p1 bg-red">{{$prod->estado}} </small>
            			@endif

					</td>
					<td align="center">
						@can('proveedor.producto.show')
						<a href="{{URL::action('ProductoController@show',$prod->idproducto)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a>
						@endcan
                        
                        @can('proveedor.producto.edit')
						<a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-producto-edit-{{ $prod->idproducto }}"><i class="fa fa-pencil"></i></a>
						@endcan
                         
                         @can('proveedor.producto.destroy')
						@if($prod->estado == 'ACTIVO')
						<a href="" data-target="#modal-delete-{{$prod->idproducto}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-level-down"></span></button></a>
						@else
						<a href="" data-target="#modal-delete-{{$prod->idproducto}}" data-toggle="modal"><button type="button" class="btn btn-primary mb1 bg-red" style="color: #003366; background-color: #5affab"><span class="fa fa-level-up"></span></button></a> 
						@endif 
						@endcan
						<a class="btn btn-primary" style="color: white; background-color: #678481" data-toggle="modal" href="#modal-imagen-{{ $prod->idproducto }}"><i class="fa fa-picture-o"></i></a>

						
					</td>
				</tr>
				@include('proveedor.producto.modal')
				@include('proveedor.producto.imagen')
				@include('proveedor.producto.edit', ['prod' => $prod])
				
				@endforeach
			</table>
		</div>
		{{$productos->render()}}
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
		<div class="table-responsive" id="table_img" style="display:none;">
			<table class="table table-striped table-bordered table-condensed table-hover" style="text-align:center;">
				<thead style="background-color:#1c779e">
					<th style="text-align:left;"><font color="white">CÓDIGO DE BARRA</th>
					<th style="text-align:left;"><font color="white">NOMBRE</th>
					<th style="text-align:left;"><font color="white">FECHA REGISTRO</th>
					<th style="text-align:center;"><font color="white">ESTADO</th>
					<th style="text-align:center;"><font color="white">IMAGEN</th>
					<th style="text-align:center;"><font color="white">OPCIONES</th>
				</thead>
				@foreach ($productos as $prod)
				<tr>
					<td align="left">{{ $prod-> codigo_barra}}</td>
					<td align="left">{{ $prod-> nombre_producto}}</td>
					<td align="left"><?php echo formatoFecha($prod->fecha_registro);?></td>
					<td>
						@if($prod->estado == 'ACTIVO')

						<p class="text-center"><small class="label pull center p1 bg-olive">{{$prod->estado}} </small></p>
            			@else
            			<small class="label pull bg-red">{{$prod->estado}} </small>
            			@endif

					</td>
					<td align="center">
						<img src="{{asset('imagenes/productos/'.$prod->imagen)}}" alt="$prod-> nombre" height="100px" width="100px" class="img-thumbnail">
					</td>
					<td align="center">
						 @can('proveedor.producto.show')
						<a href="{{URL::action('ProductoController@show',$prod->idproducto)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a>
						 @endcan

						 @can('proveedor.producto.edit')
						<a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-producto-edit-{{ $prod->idproducto }}"><i class="fa fa-pencil"></i></a>
						@endcan
                        
                         @can('proveedor.producto.destroy')
						@if($prod->estado == 'ACTIVO')
						<a href="" data-target="#modal-delete-{{$prod->idproducto}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-level-down"></span></button></a>
						@else
						<a href="" data-target="#modal-delete-{{$prod->idproducto}}" data-toggle="modal"><button type="button" class="btn btn-primary mb1 bg-red" style="color: #003366; background-color: #5affab"><span class="fa fa-level-up"></span></button></a>
						@endif 
						@endcan
						
					</td>
				</tr> 

				@include('proveedor.producto.modal')
				@include('proveedor.producto.edit', ['prod' => $prod])


				@endforeach

			</table>
		</div>
		
		{{$productos->render()}}
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
    	function vNom(solicitar){
    		var txt = solicitar.value;
    		solicitar.value = txt.substring(0,1).toUpperCase() + txt.substring(1,txt.length);
    	}


    	window.onload = function(){
    		var fecha = new Date(); //Fecha actual
    		var mes = fecha.getMonth()+1; //obteniendo mes
    		var dia = fecha.getDate(); //obteniendo dia
    		var ano = fecha.getFullYear(); //obteniendo año
    		if(dia<10)
    			dia='0'+dia; //agrega cero si el menor de 10
    		if(mes<10)
    			mes='0'+mes //agrega cero si el menor de 10
    		document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
    	}

		</script>

 
<script>
var obj=null;
function viewHide(id){
	var targetId, srcElement, targetElement;
	var targetElement = document.getElementById(id);
	if (obj!=null) 
		obj.style.display= '';
		obj=targetElement;
	targetElement.style.display = 'none';
}
</script>



<script>
$(document).ready(function(){
   $("#table_img").click(function(evento){
      if ($("#table_img").attr("submit")){
         $("#table_img").css("display", "block");
      }else{
         $("#table_list").css("display", "none");
      }
   });
});
</script>

<script>

function mostrarOcultarTablas(id){ 
	mostrado=0;
	elem = document.getElementById(id);
	if(elem.style.display=='block')mostrado=1;
	elem.style.display='none';
	if(mostrado!=1)elem.style.display='block';
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
