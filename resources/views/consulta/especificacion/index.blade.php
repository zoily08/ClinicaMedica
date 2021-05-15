@extends('layouts.admin')
@section('content') 

<div  class="row"  >
  <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
  <!--<h3><font color="0e4743">Listado de Pacientes </font>-->
  <h3><FONT FACE="times new roman " size="6" color="0e4743" >Listado de Tipos de Consultas</FONT>




    <a ><button type="button"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" title="Agregar un Nueva consulta" style="color: #003366; background-color: #99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span></button></a>




    </h3>
    
    
    {!!Form::open(array('url'=>'consulta/especificacion','method'=>'POST','autocomplete'=>'off'))!!}
      {{Form::token()}}
      

      <div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                   <div style="background-image:url({{asset ('img/100.jpg')}});" class="modal-header">

                     <!--<font  face="Comic Sans MS,arial,verdana" ><p align="center"><legend  align= "center" class="text-red" size="8">Registro de Nuevo Paciente</legend></p></font>

                     <font  face="Comic Sans MS,arial,verdana" ><p align="center" class="text-red" size="8">Registro de Nuevo Paciente </p></font>-->

                     <font size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center" >Registro de Nuevo Tipo de Consulta</p></font>






                     

                      @if (count($errors)>0)
                        <div class="alert alert-danger">
                          <ul>
                      
                          @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                      
                          @endforeach
                          </ul>
                       </div>
                      @endif
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>

                <div class="modal-body">
                   <form >
   
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="idproveedor">Tipo de Consulta:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="idtipoconsulta " class="form-control selectpicker" id="idproveedor" data-live-search="true">
                        @foreach($tipoconsulta as $tipo)
                          <option value="{{$tipo->idtipoconsulta}}">{{$tipo->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="idproveedor">Tipo de Medico:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <select name="idtipomedico " class="form-control selectpicker" id="idmedico" data-live-search="true">
                        @foreach($medico as $med)
                          <option value="{{$med->idmedico}}">{{$med->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                     
   

  



<br>

<br>
    


                  

<br>

             <div class="modal-footer" >
                  <div class="form-group" >
                  <br>

                      <button class="btn btn-primary" style="color: white; background-color: #0a302d"  type="submit">
                          <span class="fa fa-floppy-o">

                          </span>  Guardar

                       </button>

                     


                        <button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
                  
                      <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span class="fa fa-retweet"></span>
                    <span aria-hidden="true">Salir</span>
                     </button>

                        </div>
            </div>

      @include('consulta.especificacion.modal')      
      </form>
                  




                </div>
          </div>
        </div>
      </div>
    </div>


  </div>



        {!!Form::close()!!}

  


 
   
@endsection






