<div class="modal fade" id="modal-sintomas-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Nuevo Sintoma</p></font> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>   
            </div> 
            {!! Form::open(['route'=>'sintomas.store','method'=>'POST','autocomplete'=>'off']) !!} 
            <div class="modal-body">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="nombre_sintomas">(*) Nombre Síntoma:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
                            <input class="form-control" type="text" name="nombre_sintomas" id="nombre_sintomas" onkeypress="return soloLetras(event)" onkeyup="vNom(this)" placeholder="Síntoma">
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