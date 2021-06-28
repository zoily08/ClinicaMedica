<div data-backdrop="static" class="modal fade" id="modal-citas-edit-{{ $cita->idcitas}}"> 
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
      <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
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
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label>Paciente:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <select name="idpaciente" id="idpaciente" class="form-control">
                    @foreach ($paci as $paciente)
                      @if ($paciente->idpaciente==$cita->idpaciente)
                        <option value="{{$paciente->idpaciente}}" selected>{{$paciente->nombre_p}}</option>
                      @else
                        <option value="{{$paciente->idpaciente}}">{{$paciente->nombre_p}}</option>
                      @endif
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
                <label>Especialidad:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <select name="idespecialidad" id="idespecialidad" class="form-control">
                    @foreach ($espe as $especialidad)
                      @if ($especialidad->idespecialidad==$cita->idespecialidad)
                        <option value="{{$especialidad->idespecialidad}}" selected>{{$especialidad->nombre}}</option>
                      @else
                        <option value="{{$especialidad->idespecialidad}}">{{$especialidad->nombre}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label>Médico:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <select name="idmedico" id="idmedico" class="form-control">
                    @foreach ($medi as $medico)
                      @if ($medico->idmedico==$cita->idmedico)
                        <option value="{{$medico->idmedico}}" selected>{{$medico->nombre}} {{$medico->apellido}}</option>
                      @else
                        <option value="{{$medico->idmedico}}">{{$medico->nombre}} {{$medico->apellido}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label>Consultorio:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <select name="idconsultorio" id="idconsultorio" class="form-control">
                    @foreach ($consul as $consultorio)
                      @if ($consultorio->idconsultorio==$cita->idconsultorio)
                        <option value="{{$consultorio->idconsultorio}}" selected>{{$consultorio->nombre}}</option>
                      @else
                        <option value="{{$consultorio->idconsultorio}}">{{$consultorio->nombre}}</option>
                      @endif
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






 