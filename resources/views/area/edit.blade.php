<div class="modal fade" id="modal-area-edit-{{ $area->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Área</p></font> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div> 
            {!! Form::model($area,['route'=>['area.update',$area->id],'method'=>'PATCH','autocomplete'=>'off']) !!}
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre del Area', ['class'=>'label-control']) !!}
                        {!! Form::text('name', null, ['class'=>'form-control solo-letras', 'placeholder' => 'Nombre del Area']) !!}
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
