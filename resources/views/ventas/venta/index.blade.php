@extends('layouts.admin')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
     
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3><FONT FACE="times new roman" size="6" color="0e4743"> Listado de Ventas </FONT> <a > <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus" color="0e4743"></span> 
        </button></a></h3>            
    		@include('ventas.venta.search')
    			{!!Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off'))!!}  
      				{{Form::token()}}
      					<div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          					<div class="modal-dialog modal-lg" role="document">
            					<div class="modal-content"> 
                					<div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                  						<font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Registro de Nueva Venta</p></font>
                    					@if (count($errors)>0)  
                  							<div class="alert alert-danger">   
                  					 			<ul> 
                      								@foreach ($errors->all() as $error)  
                        								<li>{{$error}}</li>  
                      								@endforeach  
                    							</ul>    
                  							</div>  
                						@endif
                    					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        					<span aria-hidden="true">&times;</span>
                     					</button>
                					</div>
                					<div class="modal-body">
                  						<form>
                  							<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
												<div class="form-group">
													<label for="paciente">(*) Paciente:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
  														<select name="idpaciente" id="idpaciente" class="form-control selectpicker" data-live-search="true">
															@foreach($consult as $cons)
																<option value="{{$cons->idpaciente}}">{{$cons->nombre_p}} {{$cons->apellido_p}}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
												<div class="form-group">
													<label for="tipo_comprobante">(*) Tipo Comprobante:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
  														<select name="tipo_comprobante" class="form-control selectpicker" data-live-search="true">
															<option value="Boleta">Boleta</option>
															<option value="Factura">Factura</option>
															<option value="Ticket">Ticket</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
												<div class="form-group"><label for="num_comprobante">(*) Número Comprobante</label>
													<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
														<input type="text" name="num_comprobante" required value="{{old('num_comprobante')}}" class="form-control" placeholder="Número comprobante...">
													</div>
												</div> 
											</div>
											<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
												<div class="form-group">
													<label for="fecha_venta">(*) Fecha Registro:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  													<input class="form-control" type="date" name="fecha_venta" id="fecha_venta"  placeholder="Fecha Registro" max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>">
													</div>
												</div>
											</div>
											<div class="panel panel-primary">
               								 	<div class="panel-body">
               								 		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
														<div class="form-group">
															<label for="pidproducto">(*) Productos:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-medkit"></i></span>
	  															<select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
                       												@foreach($productos as $producto) 
                       													<option value="{{$producto->precio}}_{{$producto->desct}}_{{$producto->margen}}_{{$producto->precio_venta}}_{{$producto->cant_compra}}">{{$producto->producto}}</option>
                   		 											@endforeach  
                   			 									</select> 
															</div>
														</div>
													</div>
               										<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
														<div class="form-group"><label for="precio_compra">(*) Precio Compra</label>
															<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
																<input type="number" disabled name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="P.Compra">
															</div> 
														</div>
													</div>
													<div class="col-lg-3 col-sm-3 col-md-3 col-xs-16">
														<div class="form-group"><label for="precio_venta">(*) Precio Venta</label>
															<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
																<input type="number"  disabled name="pprecio_venta" id="pprecio_venta" class="form-control" step='0.01' placeholder="P. Venta"  > 
															</div>
														</div>
													</div>
													<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
														<div class="form-group"><label for="descuento">(*) Descuento</label>
															<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
																<input type="number" disabled name="pdescuento" id="pdescuento" class="form-control" placeholder="Descuento"  >
															</div>
														</div>
													</div>
													<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
														<div class="form-group"><label for="margen_ganancia">(*) Margen de Ganancia % </label>
															<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-percent fa-fw"></i></span>
																<input type="number" disabled name="pmargen_ganancia" id="pmargen_ganancia" class="form-control" placeholder="Margen"  >
															</div>
														</div>
													</div>
													<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
														<div class="form-group"><label for="cantidad_compra">(*) Cantidad Compra</label>
															<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square fa-fw"></i></span>
																<input type="text"  disabled name="pcantidad_compra" id="pcantidad_compra" class="form-control" placeholder="Cantidad Compra"/>
															</div>
														</div>
													</div>
													<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
														<div class="form-group"><label for="cantidad">(*) Cantidad</label>
															<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square fa-fw"></i></span>
																<input type="text" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad"/>
															</div>
														</div>
													</div>
													<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
														<div class="form-group"><label for="stock">(*) Stock</label>
															<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square fa-fw"></i></span>
																<input type="text"  disabled name="pstok" id="pstock" class="form-control" placeholder="Stock"/>
															</div>
														</div>
													</div>
													<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
														<div class="form-group">
															<button type="button" id="bt_add" class="btn btn-success" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus" color="0e4743"></span></button>

														</div>
													</div>
													<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
														<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
															<thead style="background-color:#A9D0F5">
																<th style="text-align:center" >Opciones</th>
																<th style="text-align:center" >Producto</th>
																<th style="text-align:center" >Cantidad</th>
																<th style="text-align:center" >Precio Venta</th>
																<th style="text-align:center" >Precio Compra</th>
																<th style="text-align:center" >Descuento</th>
																<th style="text-align:center" >M. Ganancia</th>
																<th style="text-align:center" > Stock</th>
																<th style="text-align:center" >SubTotal</th>

															</thead>
															<tfoot>
																<th ></th>
                           										<th></th> 
                           										<th></th> 
                           										<th>TOTAL<h4 id="total">$0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
                           									</tfoot>
															<tbody>
															
															</tbody>
														</table> 
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
             								<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
                								<div class="form-group">
                									<input name="_token" value="{{ csrf_token() }}" type="hidden">
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
   
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" style="text-align:center;">
				<thead style="background-color:#1c779e" >
					<th  style="text-align:left;"><font color="white">FECHA</th>
					<th  style="text-align:left;"><font color="white">PACIENTE</th>
					<th  style="text-align:left;"><font color="white">COMPROBANTE</th> 
					
					<th style="color:#FFFFFF" style="text-align:center;">OPCIONES</th> 
				</thead>
				@foreach ($ventas as $vent)  
				<tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
					<td align="left"><?php echo formatoFecha($vent->fecha_venta);?></td>
					<td align="left"><i class="fa fa-user"></i> {{ $vent-> nombre_p}}</td>
					<td align="left">{{ $vent-> tipo_comprobante.': '.$vent-> num_comprobante}}</td>
					
					<td align="center">
						<a href="{{URL::action('VentaController@show',$vent->idventa)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a>
						<a href="{{URL::action('VentaController@show',$vent->idventa)}}"><button type="button" class="btn btn-info" style="color: white; background-color: #d2691e"><span class="fa fa-pencil"></span></button></a>
						 
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>

@push('scripts')
	<script>
	$(document).ready(function(){
		$('#bt_add').click(function(){
			agregar();
		});
	});
	var cont=0;
	total=0;
   	subtotal=[];
   	precio_venta=0;
   	stock=0;
	$("#guardar").hide();
	$("#pidproducto").change(mostrarValores);
	$("#pcantidad").change(mostrarStock);

	
		function mostrarStock(){
			datosCantidad=document.getElementById('pcantidad').value.split('_');
			datosCompra=document.getElementById('pcantidad_compra').value.split('_');
			stock = (datosCompra-datosCantidad);
			if(datosCompra>=datosCantidad){
				$("#pstock").val(stock);
			} 
			else{
				alert("Error, la cantidad supera la cantidad en compra");
				limpiar2();
			}
		}

		function mostrarValores(){
			datosProducto=document.getElementById('pidproducto').value.split('_');
			$("#pprecio_compra").val(datosProducto[0]);
			$("#pdescuento").val(datosProducto[1]);
			$("#pmargen_ganancia").val(datosProducto[2]);
		    $("#pprecio_venta").val(datosProducto[3]);
			$("#pcantidad_compra").val(datosProducto[4]);

		}

		function redondear(x) {
			return Number.parseFloat(x).toFixed(2);
		} 

		function agregar(){
			datosProducto=document.getElementById('pidproducto').value.split('_');
			idproducto=datosProducto[0];
			producto=$("#pidproducto option:selected").text();
			cantidad=$("#pcantidad").val();
			precio_venta=$('#pprecio_venta').val(); 
			precio_compra=$("#pprecio_compra").val();
			descuento=$("#pdescuento").val();
			margen=$("#pmargen_ganancia").val();
			stock=$("#pstock").val();
			cantcompra=$("#pcantidad_compra").val(); 
			

			if(idproducto!="" && cantidad!="" && cantidad>0 && precio_venta!="" && precio_compra!=""  && descuento!=""  && margen!="" && stock!=""){

				if(cantcompra>=cantidad){
					stock=cantcompra-cantidad;
					subtotal[cont]=((cantidad*precio_venta)-descuento).toFixed(2);
            		total=total+subtotal[cont];

				var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-default" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+producto+'</td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'">'+precio_venta+'</td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'">'+precio_compra+'</td><td><input type="hidden" name="descuento[]" value="'+descuento+'">'+descuento+'</td><td><input type="hidden" name="margen[]" value="'+margen+'">'+margen+'</td><td><input type="hidden" name="stock[]" value="'+stock+'">'+stock+'</td><td>'+subtotal[cont]+'</td></tr>';

 
				cont++;
				limpiar();
				$("#total").html("$ " + total);
				$("#total_venta").val(total);
				evaluar();
				$('#detalles').append(fila);
			} 
			else{
				alert("Error, la cantidad supera la cantidd en compra");
			}
			}
				
			else{
				alert("Error al ingresar el detalle de la venta, revise los datos del producto");
			}
		}

		function limpiar(){
			$("#pcantidad").val("");
			$("#pprecio_compra").val("");
			$("#pprecio_venta").val("");
			$("#pdescuento").val("");
			$("#pmargen_ganancia").val("");
			$("#pstock").val("");
		}
		function limpiar2(){
			$("#pstock").val("");
			$("#pcantidad_compra").val("");
		}

		function evaluar(){
			if(total>=0)
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
			//total2=total-subtotal[index];
			//total2=total*(impuesto/100);
			//total3=total3-subtotal[index];
          	//total3=total+total2;
         	$("#total").html("$/. "+ total);
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
document.getElementById('fecha_venta').value=ano+"-"+mes+"-"+dia;
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