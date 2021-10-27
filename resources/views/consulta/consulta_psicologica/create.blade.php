@foreach($consultap as $conp) 
	<div data-backdrop="static" class="modal" id="exampleModal-{{$conp->idpaciente}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
		<div class="modal-dialog modal-lg" role="document"> 
   			<div class="modal-content"> 
      			<div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
      				<font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Registro Consulta Psicologica</p></font>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
       					</button> 
       			</div>
       			 {!! Form::open(['route'=>'consulta_psicologica.store','method'=>'POST','autocomplete'=>'off']) !!}
       						<div class="modal-body">  
      							<form> 
      								<div class="row"  style="background-color: #f2f2f1">
      									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      										<div class="form-group">
      											<label for="idpaciente">Paciente</label>
      												<div class="input-group margin-bottom-sm">
  														<span class="input-group-addon"><i class="fa fa-street-view"></i></span>
														<label name="idpaciente" class="form-control " id="idpaciente" data-live-search="true" >
                                                    <option value="{{$conp->idpaciente}}"> {{$conp->nombre_p}} {{$conp->apellido_p}} </option></label>
													</div>
											</div>
										</div>
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<label for="detalle">(*)  Detalle de la Consulta</label>
													<textarea class="form-control" type="text" name="detalle"   rows="5" cols="50" placeholder="Detalle..."></textarea>
											</div>
										</div>
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<label for="observacion">(*)Observación</label>
													<textarea class="form-control" type="text" name="observacion"   rows="5" cols="50" placeholder="Observación..."></textarea>
                        					</div>
										</div>
										<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
											<div class="form-group">
                        						<label for="fecha_registro_p"><span>Fecha de Registro</span></label><div class="input-group margin-bottom-sm">
                      							<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        							<input  type="Date"  class="form-control"  name="fecha_registro_p"  id="fechaActual" required value="{{old('fecha_registro_p')}}"  placeholder="fecha_registro_p" max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>">
                        						</div>
                  							</div>
               							</div>
									</div>
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">	
								 		<div class="form-group">
											<div class="input-group margin-bottom-sm">
									 			<p class="text-danger">(*) Campos Requeridos</p>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
									<div class="form-group">
										<button class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
										<button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
										<button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
											<span class="fa fa-retweet"></span>
											<span aria-hidden="true">Salir</span>
										</button>
									</div>
								</div>
							</div>
						{!! Form::close() !!}
						</div>
					</div>
				</div>

 @endforeach
