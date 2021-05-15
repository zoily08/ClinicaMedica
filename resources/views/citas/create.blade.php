<div class="modal fade" id="modal-area-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Nueva Area</h4>
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
                        {!! Form::label('date', 'Nombre del Area', ['class'=>'label-control']) !!}
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
