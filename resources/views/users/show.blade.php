@extends('layouts.admin')

@section('content')



      <!--div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <br>
            <font size="6" face="Comic Sans MS,arial,verdana" color="blue"><p align="center" aling="center"> Información del Usuario</p><br></font>

            </div>
         </div>
   </div>-->


   <div  style=" background-color:#f2f2f1 " >


               <fieldset  style="min-width: 0;padding:.35em .625em .75em!important;margin:0 2px;
                border:2px solid silver!important;margin-bottom: 10em;box-shadow: -6px 10px 20px 0px; ">

                 <legend  style="width: inherit;padding:inherit;border:2px solid silver;" class="legend" align= "center"  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><div style="color: #112b56"  ><B>Información  del Usuario </B></div></legend>

 


<div class="container">
 <br>
    <div class="row justify-content-center">
        <div class="col-md-10">

        <div  style=" background-color:#f2f2f1 ">

            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">

                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="name">NOMBRE:</label>
                                    <p>{{$user->name}}</p>
                
                                        
                                </div>
                            </div>


                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="apellidos"> APELLIDOS:</label>
                                    <p>{{$user->apellidos}}</p>
                
                                        
                                </div>
                            </div>


                    
                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                       <div class="form-group">

                             <label for="email">EMAIL:</label>
                                    <p>{{$user->email}}</p>

                

                   </div>
                            </div>



                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">

                                 <label for="direccion">DIRECCIÓN:</label>
                                    <p>{{$user->direccion}}</p>

               
                 
                   </div>
                            </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">

                                 <label for="telefono">NUMERO DE TELEFONO:</label>
                                    <p>{{$user->telefono}}</p>

               


                   </div>
                            </div>



                    </thead>


                    </table>

                        </div>

                        <div class="modal-footer">
       
             <a href="{{ route('paciente.pdf') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download"> IMPRIMIR LISTADO DE USUARIOS</span></button>

                

                </div>
  
  
                         </a>
            </div>
        </div>
    </div>
               </fieldset>
 </div> 
         

@endsection