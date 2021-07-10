@extends ('layouts.admin')
@section ('content') 
<div  style=" background-color:#f2f2f1 " >
	<fieldset  style="min-width: 0;padding:.35em .625em .75em!important;margin:0 2px;
	border:2px solid silver!important;margin-bottom: 10em;box-shadow: -6px 10px 20px 0px; ">

	<legend  style="width: inherit;padding:inherit;border:2px solid silver;" class="legend" align= "center"  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><div style="color: #112b56"  ><B>Información  del Consultorio</B></div></legend>
		<div class="container" > 
 			<br>
    			<div class="row justify-content-center">
        			<div class="col-md-10">
        				<div  style=" background-color:#f2f2f1 " >
        					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
        						<thead style="background-color:#A9D0F5">
        							<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="nombre">NOMBRE DEL MEDICO:</label>
												<p>{{$medico->nombre}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="nombre">APELLIDOS DEL MEDICO:</label>
												<p>{{$medico->apellido}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="nombre">TELEFONO DEL MEDICO:</label>
												<p>{{$medico->telefono}}</p>
										</div>
									</div>
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group">
											<label for="nombre">DIRECCION DEL MEDICO:</label>
												<p>{{$medico->direccion}}</p>
										</div>
									</div>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</fieldset>
	</div> 
@endsection

