@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Registro de Examenes</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		
			{!!Form::open(array('url'=>'laboratorio/RegistroExamen','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	
				<div class="form-group">
					<label for="tipo_examen">(*) Tipo de Examen</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-magic"></i></span>
  						<input type="text" name="tipo_examen"  class="form-control" placeholder="Tipo de examen">
  					</div>
				</div>
				<div class="form-group">
					<label for="precio">(*) Precio</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-magic"></i></span>
  						<input type="text" name="precio"  class="form-control" placeholder="$Precio">
  					</div>
				</div>
				<label > (*) Campos Obligatorios</label>
			
			
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
		</div>
		
			
			{!!Form::close()!!}
			
@endsection
