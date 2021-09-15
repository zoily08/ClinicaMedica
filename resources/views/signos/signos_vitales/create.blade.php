@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Signos Vitales</h3>
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
			{!!Form::open(array('url'=>'consulta/consulta_medica','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}} 
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
				<div class="form-group">
					<label for="idpaciente">Paciente</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-street-view"></i></span>
					<select name="idpaciente" class="form-control selectpicker" id="idpaciente" data-live-search="true">
						@foreach($paciente as $pac)
						<option value="{{$pac->idpaciente}}">{{$pac->nombre_p}}</option>
						@endforeach
					</select>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="temperatura">(*) Temperatura</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-magic"></i></span>
  						<input type="number" name="temperatura" class="form-control" placeholder="Temperatura">
  					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="presion">(*) Presion</label>
				<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-stethoscope"></i></span>
					<input type="text" name="presion" class="form-control" placeholder="Presion">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="peso">(*) Peso</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
					<input type="text" name="peso" class="form-control" placeholder="Peso">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="estatura">(*)Estatura</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-male"></i></span>
					<input type="text" name="estatura" class="form-control" placeholder="Estatura...">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="fecha_consulta">(*) Fecha Consulta</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input type="date" name="fecha_consulta"  class="form-control" placeholder="Fecha Consulta...">
					</div>
				</div>
			</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
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
					<label > (*) Campos Obligatorios</label>
			</div>
			
			<div class="col-lg-22 col-sm-22 col-md-22 col-xs-12">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
		</div>
			
			{!!Form::close()!!}
			
@endsection
