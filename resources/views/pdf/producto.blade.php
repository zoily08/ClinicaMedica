<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LISTADO DE PRODUCTOS</title>
	<style>
		.table {
			width: 100%;
			border: 1px solid #999999;
		}
	</style>
</head>

<u>
<div class="row" style=" background-color: #d3e8ef" >
<div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">

                              <h3 style="text-align:center"><font size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Listado de Productos</p></font></h3>

               </div>

               </div>




                                



</u>

<br>
<body>
	<table class="table">
		<thead>
			<tr>
				
				
				<th>
               <font color="0e4743">NOMBRE PRODUCTO</font></th>

               <th>
               <font color="0e4743">FECHA DE REGISTRO</font></th>

               <th>
               <font color="0e4743">INDICACION</font></th>

               <th>
               <font color="0e4743">PRESENTACIÓN</font></th>

				
				
			</tr>
		</thead>
		<tbody>
			@foreach($productos as $pro)
			<tr>
				
				<td>{{ $pro->nombre_producto }}</td>
				<td>{{ $pro->fecha_registro }}</td>
				<td>{{ $pro->indicacion }}</td>
				<td>{{ $pro->presentacion }}</td>
			
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>