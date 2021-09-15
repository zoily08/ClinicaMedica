@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>
            <FONT FACE="times new roman" size="6" color="0e4743"> Listado de Enfermedad</FONT>
            <a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-enfermedad-create" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span> 
            </button></a>

            

            {{-- @include('enfermedad.search') --}}
        </h3>
        {{-- @include('enfermedad.search') --}}   
    </div>
</div>   

<div class="row"> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
        <div class="table-responsive"> 
            <table class="table datatable" style="text-align:center;" >
                <thead style="background-color:#1c779e">
                    <th style="text-align:left;"><font color="white" >Enfermedad</th>
                    <th style="text-align:center;"><font color="white" >OPCIONES</th>
                </thead>
                <tbody>  
                    @foreach ($enfermedad as $enf)   
                        <tr>
                            <td align="left"><i class="fa fa-heartbeat"></i> {{ $enf-> enfermedad}}</td>
                            <td align="center"> 
                            	<a href="{{URL::action('EnfermedadController@show',$enf->idenfermedad)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a>
                                <a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-enfermedad-edit-{{ $enf->idenfermedad }}"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr> 
                        @include('enfermedad.edit', ['enfermedad'=> $enf])
                    @endforeach 
                </tbody>
            </table>
        </div>
         {{$enfermedad->render()}}
    </div>
</div>
@include('enfermedad.create')

 
@endsection