@foreach($signos as $sig)

<div data-backdrop="static" class="modal" id="modal-historial-{{$sig->idpaciente}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content"> 
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Historial</p></font> 
                    @if (count($errors)>0)   
                        <div class="alert alert-danger">    
                          <ul>
                            @foreach ($errors->all() as $error)         
                              <li>{{$error}}</li>   
                            @endforeach 
                          </ul>      
                        </div>    
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div> 
            <div class="panel-body">
            <div class="col-lg-10 col-sm-10 col-md-10 col-xs-12" >
                                    <label for="idsignos_vitales" id="idsignos_vitales">Signos Vitales:</label>
                                        <input class="form-control" type="hidden" name="signos_vitales"  id="signos_vitales"  placeholder="signos"><br>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label >(*) Temperatura:  °C</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"> <i class="fa fa-magic" aria-hidden="true"></i></span>
                                                    <label name="ptemperatura" class="form-control " id="ptemperatura" data-live-search="true">
                                                        <option value="{{$sig->idpaciente}}">{{$sig->temperatura}}</option> 
                                                </div>  
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label >(*) Presión:  mmHG</label>
                                                    <div class="input-group margin-bottom-xs">
                                                        <label></label> 
                                                            <span class="input-group-addon"><i class="fa fa-stethoscope"></i></span>
                                                                <label for="presionsistolica"></label> 
                                                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                                        <label name="ppresionsistolica" class="form-control " id="ppresionsistolica" data-live-search="true">
                                                                        <option value="{{$sig->idpaciente}}">{{$sig->presionsistolica}}</option>
                                                                    </div>
                                                                <label for="presiondiastolica"></label>
                                                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"/>
                                                                        <label name="ppresiondiastolica" class="form-control " id="ppresiondiastolica" data-live-search="true">
                                                                        <option value="{{$sig->idpaciente}}">{{$sig->presiondiastolica}}</option>
                                                                    </div>
                                                    </div> 
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                                                <br>
                                                    <label >(*) Peso:  lb</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                        <label name="ppeso" class="form-control " id="ppeso" data-live-search="true">
                                                        <option value="{{$sig->idpaciente}}">{{$sig->peso}}</option>
                                                    </div> 
                                            </div> 
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                                                <br>
                                                    <label >(*)Estatura:  cm</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-male"></i></span>
                                                        <label name="pestatura" class="form-control " id="pestatura" data-live-search="true">
                                                        <option value="{{$sig->idpaciente}}">{{$sig->estatura}}</option>
                                                    </div>
                                            </div> 
                                </div>
                              
                        </div>

                        <div class="modal-footer">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                        <span class="fa fa-retweet"></span>
                                        <span aria-hidden="true">Salir</span>
                                    </button>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
@endforeach