<div class="modal fade" id="modal-sint_enf">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Ingreso de Sintomas a Enfermedad </p></font> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>    
            </div>  
            {!! Form::open(['route'=>'sint_enf.sint_enf','method'=>'POST','autocomplete'=>'off']) !!}
            <div class="modal-body">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="idsintomas">(*) Sntomas:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
                            <select name="idsintomas" class="form-control selectpicker" id="idsintomas" data-live-search="true">
                                @foreach($sintomas as $sint)
                                    <option value="{{$sint->idsintomas}}">{{$sint->nombre_sintomas}}</option>
                                @endforeach
                            </select>    
                        </div>
                    </div>
                </div>   
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="idsintomas">(*) Enfermedad:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <select name="idenfermedad" class="form-control selectpicker" id="idsintomas" data-live-search="true">
                                @foreach($enfermedad as $enf)
                                    <option value="{{$enf->idenfermedad}}">{{$enf->enfermedad}}</option>
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