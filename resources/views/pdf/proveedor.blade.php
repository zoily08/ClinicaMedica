<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LISTADO DE PROVEEDORES</title>
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

                              <h3 style="text-align:center"><font size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Listado de Proveedores</p></font></h3>

               </div>

               </div>




                                



</u>

<br>
<body>
	<table class="table">
		<thead>
			<tr>
				
				
				<th>
               <font color="0e4743">NOMBRE EMPRESA</font></th>

               <th>
               <font color="0e4743">NOMBRE VISITADOR</font></th>

               <th>
               <font color="0e4743">DIRECCIÓN</font></th>

               <th>
               <font color="0e4743">TELÉFONO</font></th>

				
				
			</tr>
		</thead>
		<tbody>
			@foreach($proveedors as $pro)
			<tr>
				
				<td>{{ $pro->nombre_empresa }}</td>
				<td>{{ $pro->nombre_p }}</td>
				<td>{{ $pro->direccion_p }}</td>
				<td>{{ $pro->telefono_p }}</td>
			
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>