<div class="modal fade" id="modal-especificacion-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Especifacion a Paciente</p></font> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>   
            </div> 
            {!! Form::open(['route'=>'especificacion.store','method'=>'POST','autocomplete'=>'off']) !!} 
            <div class="modal-body">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
                    <div class="form-group">
                        <label for="idpaciente">(*) Paciente:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <select name="idpaciente" class="form-control selectpicker" id="idpaciente" data-live-search="true">
                                @foreach($paciente as $paciente)
                                    <option value="{{$paciente->idpaciente}}">{{$paciente->nombre_p}} {{$paciente->apellido_p}}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
                    <div class="form-group">
                        <label for="estado_espe">(*) Tipo Consulta:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <select name="estado_espe" class="form-control selectpicker" id="estado_espe" data-live-search="true">
                                @foreach($tipoconsulta as $tipoconsul)
                                    <option value="{{$tipoconsul->nombre}}">{{$tipoconsul->nombre}}</option>
                                @endforeach
                            </select> 
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
            </div>
            <div class="modal-footer">
                @include('layouts.modal_buttons')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>