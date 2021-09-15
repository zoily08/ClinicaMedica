@foreach($paciente as $pac) 
	<div data-backdrop="static" class="modal" id="modal-especificacion-create-{{$pac->idpaciente}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
		<div class="modal-dialog modal-lg" role="document">
   			<div class="modal-content"> 
      			<div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
      				<font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Especificar Tipo de Consulta</p></font>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
       					</button> 
       			</div>
       			{!! Form::open(['route'=>'especificacion.store','method'=>'POST','autocomplete'=>'off']) !!} 
       			<div class="modal-body">
       				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
       					<div class="form-group">
       						<label for="idpaciente">Paciente</label>
      							<div class="input-group margin-bottom-sm">
  									<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<label name="idpaciente" class="form-control " id="idpaciente" data-live-search="true" >
                                            <option value="{{$pac->idpaciente}}"> {{$pac->nombre_p}} {{$pac->apellido_p}} </option></label>
								</div>  
						</div> 
					</div>
              		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                		<div class="form-group">
                  			<label for="idtipoconsulta">Tipo de Consulta:</label>
                  				<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-stethoscope"></i></span>
                    				<select name="idtipoconsulta " class="form-control selectpicker" id="idtipoconsulta" data-live-search="true">
                      					@foreach($tipoconsulta as $tipo)
                        					<option value="{{$tipo->idtipoconsulta}}">{{$tipo->nombre}}</option>
                      					@endforeach
                    				</select> 
                  				</div>
                		</div> 
              		</div>
              		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                		<div class="form-group">
                  			<label for="idmedico">Tipo de Medico:</label>
                  				<div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                    				<select name="idmedico" class="form-control selectpicker" id="idmedico" data-live-search="true">
                      					@foreach($medico as $med)
                        					<option value="{{$med->idmedico}}">{{$med->nombre}} {{$med->apellido}}</option>
                      					@endforeach
                    				</select>
                  				</div>
                		</div>
              		</div>
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
                </div> \
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endforeach
	