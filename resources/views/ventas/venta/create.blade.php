@extends ('layouts.admin')
@section ('content')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3 style="color:#EE2121" >Nueva Venta</h3>
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
			{!!Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}} 
		<div class="row">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label for="paciente">Paciente</label>
					<select name="idpaciente" id="idpaciente" class="form-control selectpicker" data-live-search="true">
						@foreach($consult as $cons)
						<option value="{{$cons->idpaciente}}">{{$cons->nombre_p}} {{$cons->apellido_p}}</option>
						@endforeach
					</select>
				</div>  
			</div>
			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
				<div class="form-group">
					<label>Tipo Comprobante</label>
					<select name="tipo_comprobante" class="form-control selectpicker" data-live-search="true">
							<option value="Boleta">Boleta</option>
							<option value="Factura">Factura</option>
							<option value="Ticket">Ticket</option>
					</select>
				</div>
			</div>
			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
				<div class="form-group">
					<label for="num_comprobante">Número Comprobante</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
					<input type="text" name="num_comprobante" required value="{{old('num_comprobante')}}" class="form-control" placeholder="Número comprobante...">
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label for="fecha_vencimiento"><span>Fecha Registro</span></label>
                     	<div class="input-group margin-bottom-sm">
                      		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        		<input class="form-control"  type="date" name="fecha_vencimiento"  id="fechaActual" required value="{{old('fecha_vencimiento')}}"  placeholder="fecha_vencimiento">
                        </div>
                </div>
            </div>
			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                <div class="form-group">
                	<label>Tiene Impuesto:</label>
               		<!--<select  name="pimpuesto" id="pimpuesto"  class="form-control selectpicker" data-live-search="true">-->
               		<select  name="pimpuesto"  id="pimpuesto"  class="form-control selectpicker" data-live-search="true" onchange="if(this.value=='SI') document.getElementById('impuesto').disabled = false">
               			<option value>SELECCIONE</option>
             			<option value="SI">SI</option>
             			<option value="NO">NO </option>
             		</select>
            	</div>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            	<div class="form-group">
              		<label for="impuesto">Impuesto:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                    <input class="form-control" type="text" name="impuesto" id="impuesto" placeholder="IVA %" disabled >
              		</div> 
            	</div>
            </div>
		</div>
		<div class="row">
			<div class="panel panel-primary"> 
				<div class="panel-body">
					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                  		<div class="form-group">
                    		<label>Productos</label>
                     			<select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
                        		@foreach($productos as $producto) 
                        		<option value="{{$producto->idproducto}}_{{$producto->precio}}_{{$producto->desct}}">{{$producto->producto}}</option>
                       		 	@endforeach
                    			 </select> 
                  		</div> 
               		</div>
               		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label for="pprecio_compra">Precio Compra</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
							<input type="number" disabled name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="P.Compra">
							</div> 
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label for="cantidad">Cantidad</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square fa-fw"></i></span>
							<input type="text" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad" onKeyDown="CalcularPrecio()"/>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label for="precio_venta">Precio Venta</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
							<input type="number" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="P. Venta"  > 
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
						<div class="form-group">
							<label for="pdescuento">Descuento</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
								<input type="number" disabled name="pdescuento" id="pdescuento" class="form-control" placeholder="Descuento"  >
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
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
									<th style="text-align:center" >Precio Venta</th>
									<th style="text-align:center" >Descuento</th>								
								</thead>
								<tfoot>
									

									<th></th>
                           			<th></th> 
                           			<th>SUBTOTAL<h4 id="total">$/ 0.00</h4></th>
                           			<th>TOTAL<h4 id="total3">$/ 0.00</h4></th>
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
	total=0;
   	total2=0;
  	total3=0;
   	subtotal=[];
   	precio_venta=0;
	$("#guardar").hide();
	$("#pidproducto").change(mostrarValores);
	$('#pprecio_venta').change(calcularPrecio);
	


		function mostrarValores(){
			datosProducto=document.getElementById('pidproducto').value.split('_');
			$("#pprecio_compra").val(datosProducto[1]);
			$("#pdescuento").val(datosProducto[2]);
		}

		

		function calcularPrecio(){
			var cantidad= document.getElementById('pcantidad').options.text;
			var precio= document.getElementById('pprecio_compra').options.selectedIndex;
			var Precio= document.getElementById('pprecio_compra').options[precio].text;

           precio_venta= Precio * Cantidad;


				precio_compra=$("#pprecio_compra").val();
				cantidad=$("#pcantidad").val();

				var precio_venta=0;

				precio_venta=cantidad*precio_compra
				
    			
   				document.getElementById('#pprecio_venta').innerHTML = precio_venta;			}

		function agregar(){
			datosProducto=document.getElementById('pidproducto').value.split('_');

			idproducto=datosProducto[0];
			producto=$("#pidproducto option:selected").text();
			precio_compra=$("#pprecio_compra").val();
			cantidad=$("#pcantidad").val();
			precio_venta=$('#pprecio_venta').val();
			descuento=$("#pdescuento").val();

			if(idproducto!="" && cantidad!="" && cantidad>0 && precio_venta!="" && descuento!="" && descuento>0){
				
					subtotal[cont]=((cantidad*precio_venta)-descuento);
            		total=total+subtotal[cont];
            		total2=total*0.13;
           	 		total3=total+total2;

				var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+producto+'</td><td>'+cantidad+'</td><td>'+precio_venta+'</td><td>'+descuento+'</td><td>'+subtotal[cont]+'</td></tr>';
				cont++;
				limpiar();
            	$("#total").html("$/. " + total);
           		$("#total2").html("$/. " + total2);
            	$("#total3").html("$/. " + total3);

				evaluar();
				$('#detalles').append(fila);
			}
				
				
			else{
				alert("Error al ingresar el detalle de la venta, revise los datos del producto");
			}
		}

		function limpiar(){
			$("#pcantidad").val("");
			$("#pprecio_venta").val("");
			$("#pdescuento").val("");
		}

		function evaluar(){
			if(total2>0)
			{
				$("#guardar").show();
			}
			else
			{
				$("#guardar").hide();
			}
		}

		function eliminar(index){
			total=total-subtotal[index];
         	total2=total2-total[index];
         	$("#total").html("$/. "+ total);
          	$("#total2").html("$/. "+ total2);
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
