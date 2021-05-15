<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LISTADO DE USUARIOS</title>
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

                              <h3 style="text-align:center"><font size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Listado de Usuarios</p></font></h3>

               </div>

               </div>




                                



</u>

<br>


<body>
	<table class="table">
		<thead>
			<tr>
				<!--<th>ID</th>-->
				<th >
				 <font color="0e4743">NOMBRES</font></th>

				<th>
				<font color="0e4743">CORREO ELECTRONICO</font></th>


				<th>
				<font color="0e4743">TELEFONO</font></th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<!--<td>{{ $user->id }}</td>-->
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->telefono }}</td>
			
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>