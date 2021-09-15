<div class="modal fade" id="modal-exam-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Datos de Examen</p></font> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            {!! Form::open(['route'=>'exams.store','method'=>'POST','autocomplete'=>'off', 'id'=>'ExamForm']) !!} 
 
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                </span>Datos Generales del Examen</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('area_id', 'Area del Examen', ['class'=>'label-control']) !!}
                                        {!! Form::select('area_id[]', $areas, null, ['class'=>'select2able','multiple'=> true,'id'=>'areas_id','style'=>'color:red;']) !!}
                                    </div>
                                </div>
            
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Nombre del Examen', ['class'=>'label-control']) !!}
                                        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Nombre del Examen','id'=>'exam_name']) !!}
                                    </div>
                                </div>
            
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('price', 'Precio del Examen', ['class'=>'label-control']) !!}
                                        {!! Form::number('price', null, ['class'=>'form-control','min'=> '0','step'=>'.01',
                                        'placeholder' => 'Precio del Examen','id'=>'exam_price']) !!}
                                    </div>
                                </div>
            
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('type', 'Tipo de Examen', ['class'=>'label-control']) !!}
                                        {{-- {!! Form::number('type', null, ['class'=>'form-control','min'=> '0','step'=>'.01', 'placeholder' => 'Tipo de Examen']) !!} --}}
                                        {!! Form::select('type', ['Químico'=>'Químico','Físico'=>'Físico'], null,
                                        ['class'=>'select2able','min'=> '0','step'=>'.01', 'placeholder' => 'Tipo de Examen','id'=>'exam_type']) !!}
                                    </div>
                                </div>
            
            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                </span>Estructura del Examen</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="row">
            
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="" class="control-label">Nombre del Campo</label>
                                        <input type="text" value="" placeholder="Nombre del Campo" class="form-control"
                                            id="name-field">
                                    </div>
                                </div>
            
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
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
            
                                <div id="options-textarea">
                                    
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-6" >
                                        <div class="form-group">
                                            <label for="" class="control-label">Nombre de la Opcion</label>
                                            <input type="text" class="form-control" id="option_text">
                                            <a href="#" class="btn btn-default" onclick="addOption2Select('option_text','options-lst')">Agregar</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-6" >
                                        <div class="form-group">
                                            <label for="" class="control-label">Listado de Opciones</label>
                                            {!! Form::select(null, [], null, ['class'=>'select2able','multiple'=> true,'id'=>'options-lst']) !!}
                                            
                                        </div>
                                    </div>
                                    
                                </div>
            
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12" id="number-comment">
                                    <div class="form-group">
                                        <label for="" class="control-label">Nombre de Columnas</label>
                                        {!! Form::select(null, [], null, ['class'=>'select2able','multiple'=> true,'id'=>'colums-lst']) !!}
                                        <div class="text-center">
                                            <p>Una columna por linea</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="row text-center">
                                <div class="ccol-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-info" id="addBtn">Agregar</button>
                                        <button type="reset" class="btn btn-danger">Cancelar</button>
                                    </div>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                    <div style="overflow-y: auto;height: 300px">
                                        <table class="table table-hover" id="tblExamStruct">
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

            <div class="modal-footer">
                @include('layouts.modal_buttons')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>