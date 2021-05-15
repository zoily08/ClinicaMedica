<div class="modal fade" id="modal-result-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Listado de Examenes</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del Paciente', ['class'=>'label-control']) !!}
                            {!! Form::text('name', null, ['class'=>'form-control solo-letras', 'placeholder' => 'Nombre del Paciente','id'=>'patient_name','readonly']) !!}
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <h4>Listado de Examenes</h4>
                    <div class="table-responsive" style="height:180px;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="exams_list">
                        </tbody>
                    </table>
                </div>
                
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCloser" class="btn btn-danger clear-form reset-form"
                    data-dismiss="modal"><i class="fa fa-sign-out" aria="true"></i> Salir</button>
            </div>
        </div>
    </div>
</div>