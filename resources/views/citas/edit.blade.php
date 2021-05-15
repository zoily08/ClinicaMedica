<div data-backdrop="static" class="modal fade" id="modal-citas-edit-{{ $cita->idcitas}}"> 

 
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                            <!--<h3>NUEVO PRODUCTO</h3>-->
                            <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Citas</p></font>
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
                        
            
            {!! Form::model($cita,['route'=>['citas.update',$cita->idcitas],'method'=>'PATCH','autocomplete'=>'off']) !!}


            <div class="modal-body"> 
           
                <div class="row" style="background-color: #f2f2f1"> 
            <br>
            
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group">
                    <label for="idmedico">Paciente:</label>
                    <div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="idmedico" class="form-control selectpicker" id="idmedico" data-live-search="true">
                        @foreach($paci as $paciente)
                          <option value="{{$paciente->idpaciente}}">{{$paciente->nombre_p}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="fecha"><span>  Fecha de la Cita:</span></label>
           <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
             <input class="form-control" id="fecha" type="date" name="fecha"  value="{{$cita->fecha}}">

          
        </div>
        </div>
      </div>


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="hora">Hora de Cita:</label>
                        <div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input class="form-control" id="hora" type="time" name="hora"  value="{{$cita->hora}}">
                        </div>
                    </div>
                    </div>


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="idespecialidad">Especialidad:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="idespecialidad" class="form-control selectpicker" id="idespecialidad" data-live-search="true">
                        @foreach($espe as $especialidad)
                          <option value="{{$especialidad->idespecialidad}}">{{$especialidad->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="idmedico">Medicos:</label>
                    <div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="idmedico" class="form-control selectpicker" id="idmedico" data-live-search="true">
                        @foreach($medi as $medico)
                          <option value="{{$medico->idmedico}}">{{$medico->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="idconsultorio">Consultorio:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="idconsultorio" class="form-control selectpicker" id="idconsultorio" data-live-search="true">
                        @foreach($consul as $consultorio)
                          <option value="{{$consultorio->idconsultorio}}">{{$consultorio->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>


                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="form-group">
                        <label for="observacion">(*) Observacion de la Cita:</label>

                        <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon">
                       <i class="fa fa-map-marker fa-fw"></i></span>
                       
                       <textarea class="form-control" type="text" name="observacion"  rows="3" cols="50" placeholder="Observacion..." >{{$cita->observacion}}</textarea>
                        </div>
                      </div>
                    </div>

                    <!--<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="observacion"><span> (*)  Observacion de la Cita:</span></label>
          <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
          <input  type="text" name="observacion" value="{{$cita->observacion}}" class="form-control" placeholder="observacion de la cita...">
        </div>
      </div>
      </div>-->


      
          <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8">
            <div class="form-group">
            <div class="input-group margin-bottom-sm">
            <p class="text-danger"> (*)  Campos requeridos</p>
            </div>
            </div>
            </div> 
                <div class="col-lg-22 col-sm-22 col-md-22 col-xs-12">
                    <div class="form-group">
                        <div style="text-align: right;">
                            <button  class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>

                            <button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>

                            
                            <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> <span class="fa fa-retweet"></span><span aria-hidden="true">Salir</span></button>
                        </div>
                    </div>
                </div>
        </div>
        </div>
                </div>
             </div>
        
    </div>

    
        
            {!! Form::close() !!}






 