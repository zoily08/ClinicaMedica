@extends('layouts.admin')
@section('content') 

{!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}

  {!!Html::script('js/jquery-1.9.0.min.js')!!}
   {!!Html::script('js/sweetalert.min.js')!!}
   {!!Html::style('css/sweetalert.css')!!}
    {!!Html::script('js/jquery-1.7.2.min.js')!!}
     {!!Html::script('js/jquery.numeric.js')!!}
   {!!Html::script('js/jquery.mask.min.js')!!}

<script type="text/javascript">

 
jQuery(function($) { 
      $('input,form').attr('autocomplete','off');
      $("#telefono_p").mask("0000-0000",{placeholder: '0000-0000'} );
      //$('textarea,form').attr('autocomplete','off');
   }); 
</script>
<div class="row"> 
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3><FONT FACE="times new roman" size="6" color="0e4743"> Listado de Proveedores </FONT>
@can('proveedor.registro.create')
			<a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span> 
        </button></a>


        <a href="{{ route('proveedor.pdf') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download"> PDF</span></button></a>
        @endcan


        </h3>         
		{!!Form::open(array('url'=>'proveedor/registro','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  				<div class="modal-dialog modal-lg" role="document">
   			 		<div class="modal-content">
      					<div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
      						<!--<h3>Nuevo Proveedor</h3>-->
      						<font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Registro de Nuevo Proveedor</p></font>
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
										<label for="nombre_empresa">(*) Nombre Empresa:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-building"></i></span>
  										<input class="form-control" type="text" name="nombre_empresa" id="nombre_empresa" onkeypress="return soloLetras(event)" onkeyup="vNom(this)" placeholder="Nombre Empresa">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="registro_sanitario">(*) Registro Sanitario:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
  										<input class="form-control" type="text" name="registro_sanitario" id="registro_sanitario"  placeholder="Registro Sanitario">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="direccion_p">(*) Dirección Proveedor:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
  										<input class="form-control" type="text" name="direccion_p" id="direccion_p" onkeyup="vNom(this)" placeholder="Dirección">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="telefono_p">(*) Teléfono Proveedor:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
  										<input class="form-control" type="text" name="telefono_p" id="telefono_p"  placeholder="Teléfono" title="2222-2222">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="nombre_p">(*) Nombre Visitador:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
  										<input class="form-control" type="text" name="nombre_p" id="nombre_p" onkeypress="return soloLetras(event)" onkeyup="vNom(this)" placeholder="Nombre">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="fecha_registro_p">(*) Fecha Registro:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  										<input class="form-control" type="date" name="fecha_registro_p" id="fecha_registro_p"  placeholder="Fecha Registro" max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>">
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
							<div class="col-lg-22 col-sm-22 col-md-22 col-xs-12">
								<div class="form-group">
									<div style="text-align: right;">
										<button  class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
										<button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
										<button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> <span class="fa fa-retweet"></span><span aria-hidden="true">Salir</span></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			
			{!!Form::close()!!}
		<!--<h3>Listado de Proveedores <a href="registro/create"><button class="btn btn-success"> Nuevo </button></a></h3>-->
		

<div class="row"> 
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
		<div class="table-responsive">
			<table class="table datatable" style="text-align:center;" >
			<thead style="background-color:#1c779e">
					<th style="text-align:left;"><font color="white" >NOMBRE EMPRESA</th>
					<th style="text-align:left;"><font color="white" >NOMBRE VISITADOR</th>
					<th style="text-align:left;"><font color="white" >FECHA REGISTRO</th>
					<th style="text-align:center;"><font color="white" >ESTADO</th>
					<th style="text-align:center;"><font color="white" >OPCIONES</th>
				</thead>
				@foreach ($proveedors as $pro)
				<tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
					<td align="left"><i class="fa fa-building"></i> {{ $pro-> nombre_empresa}}</td>
					<td align="left"><i class="fa fa-user fa-fw"></i>{{ $pro-> nombre_p}}</td>
					<td align="left"><?php echo formatoFecha($pro->fecha_registro_p);?></td>
					<td>
						@if($pro->estado_p == 'ACTIVO')

						<p class="text-center"><small class="label pull center p1 bg-olive">{{$pro->estado_p}} </small></p>
            			@else
            			<small class="label pull bg-red">{{$pro->estado_p}} </small>
            			@endif

					</td>
					<td align="center">
						@can('proveedor.registro.show')
						<a href="{{URL::action('ProveedorController@show',$pro->idproveedor)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a>
						@endcan 

						@can('proveedor.registro.edit')
						<a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-proveedor-edit-{{ $pro->idproveedor }}"><i class="fa fa-pencil"></i></a>
						@endcan


                        @can('proveedor.registro.destroy')
						@if($pro->estado_p == 'ACTIVO')
						<a href="" data-target="#modal-delete-{{$pro->idproveedor}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-level-down"></span></button></a>
						@else
						<a href="" data-target="#modal-delete-{{$pro->idproveedor}}" data-toggle="modal"><button type="button" class="btn btn-primary mb1 bg-red" style="color: #003366; background-color: #5affab"><span class="fa fa-level-up"></span></button></a>
						@endif 
						@endcan

					</td>
				</tr>

				@include('proveedor.registro.edit', ['pro' => $pro])
				@include('proveedor.registro.modal')
				@endforeach
			</table>
		</div>
		{{$proveedors->render()}}
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
    		letras = " 0123456789-";
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
        document.getElementById('fecha_registro_p').value=ano+"-"+mes+"-"+dia;
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