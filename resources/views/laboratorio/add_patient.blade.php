
<!-- Modal -->
<div class="modal fade" id="modal-add_new_patient" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route'=>'laboratory.add_patient','method'=>'POST', 'autocomplete'=>'false', 'id'=>'FormAddPatient']) !!}
        <div class="modal-content">
                <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                    <font size="6" face="Comic Sans MS,arial,verdana" color="0e4743">
                        <p align="center">Registro de Paciente</p>
                    </font>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                {!! Form::label('nombre_p', 'Nombre', ['class'=>'control-label']) !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    {!! Form::text('nombre_p', null, ['class'=>'form-control','placeholder'=>'Nombre','onkeydown'=>'soloLetras(this)']) !!}
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                {!! Form::label('apellido_p', 'Apellido', ['class'=>'control-label']) !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    {!! Form::text('apellido_p', null, ['class'=>'form-control','placeholder'=>'Apellido']) !!}
                                </div>
                            </div>
                        </div>
                    
                        {{-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                {!! Form::label('fechanacimiento_p', 'Fecha de Nacimiento', ['class'=>'control-label']) !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                    {!! Form::date('fechanacimiento_p', Carbon\Carbon::now(), ['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>--}}
                    
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                {!! Form::label('fecha_registro_p', 'Fecha de Registro', ['class'=>'control-label']) !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                    {!! Form::date('fecha_registro_p', Carbon\Carbon::now(), ['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <div>
                        <br>
                        <button class="btn btn-primary" onclick="addNewPatient()" style="color: white; background-color: #0a302d">
                            <span class="fa fa-floppy-o">
                            </span> Guardar
                        </button>
                        <button type="reset" id="btnReset" class="btn btn-primary reset-form" style="color: white; background-color: #98bff9"><span
                                class="fa fa-ban"></span> Cancelar </button>
                        <button type="reset" class="btn btn-danger" id="btnCloser" data-dismiss="modal" aria-label="Close">
                            <span class="fa fa-retweet"></span>
                            <span aria-hidden="true">Salir</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
