<div class="modal fade" id="modal-exam-show">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Datos Examen</h4>
            </div>
            {!! Form::open(['route'=>['exams.update',':id'],'method'=>'PATCH','autocomplete'=>'off', 'id'=>'UpdateExamForm']) !!}
            <div class="modal-body">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span
                                        class="glyphicon glyphicon-file">
                                    </span>Datos Generales del Examen</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                        <div class="form-group">
                                            {!! Form::label('area_id', 'Area del Examen', ['class'=>'label-control']) !!}
                                            {!! Form::select('area_id', $areas, null, ['class'=>'form-control','id'=>'area_id_edit','disabled']) !!}
                                        </div>
                                    </div>
                
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Nombre del Examen', ['class'=>'label-control']) !!}
                                            {!! Form::text('name', null, ['class'=>'form-control solo-letras', 'placeholder' => 'Nombre
                                            del Area','id'=>'name_exam_edit','disabled']) !!}
                                        </div>
                                    </div>
                
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                        <div class="form-group">
                                            {!! Form::label('price', 'Precio del Examen', ['class'=>'label-control']) !!}
                                            {!! Form::number('price', null, ['class'=>'form-control','min'=> '0','step'=>'.01',
                                            'placeholder' => 'Precio del Examen','id'=>'price_exam_edit','disabled']) !!}
                                        </div>
                                    </div>
                
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                        <div class="form-group">
                                            {!! Form::label('type', 'Tipo de Examen', ['class'=>'label-control']) !!}
                                            {{-- {!! Form::number('type', null, ['class'=>'form-control','min'=> '0','step'=>'.01', 'placeholder' => 'Tipo de Examen']) !!} --}}
                                            {!! Form::select('type', ['Químico'=>'Químico','Físico'=>'Físico'], null,
                                            ['class'=>'form-control','min'=> '0','step'=>'.01', 'placeholder' => 'Tipo de Examen','id'=>'type_exam_edit','disabled']) !!}
                                        </div>
                                    </div>
                
                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span
                                        class="glyphicon glyphicon-th-list">
                                    </span>Estructura del Examen</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                
                                    {{-- <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                        <div class="form-group">
                                            <label for="" class="control-label">Nombre del Campo</label>
                                            <input type="text" value="" placeholder="Nombre del Campo" class="form-control"
                                                id="name-field">
                                        </div>
                                    </div>
                
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                        <div class="form-group">
                                            <label for="" class="control-label">Tipo del Campo</label>
                                            <select class="form-control" id="select-type">
                                                <option value="-1">Seleccione una Opcion</option>
                                                <option value="text">Texto</option>
                                                <option value="select">Seleccion</option>
                                                <option value="comment">Comentario</option>
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2" id="options-textarea">
                                        <div class="form-group">
                                            <label for="" class="control-label">Opciones</label>
                                            <textarea class="form-control" style="height: 200px;width: 100%;"
                                                id="options-lst"></textarea>
                                            <div class="text-center">
                                                <p><strong>Nota: </strong>Una opcion por linea</p>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2" id="number-comment">
                                        <div class="form-group">
                                            <label for="" class="control-label">Nombre de Columnas</label>
                                            <textarea class="form-control" style="height: 200px;" id="colums-lst"></textarea>
                                            <div class="text-center">
                                                <p>Una columna por linea</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="row text-center">
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info" id="addBtn">Agregar</button>
                                            <button type="reset" class="btn btn-danger">Cancelar</button>
                                        </div>
                                    </div>
                                </div> --}}
                
                                <div class="row">
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                                        <div style="overflow-y: auto;height: 300px">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre del Campo</th>
                                                        <th>Tipo del Campo</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id='dataList'>
                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id">
            <div class="modal-footer">
                {{-- @include('layouts.modal_buttons') --}}
                <div class="text-center">
                    <button type="button" class="btn btn-danger clear-form reset-form" data-dismiss="modal"><i class="fa fa-sign-out" aria="true"></i> Salir</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
