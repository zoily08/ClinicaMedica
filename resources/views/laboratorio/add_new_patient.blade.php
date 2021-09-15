<!-- Modal -->
<div class="modal fade" id="newPatientModal" data-backdrop-limit="1" tabindex="-1" role="dialog"
    aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-image:url({{asset ('img/100.jpg')}});">
                <font size="6" face="Comic Sans MS,arial,verdana" color="0e4743">
                    <p align="center">Registro de Nuevo Paciente</p>
                </font>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>  
            </div> 
            {!! Form::open(['route'=>'paciente.store_new_patient','method'=>'POST','autocomplete'=>'off','id'=>'newPatientForm'])     
            !!}     
            <div class="modal-body">
                <div class="container-fluid">   
                    <div class="row">

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre_p" danger="text"><span> (*)Nombres:</span></label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                    <input autocomplete="off" placeholder=" Nombres del paciente" minlength="3"
                                        onkeypress="return soloLetras(event)" onpaste="return false"
                                        class="form-control" autofocus type="text" name="nombre_p" id="nombre_p"
                                        required value="{{old('nombre paciente')}}" onkeyup="vNom(this)">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="apellido_p" danger="text"><span> (*)Apellidos:</span></label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                    <input autofocus placeholder=" Apellido del paciente" minlength="3"
                                        onkeypress="return soloLetras(event)" onpaste="return false"
                                        class="form-control" type="text" name="apellido_p" id="apellido_p" required
                                        value="{{old('apellido del paciente')}}" placeholder="Apellido del Paciente..."
                                        required autofocus onkeyup="vNom(this)">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="fechanacimiento_p"><span> (*) Fecha de Nacimiento:</span></label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                    <input type="Date" min="1940" max="2018" class="form-control" type="text"
                                        name="fechanacimiento_p" id="idfecha"
                                        placeholder="fecha de nacimiento del paciente... " onchange="llama_Edad()" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="edad_p"><span> Edad:</span></label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                                    <input class="form-control" type="text" name="edad_p" required
                                        value="{{old('edad del paciente')}}" placeholder="Edad del Paciente..."
                                        readonly="readonly" Id="Idedad_p">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label> (*) Genero: </label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span>
                                    <select name="genero_p" class="form-control">
                                        <option value="MASCULINO">MASCULINO</option>
                                        <option value="FEMENINO">
                                            FEMENINO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="direccion_p"><span> (*) Direcci�n:</span></label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                    <input class="form-control" type="text" name="direccion_p" required
                                        value="{{old('direccion del paciente')}}"
                                        placeholder="Direccion del Paciente..." onkeyup="vNom(this)">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre_madre_p">
                                    <span> (*) Nombre de la madre:</span>
                                </label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-female fa-fw"></i></span>
                                    <input autocomplete="off" autofocus placeholder="Nombre de la madre del Paciente..."
                                        minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"
                                        class="form-control" type="text" name="nombre_madre_p" required
                                        value="{{old('nombre de la madre del paciente')}}" onkeyup="vNom(this)">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre_padre_p"><span> Nombre del padre:</span></label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-male fa-fw"></i></span>
                                    <input autocomplete="off" autofocus placeholder="Nombre del padre del Paciente..."
                                        minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"
                                        class="form-control" type="text" name="nombre_padre_p" required
                                        value="{{old('nombre del padre del paciente')}}" onkeyup="vNom(this)">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre_conyuge_p"><span> Nombre del Conyuge:</span></label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span>
                                    <input autocomplete="off" autofocus placeholder="Nombre del conyuge del paciente..."
                                        minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"
                                        class="form-control" type="text" name="nombre_conyuge_p" onkeyup="vNom(this)">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre_responsable_p"><span> (*) Nombre del responsable:</span></label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                    <input autocomplete="off" autofocus
                                        placeholder="Nombre del responsable del paciente..." minlength="3"
                                        onkeypress="return soloLetras(event)" onpaste="return false"
                                        class="form-control" type="text" name="nombre_responsable_p" required
                                        value="{{old('nombre del responsable del paciente')}}" onkeyup="vNom(this)">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="telefono_p">Tel�fono:</label>
                                <div class="input-group margin-bottom-sm"><span class="input-group-addon"><i
                                            class="fa fa-phone"></i></span>
                                    <input class="form-control" type="text" name="telefono_p" id="telefono_p"
                                        onkeypress="return sololetras(event)" placeholder="Tel�fono">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="fecha_registro_p"><span>Fecha de Registro</span></label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                    <input type="Date" class="form-control" name="fecha_registro_p" id="fechaActual"
                                        required value="{{old('fecha_registro_p')}}" placeholder="fecha_registro_p">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <div class="input-group margin-bottom-sm">
                                    <p class="text-danger"> (*) Campos requeridos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button type="button" onclick="addNewPatient()" class="btn btn-primary"><i class="fa fa-save"
                            aria="true"></i> Guardar</button>
                    <button type="reset" id="btnReset" class="btn btn-warning reset-form"><i class="fa fa-retweet"
                            aria="true"></i> Cancelar</button>
                    <button type="button" id="btnCloser" class="btn btn-danger clear-form reset-form"
                        data-dismiss="modal"><i class="fa fa-sign-out" aria="true"></i> Salir</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>