

 {!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}


<div data-backdrop="static" class="modal fade" id="modal-tipoconsulta-edit-{{ $tipo_consulta->idtipoconsulta }}"> 

  
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                            <!--<h3>NUEVO PRODUCTO</h3>-->
                            <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Tipo Consulta</p></font>
                                @if (count($errors)>0)  
                                    <div class="alert alert-danger"> 
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul> 
                                    </div> 
                                @endif
                            </div>
                        
            
            {!! Form::model($tipo_consulta,['route'=>['Tipoconsulta.update',$tipo_consulta->idtipoconsulta],'method'=>'PATCH','autocomplete'=>'off']) !!}

            <div class="modal-body">
                <div class="row" style="background-color: #f2f2f1"> 
            <br>
            <strong>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">(*) Nombre del Tipo de Consulta:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" name="nombre" required value="{{$tipo_consulta->nombre}}" class="form-control"  onkeyup="vNom(this)" onkeypress="return soloLetras(event)"  placeholder="Nombre de Tipo de Consulta">
                        </div>
                    </div>
                </div>
                
               
                
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">   
                    <div class="form-group">
                        <div class="input-group margin-bottom-sm">
                            <p class="text-danger">(*) Campos Requeridos</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-22 col-sm-22 col-md-22 col-xs-12">
                    <div class="form-group">
                        <div style="text-align: right;">
                            <button  class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
                            <button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
                            <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> <span class="fa fa-retweet"></span><span aria-hidden="true">Salir</span></button>
                        </div>
                    </div>
                </div>
        </div>
        </div>
                </div>
             </div>
        </strong>
    </div>

    
        
            {!! Form::close() !!}
     



 


 