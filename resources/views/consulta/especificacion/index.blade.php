@extends('layouts.admin')

@section('content') 

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>
            <FONT FACE="times new roman" size="6" color="0e4743"> Listado para Especificar Tipo de Consulta </FONT>
            
            {{-- @include('consulta.especificacion.search') --}}
        </h3>
        {{-- @include('consulta.especificacion.search') --}} 
    </div> 
</div> 
<div class="row"> 
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="table-responsive"> 
      <table class="table datatable" style="text-align:center;" >
        <thead style="background-color:#1c779e">
          <th style="text-align:left;"><font color="white">NOMBRE DEL PACIENTE</th>
          <th style="text-align:left;"><font color="white">ESTADO</th> 
          <th style="text-align:center;"><font color="white">OPCIONES</th>  
        </thead>
        @foreach ($especificacion as $espe)
        <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
          <td align="left"><i class="fa fa-user fa-fw"></i> {{ $espe->nombre_p}} {{ $espe->apellido_p }}</td>
           <td>
            @if($espe->estado_p == 'ACTIVO')
              <p class="text-center"><small class="label pull center p1 bg-olive">{{$espe->estado_p}} </small></p>
            @endif 
          </td> 

          <td align="center">
            @can('consulta.especificacion.create')
            <a href="" data-target="#modal-especificacion-create-{{$espe->idpaciente}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle"></span></button></a>

            @endcan
           
          </td>
        </tr>
      
        @endforeach
      </table>
    </div>
    {{$especificacion->render()}}
  </div>
</div>
  @include('consulta.especificacion.create') 
@endsection 







