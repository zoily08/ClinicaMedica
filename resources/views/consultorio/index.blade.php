@extends('layouts.admin')
@section('content') 





<div  class="row"  >
  <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
  <!--<h3><font color="0e4743">Listado de Pacientes </font>-->
  <h3><FONT FACE="times new roman " size="6" color="0e4743" >Listado de Consultorio</FONT>



 
 @can('consultorio.create')
    <a ><button type="button"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" title="Agregar un Nuevo Consultorio" style="color: #003366; background-color: #99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span></button></a>
    @endcan


    </h3>
    {!!Form::open(array('url'=>'consultorio','method'=>'POST','autocomplete'=>'off'))!!}
      {{Form::token()}}
      

      <div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                   <div style="background-image:url({{asset ('img/100.jpg')}});" class="modal-header">

                     <!--<font  face="Comic Sans MS,arial,verdana" ><p align="center"><legend  align= "center" class="text-red" size="8">Registro de Nuevo Paciente</legend></p></font>

                     <font  face="Comic Sans MS,arial,verdana" ><p align="center" class="text-red" size="8">Registro de Nuevo Paciente </p></font>-->

                     <font size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center" >Registro de Nuevo Consultorio</p></font>






                     

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


      <br>

  <form >
   

                 


              

                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group" >
                              <label for="nombre" danger="text"><span> (*)Nombre del Consultorio:</span></label>
                              <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                   <input autocomplete="off" placeholder=" Nombres del consultorio" minlength="3" onkeypress="return soloLetras(event)" onpaste="return false" class="form-control" autofocus type="text" name="nombre" id="nombre" required value="{{old('nombre consultorio')}}">
                              </div>
                        </div>
                  </div>



<br>

<br>
    
                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="form-group">
                          <div class="input-group margin-bottom-sm">
                              <p class="text-danger"> (*)  Campos requeridos</p>
                          </div>
                      </div>
                  </div>


                  </form>
                  




                </div>

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

            
          </div>
        </div>
      </div>
    </div>


  </div>

        {!!Form::close()!!}

        <div class="row"> 
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="table-responsive" style="overflow: auto" >


      <table  class="table datatable" style="text-align:center;">

     
        <thead style="background-color:#1c779e">
       


          <th style="text-align:left">
          <font color="white">NOMBRES</font></th>

          <th style="text-align:center">
          <font color="white">ESTADO</font></th>

          <th style="text-align:center">
          <font color="white">OPCIONES</font></th>
          
          

        </thead>

        @foreach ($consult as $consultorio)
        <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
           <td  align="left"><i class="fa fa-user fa-fw"></i>{{ $consultorio-> nombre}}</td>

           <td>
            @if($consultorio->estado == 'ACTIVO')

            <p class="text-center"><small class="label pull center p1 bg-olive">{{$consultorio->estado}} </small></p>
                  @else
                  <small class="label pull center p1 bg-red">{{$consultorio->estado}} </small>
                  @endif

          </td>
        <td>
          @can('consultorio.show')
            <a href="{{URL::action('ConsultorioController@show',$consultorio->idconsultorio)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a>
            @endcan



            <!--
            <a href="{{URL::action('ConsultorioController@edit',$consultorio->idconsultorio)}}"><button type="button" class="btn btn-info" id="ejecuta" style="color: white; background-color: #d2691e"><span class="fa fa-pencil"></span></button></a>-->
             
             @can('consultorio.edit')
             <a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-consultorio-edit-{{ $consultorio->idconsultorio }}"><i class="fa fa-pencil"></i></a>
             @endcan


            @can('consultorio.destroy')
             @if($consultorio->estado == 'ACTIVO')

            <a href="" data-target="#modal-delete-{{$consultorio->idconsultorio}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-level-down"></span></button></a>
            @else
            <a href="" data-target="#modal-delete-{{$consultorio->idconsultorio}}" data-toggle="modal"><button type="button" class="btn btn-primary mb1 bg-red" style="color: #003366; background-color: #5affab"><span class="fa fa-level-up"></span></button></a>
            @endif
            @endcan






          
</td>

      </tr>
             @include('consultorio.edit', ['consultorio' => $consultorio])
             @include('consultorio.modal')
              @endforeach


          </table>
        </div>
          {{$consult->render()}}
     </div>

  
</div>


 
   
@endsection






