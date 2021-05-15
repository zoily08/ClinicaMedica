@extends ('layouts.admin')
@section('contenido')
{!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}
 <script type="text/javascript">
jQuery(function($) {
      
      $('#date').mask('99/99/9999',{placeholder:"mm/dd/yyyy"});
      $('#telefono_p').mask('9999-9999');
     
   });
</script>  

	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Examenes<a > <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" ><span class="fa fa-plus"></span> 
   		 	</button></a></h3>  
   		 	@include('laboratorio.Examen.search')
		{!!Form::open(array('url'=>'laboratorio/Examen','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			
  				<div class="modal-dialog" role="document">
   			 		<div class="modal-content">
      					<div class="modal-header">
      					<div class="modal-header">
      						<h3>Nuevo Examen</h3> 
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

      							<div class="form-group">
									<label for="idregistro_examen">Nombre del Examen:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
										<select name="idregistro_examen" class="form-control selectpicker" id="idregistro_examen" data-live-search="true">
											@foreach($registro_examen as $reg)
												<option value="{{$reg->idregistro_examen}}">{{$reg->nombre_examen}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="idpaciente">Paciente:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
										<select name="idpaciente" class="form-control selectpicker" id="idpaciente" data-live-search="true">
											@foreach($paciente as $pac)
												<option value="{{$pac->idpaciente}}">{{$pac->nombre_p}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="idpaciente">Usuario:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
										<select name="idusuario" class="form-control selectpicker" id="idusuario" data-live-search="true">
											@foreach($usuario as $us)
												<option value="{{$us->idusuario}}">{{$us->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
      					</form>
						</div>


				<label > (*) Campos Obligatorios</label>
			
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
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
				<thead style="background-color:#a9dff5">
					<th style="text-align:center">Nombre Examen</th>
					<th style="text-align:center">Paciente</th>
					<th style="text-align:center">Usuario</th>
				</thead>
				@foreach ($examen as $exa)
				<tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
					<td>{{ $exa->nombre_examen}}</td>
					<td>{{ $exa-> nombre_p}}</td>
					<td>{{ $exa-> nombre}}</td>
					<td>
						<a href="{{URL::action('ExamenController@show',$exa->idexamen)}}"><button type="button" class="btn btn-default "><span class="fa fa-eye"></span></button></a>
						<a href="{{URL::action('ExamenController@edit',$exa->idexamen)}}"><button type="button" class="btn btn-warning"><span class="fa fa-pencil"></span></button></a>
						<a href="" data-target="#modal-delete-{{$exa->idexamen}}" data-toggle="modal"><button type="button" class="btn btn-danger"><span class="fa fa-trash"></span></button></a>
					</td>
				</tr>
				@include('laboratorio.Examen.modal')
				@endforeach
			</table>
		</div>
		{{$examen->render()}}
	</div>
</div>
			
@endsection
