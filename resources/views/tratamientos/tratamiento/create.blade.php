@extends ('layouts.admin')
@section ('contenido')
{!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3 style="color:#EE2121" >Nuevo Tratamiento</h3>
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
			{!!Form::open(array('url'=>'tratamientos/tratamiento','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}  
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="paciente">(*) Paciente</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
					<select name="idpaciente" id="idpaciente" class="form-control selectpicker" data-live-search="true">
						@foreach($pacientes as $paciente)
						<option value="{{$paciente->idpaciente}}">{{$paciente->nombre_p}}</option>
						@endforeach
					</select>  
					</div> 
				</div>  
			</div> 
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="nombre_tratamiento">(*) Nombre Tratamiento:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil"></i></span>
  						<input class="form-control" type="text" name="nombre_tratamiento" id="nombre_tratamiento" placeholder="Nombre de Tratamiento">
					</div>
				</div>  
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label for="tipo_tratamiento">(*) Tipo Tratamiento:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
						<select name="tipo_tratamiento" id="tipo_tratamiento" class="form-control">
							<option value="Diario">Diario</option>
							<option value="Semanal">Semanal</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label for="fecharegistro">(*) Fecha Registro:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  						<input class="form-control" type="date" name="fecharegistro" id="fechaActual"  placeholder="Fecha Registro">
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label for="diagnostico">(*) Diagnostico</label></label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-stethoscope"></i></span>
					<select name="iddiagnostico" id="iddiagnostico" class="form-control selectpicker" data-live-search="true">
						@foreach($diagnostico as $diag)
						<option value="{{$diag->iddiagnostico}}">{{$diag->detalle}}</option>
						@endforeach
					</select>
					</div>
				</div>  
			</div>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="form-group">
					<label for="otros">(*) Otros:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
  						<textarea class="form-control" type="text" name="otros" id="otros" rows="5" cols="50" placeholder="Otros"></textarea>
					</div>
				</div>
			</div>    
		</div>

		<div class="row">
			<div class="panel panel-primary"> 
				<div class="panel-body">
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  		<div class="form-group">
                    		<label for="producto">(*) Productos</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                     		<select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
									@foreach($productos as $producto)
										<option value="{{$producto->idproducto}}_{{$producto->exist}}">{{$producto->producto}}</option>
									@endforeach
							</select>
                  		 	</div> 
               		  	</div>
               		</div>
               		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label for="cantidad">(*) Cantidad:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square fa-fw"></i></span>
  							<input class="form-control" type="number" name="pcantidad" id="pcantidad" placeholder="Cantidad">
							</div>
						</div>  
					</div>
               		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label for="stock">(*) Stock:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square fa-fw"></i></span>
  							<input class="form-control" type="number" disabled name="pstock" id="pstock" placeholder="Stock">
							</div>
						</div>  
					</div>
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
							<button type="button" id="bt_add" class="btn btn-success"><span class="fa fa-plus"></span></button>
						</div>
					</div>
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
								<thead style="background-color:#A9D0F5">
									<th style="text-align:center" >Opciones</th>
									<th style="text-align:center" >Producto</th>
									<th style="text-align:center" >Cantidad</th>								
								</thead>
								<tfoot>
									

									<th></th>
                           			<th></th> 
                           			
								</tfoot>
								<tbody>
									
								</tbody>
							</table> 
						</div>
					</div>
				</div>
			 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            	<div class="form-group">
               		<input name="_token" value="{{csrf_token() }}" type="hidden">
               		<button class="btn btn-primary" type="submit">Guardar</button>
               		<button class="btn btn-danger" type="reset">Cancelar</button>
           	 	</div>
         	</div>
		</div>
			
			{!!Form::close()!!}
	@push('scripts')
	<script>
	$(document).ready(function(){
      $('#bt_add').click(function(){
         agregar();
      });
   });

   var cont=0; 
   
   $("#guardar").hide();
   $("#pidproducto").change(mostrarValores);

		function mostrarValores(){
			datosProducto=document.getElementById('pidproducto').value.split('_');
			$("#pstock").val(datosProducto[1]);
		}

		function agregar(){
			datosProducto=document.getElementById('pidproducto').value.split('_');

			idproducto=datosProducto[0];
			producto=$("#pidproducto option:selected").text();
			cantidad=$('#pcantidad').val();
			

			if(idproducto!="" && cantidad!="" && cantidad>0){

				if(cantidad<=stock){

					var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td></tr>';

					cont++;
					
					evaluar();
					$('#detalles').append(fila);
					limpiar();
				}
				else{
					alert ('La cantidad a recetar supera el stock');
				}
			}
					
			else{
				alert("Error al ingresar el detalle de la venta, revise los datos del producto");
			}
		}

		function limpiar(){
			
					
		}

		function evaluar(){
			if(cantidad>0)
			{
				$("#guardar").show();
			}
			else
			{
				$("#guardar").hide();
			}
		}

		
		function eliminar(index){
         	$("#fila" + index).remove();
         	evaluar();
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
	@endpush
@endsection


