@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>
            <FONT FACE="times new roman" size="6" color="0e4743"> Listado de Especificacion</FONT>
            <a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-especificacion-create" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span> 
            </button></a>

            

            {{-- @include('sintomas.search') --}}
        </h3>
        {{-- @include('sintomas.search') --}}   
    </div>
</div> 

<div class="row"> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
        <div class="table-responsive"> 
            <table class="table datatable" style="text-align:center;" >
                <thead style="background-color:#1c779e">
                    <th style="text-align:left;"><font color="white" >PACIENTE</th>
                    <th style="text-align:left;"><font color="white" >TIPO CONSULTA</th>
                    <th style="text-align:center;"><font color="white" >OPCIONES</th>  
                </thead>
                <tbody>
                    @foreach ($especificacion as $espe)   
                        <tr>
                            <td align="left"><i class="fa fa-user"></i> {{$espe->nombre_p}} {{$espe->apellido_p}}</td>
                            <td>
                                @if($espe->estado_espe == 'CONSULTA MEDICA')
                                    <p class="text-center"><small class="label pull center p1 bg-olive">{{$espe->estado_espe}} </small></p>
                                @else
                                    <small class="label pull center p1 bg-red">{{$espe->estado_espe}} </small>
                                @endif
                            </td> 
                            <td align="center">
                                @can('signos.signos_vitales.destroy')
                                <a href="" data-target="#modal-delete" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-stethoscope"></span></button></a> 
                                @endcan

                                @can('signos.signos_vitales.destroy')
                                <a href="" data-target="#modal-delete1" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #D4AC0D "><span class="fa fa-users"></span></button></a> 
                                @endcan
                            </td>

                            
                        </tr> 
                       
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{-- {{ $especificacion->render() }} --}} 
            </div>
        </div>
    </div>
</div>
@include('consulta.especificacion.create')
@endsection