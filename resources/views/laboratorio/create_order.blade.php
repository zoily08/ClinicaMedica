
<div class="modal fade"  class="modal hide fade" tabindex="-1" id="modal-order_create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Orden de Examen</p></font> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            {!! Form::open(['route'=>'laboratory.order_store','method'=>'POST','autocomplete'=>'off','id'=>'formOrder']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> --}}
                        <div class="form-group">
                            {!! Form::label('patient_id', 'Paciente: ', ['class'=>'label-control']) !!}
                            {!! Form::select('patient_id', $patiens, null, ['class'=>'select2able','onchange'=>'getPatient(this)']) !!}
                        </div> 
                    </div>  
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <button type="button" class="btn btn-success" data-toggle="modal" href="#modal-add_new_patient" ><i class="fa fa-plus"></i></button>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group"> 
                            {!! Form::label(null, 'Nombre: ', ['class'=>'label-control']) !!}
                            {!! Form::text(null, null, ['class'=>'form-control', 'disabled'=> true,'id'=>'patient_name']) !!}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            {!! Form::label(null, 'Edad: ', ['class'=>'label-control']) !!}
                            {!! Form::text(null, null, ['class'=>'form-control', 'disabled'=> true,'id'=>'patient_age']) !!}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            {!! Form::label(null, 'Area del examen a realizar: ', ['class'=>'label-control']) !!}
                            {!! Form::select(null, $areas, null,['class'=>'select2able','id'=>'select-area', 'onchange'=>'fillSelectExams(this)']) !!} 
                        </div>
                    </div> 
                    
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                        {!! Form::label(null, 'Examen:') !!}
                        <div class="table-responsive">
                            <table class="table table-condensed fixed_header" style="text-align:center;"  id="tbl-exams-order">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Examen</th>
                                        <th>Precio</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="examens-lst">
                                    <tr> 
                                        <td></td>
                                        <td>{!! Form::select(null, $exams, null, ['id'=>'select-exam','class'=>'form-control','onchange'=>'selectEvent()']) !!}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                     <div class="form-group">
                        {!! Form::label(null, 'Sub Total:' , ['class'=>'label-control']) !!}
                        {!! Form::text(null, 0.0, ['class'=>'form-control', 'disabled'=> true, 'id'=>'sub_total']) !!}
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label(null, 'Descuento %:' , ['class'=>'label-control']) !!}
                        {!! Form::number('discount', 0.0, ['class'=>'form-control', 'id'=>'discount']) !!}
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        {!! Form::label(null, 'Total:' , ['class'=>'label-control']) !!}
                        {!! Form::text(null, 0.0, ['class'=>'form-control', 'disabled'=> true, 'id'=>'total']) !!}
                    </div>
                </div>
            </div>
        </div> 
        <input type="hidden" name="price" id="total_hidden">
        <div class="modal-footer">
            @include('layouts.modal_buttons')
        </div>
        {!! Form::close() !!}
    </div>
</div>
</div>
