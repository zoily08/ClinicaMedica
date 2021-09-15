@extends('layouts.admin')
@section('content')

<script type="text/javascript">
  window.onload = function(){
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth()+1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    if(dia<10)
      dia='0'+dia; //agrega cero si el menor de 10
    if(mes<10)
      mes='0'+mes //agrega cero si el menor de 10
      document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
  }
</script>
<div  class="row"  >
  <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3><FONT FACE="times new roman " size="6" color="0e4743" >Listado de Roles</FONT>
      @can('roles.create')
        <a><button type="button"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" title="Agregar  un Nuevo rol" style="color: #003366; background-color: #99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span></button></a>
      @endcan
    </h3>
    {!!Form::open(array('url'=>'roles','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div style="background-image:url({{asset ('img/100.jpg')}});" class="modal-header">
            <font size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center" >Registro de Roles</p></font>
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
            <div class="row" style="background-color: #f2f2f1">
              <form>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group"> 
                    {{ Form::label('name','Tipo de Rol:') }}
                    {{ Form::text('name',null,['class'=>'form-control']) }}
                  </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group"> 
                    {{ Form::label('slug','URL(Acceso rapido):') }}
                    {{ Form::text('slug',null,['class'=>'form-control']) }}
                  </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group"> 
                    {{ Form::label('descripcion','Descripcion del Rol:') }}
                    {{ Form::text('descripcion',null,['class'=>'form-control']) }}
                  </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <u><h3> <font size="4" face="Comic Sans MS,arial,verdana" color="0e4743">Permiso Especial:</font></h3></u>
                    <div class="form-group">
                      <label>{{ Form::radio('special','all-access') }}Acceso total</label>
                      <label>{{ Form::radio('special','no-access') }}Ningun acceso</label>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
                  <u><h3><font size="4" face="Comic Sans MS,arial,verdana" color="0e4743">Listado de Permisos:</font></h3></u>
                    <div class="form-group"> 
                      <ul class="list-unstyled"> 
                        @foreach($permissions as $permission)
                          <li>
                            <label>
                              {{ Form::checkbox('permissions[]',$permission->id,null) }}
                              {{ $permission->name }}
                            </label>
                          </li> 
                        @endforeach
                      </ul>
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
              </form>
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
    <div class="table-responsive">
      <table class="table datatable" style="text-align:center;" >
        <thead style="background-color:#1c779e">
          <tr>
            <th style="text-align:left"><font color="white">ROLE</font></th>
            <th style="text-align:left"><font color="white">DESCRIPCIÓN </font></th>
            <th style="text-align:center;"><font color="white" >OPCIONES</th>
          </tr>
        </thead>
          @foreach($roles as $role)
            <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
              <td align="left"><i class="fa fa-user"></i> {{$role->name}}</td>
              <td align="left"> {{$role->descripcion}}</td>


              <td >

                @can('roles.show')
                <a href="{{ route('roles.show', $role->id) }}"> <button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a>
                @endcan

                @can('roles.edit')
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-secondary"><button type="button" class="btn btn-info" style="color: white; background-color: #d2691e"><span class="fa fa-pencil"></span></button></a>
                @endcan 

                @can('roles.destroy')
                  {!! Form::open(['route' =>['roles.destroy', $role->id], 'method'=>'DELETE', 'class'=>'btn btn-sm btn-secondary']) !!} 
                    <button   class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-trash" ></span></button> 
                  {!! Form::close() !!}
                @endcan

              </td>
            </tr>
          @endforeach
      </table>
      {{ $roles-> render() }}
    </div>
  </div>
</div>
@endsection









