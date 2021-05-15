<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de Usuario</title>
<link rel="stylesheet" type="text/css" href="css/app.css">
	<link rel="stylesheet" type="text/css" href="css/AdminLTE.css">
	<style>
		.table {
			width: 100%;
			border: 1px solid #999999;
		}
	</style>
	
	

</head>
<body>

		<h1>
	

	Listado de Usuarios
</h1>

<table>
	
	<thead>
		
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Correo</th>

		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			
			<td>{{ $user->id }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
	
</body>
</html>