<div class="modal fade" id="modal-area-show">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Información de Área</p></font>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del Area', ['class'=>'label-control']) !!}
                            {!! Form::text('name', null, ['class'=>'form-control solo-letras', 'placeholder' => 'Nombre del
                            Area','id'=>'area_name','disabled']) !!}
                        </div> 
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            {!! Form::label('date', 'Fecha', ['class'=>'label-control']) !!}
                            {!! Form::date('date', null, ['class'=>'form-control','id'=>'area_date','disabled']) !!}
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