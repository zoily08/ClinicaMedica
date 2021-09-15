@extends('layouts.admin')

@section('content') 

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>
            <FONT FACE="times new roman" size="6" color="0e4743"> Listado de Tipo de Consultas </FONT>
            <a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tipo_consulta-create" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span> 
            </button></a>
            {{-- @include('consulta.Tipoconsulta.search') --}}
        </h3>
        {{-- @include('consulta.Tipoconsulta.search') --}} 
    </div> 
</div>


<div class="row"> 
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="table-responsive"> 
      <table class="table datatable" style="text-align:center;" >
        <thead style="background-color:#1c779e">
          <th style="text-align:left;"><font color="white">NOMBRE TIPO DE CONSULTA</th>
          <th style="text-align:left;"><font color="white">ESTADO</th> 
          <th style="text-align:center;"><font color="white">OPCIONES</th> 
        </thead>
        @foreach ($tipoconsulta as $tipo_consulta)
        <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
          <td align="left"><i class="fa fa-user fa-fw"></i> {{ $tipo_consulta->nombre}}</td>
           <td>
            @if($tipo_consulta->estado == 'ACTIVO')
              <p class="text-center"><small class="label pull center p1 bg-olive">{{$tipo_consulta->estado}} </small></p>
            @else
              <small class="label pull center p1 bg-red">{{$tipo_consulta->estado}} </small> 
            @endif
          </td>

          <td align="center">
            <a href="{{URL::action('tipoconsultaController@show',$tipo_consulta->idtipoconsulta)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a> 
            <a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-tipoconsulta-edit-{{ $tipo_consulta->idtipoconsulta }}"><i class="fa fa-pencil"></i></a>  
            @if($tipo_consulta->estado == 'ACTIVO')
            <a href="" data-target="#modal-delete-{{$tipo_consulta->idtipoconsulta}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-level-down"></span></button></a> 
            @else 
            <a href="" data-target="#modal-delete-{{$tipo_consulta->idtipoconsulta}}" data-toggle="modal"><button type="button" class="btn btn-primary mb1 bg-red" style="color: #003366; background-color: #5affab"><span class="fa fa-level-up"></span></button></a>
            @endif
          </td>
        </tr>
        @include('consulta.Tipoconsulta.modal')
        @include('consulta.Tipoconsulta.edit', ['tipoconsulta' => $tipo_consulta])
        @endforeach
      </table>
    </div>
    <div class="text-center">
            {{-- {{ $tipo_consulta->links() }} --}}
        </div>
  </div>
</div>

@include('consulta.Tipoconsulta.create') 


@endsection 








