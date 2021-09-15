<div class="modal fade" id="modal-enfermedad-edit-{{ $enf->idenfermedad }}"> 
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Enfermedad</p></font> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div> 
            {!! Form::model($enf,['route'=>['enfermedad.update',$enf->idenfermedad],'method'=>'PATCH','autocomplete'=>'off']) !!} 
            <div class="modal-body">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="enfermedad">(*) Enfermedad:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
                        <input type="text" name="enfermedad" required value="{{$enfermedad->enfermedad}}" class="form-control"  onkeyup="vNom(this)" onkeypress="return soloLetras(event)"  placeholder="Enfermedad">
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <div style="text-align: right;">
                    <button  class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> <span class="fa fa-retweet"></span><span aria-hidden="true">Salir</span></button> 
                </div>
            </div>
            {!! Form::close() !!} 
        </div>
    </div>
</div> 