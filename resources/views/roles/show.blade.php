@extends('layouts.admin')
@section('content')

<div  style=" background-color:#f2f2f1 " >
    <fieldset  style="min-width: 0;padding:.35em .625em .75em!important;margin:0 2px;
    border:2px solid silver!important;margin-bottom: 10em;box-shadow: -6px 10px 20px 0px; ">

    <legend  style="width: inherit;padding:inherit;border:2px solid silver;" class="legend" align= "center"  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><div style="color: #112b56"  ><B>Información  de los Roles </B></div></legend>
        <div class="container">
            <br>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div  style=" background-color:#f2f2f1 ">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                <thead style="background-color:#A9D0F5">
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="name">NOMBRE DEL ROL:</label>
                                                <p>{{$role->name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="slug">ROL:</label>
                                                <p>{{$role->slug}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="descripcion">DESCRIPCIÓN:</label>
                                                <p>{{$role->descripcion}}</p>
                                        </div>
                                    </div>
                                </thead>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <!--<a href="{{ route('paciente.pdf') }}"><button type="button"  class="btn btn-success"    style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download"> IMPRIMIR LISTADO DE PACIENTES</span></button></a>-->
                            <a href="{{URL::action('RoleController@index',$role->id)}}"><button type="button" class="btn btn-danger"><span class="fa fa-retweet" aria-hidden="true" > Regresar</span></button></a>
                        </div>
                    </div>
                </div>
        </div>
               </fieldset>
 </div> 
         

@endsection