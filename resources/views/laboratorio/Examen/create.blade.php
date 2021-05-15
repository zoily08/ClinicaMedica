@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Examenes</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		
			{!!Form::open(array('url'=>'laboratorio/Examen','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="idregistro_examen">(*) Paciente</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-street-view"></i></span>
					<select name="idregistro_examen" class="form-control selectpicker" id="idregistro_examen" data-live-search="true">
						@foreach($registro_examen as $reg)
						<option value="{{$reg->idregistro_examen}}">{{$reg->idregistro_examen+$reg->tipo_examen}}</option>
						@endforeach
					</select>
					</div>
				</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="idpaciente">(*) Paciente</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-street-view"></i></span>
					<select name="idpaciente" class="form-control selectpicker" id="idpaciente" data-live-search="true">
						@foreach($paciente as $pac)
						<option value="{{$pac->idpaciente}}">{{$pac->nombre_p}}</option>
						@endforeach
					</select>
					</div>
				</div>
					<div class="form-group">
					<label for="idusuario">Usuario</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<select name="idusuario" class="form-control selectpicker" id="idusuario" data-live-search="true">
						@foreach($usuario as $us)
						<option value="{{$us->idusuario}}">{{$us->nombre}}</option>
						@endforeach
					</select>
					</div>
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
