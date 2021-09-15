<!-- Modal -->
<div class="modal fade" id="modal-result-save" data-backdrop-limit="1" tabindex="-1" role="dialog"
    aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Registro de Resultados</h4>
            </div>
            {!! Form::open(['route'=>'paciente.store_new_patient','method'=>'POST','autocomplete'=>'off','id'=>'newPatientForm'])
            !!}
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            {!! Form::label('name', 'Examen ', ['class'=>'label-control']) !!}
                            {!! Form::text('name', null, ['class'=>'form-control solo-letras', 'placeholder' => 'Nombre del Examen','id'=>'exam_code','readonly','value'=>'']) !!}
                        </div>
                    </div>
                
                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="dd">
                    
                  </div>
               
            <div class="modal-footer">
                <div class="text-center">
                    <button type="button" onclick="" class="btn btn-primary"><i class="fa fa-save"
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