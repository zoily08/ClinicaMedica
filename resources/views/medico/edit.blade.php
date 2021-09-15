
 {!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}



<script type="text/javascript">

 
jQuery(function($) {
      $('input,form').attr('autocomplete','off');
      $("#telefono").mask("0000-0000",{placeholder: '0000-0000'} );
      //$('textarea,form').attr('autocomplete','off');
   });

</script>


<div data-backdrop="static" class="modal fade" id="modal-medico-edit-{{ $medico->idmedico }}"> 

 
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                            <!--<h3>NUEVO PRODUCTO</h3>-->
                            <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar1 Médicos</p></font>
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
                        
            
            {!! Form::model($medico,['route'=>['medico.update',$medico->idmedico],'method'=>'PATCH','autocomplete'=>'off']) !!}


            <div class="modal-body">
              <br>
                <div class="row"> 
            <br>
             <form>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">(*) Nombre del Médico :</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" name="nombre" required value="{{$medico->nombre}}" class="form-control"  onkeyup="vNom(this)" onkeypress="return soloLetras(event)"  placeholder="Nombren Medico">
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="apellido">(*) Apellido del Médico :</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" name="apellido" required value="{{$medico->apellido}}" class="form-control"  onkeyup="vNom(this)" onkeypress="return soloLetras(event)"  placeholder="Apellido del Medico">
                        </div>
                    </div>
                </div>


                


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="telefono">(*) Teléfono del Médico :</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" name="telefono" value="{{$medico->telefono}}"  id="telefono" onkeypress="return sololetras(event)" placeholder="Teléfono Medico">
                        </div>
                    </div>
                </div>



                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="direccion">(*) Direccion del Médico :</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" name="direccion" required value="{{$medico->direccion}}" class="form-control"  onkeyup="vNom(this)" onkeypress="return soloLetras(event)"  placeholder="Direccion del Medico">
                        </div>
                    </div>
                </div>

                

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group">
                    <label for="idespecialidad">(*) Especialidad:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="idespecialidad" class="form-control selectpicker" id="idespecialidad" data-live-search="true">
                        @foreach($espe as $especialidad)
                          <option value="{{$especialidad->idespecialidad}}">{{$especialidad->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                

                
                </form>
                
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
        
    </div>

    
        
            {!! Form::close() !!}
     



 


 