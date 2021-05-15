<div class="modal fade" id="modal-area-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Nueva Área</p></font> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div> 
            {!! Form::open(['route'=>'area.store','method'=>'POST','autocomplete'=>'off']) !!}
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre del Area', ['class'=>'label-control']) !!}
                        {!! Form::text('name', null, ['class'=>'form-control solo-letras', 'placeholder' => 'Nombre del Area']) !!}
                    </div> 
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        {!! Form::label('date', 'Fecha', ['class'=>'label-control']) !!}
                        {!! Form::date('date', null, ['class'=>'form-control']) !!}
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
