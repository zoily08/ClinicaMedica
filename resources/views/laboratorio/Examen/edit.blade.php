@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Registro de Examen: {{$examen->idexamen}}  </h3>
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
    		{!!Form::model($examen, ['method'=>'PATCH', 'url'=>['laboratorio/Examen', $examen->idexamen]])!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="idregistro_examen">Tipo de Examen </label>
					<input type="text" name="idregistro_examen" required value="{{$examen->idregistro_examen}}" class="form-control" placeholder="Tipo de Examen...">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="idpaciente">Paciente</label>
					<input type="text" name="idpaciente" required value="{{$examen->idpaciente}}" class="form-control" placeholder="paciente...">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="idusuario">Usuario</label>
					<input type="text" name="idusuario" required value="{{$examen->idusuario}}" class="form-control" placeholder="Usuario...">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
		</div>
		{!!Form::close()!!}		
@endsection