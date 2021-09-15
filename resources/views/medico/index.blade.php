@extends('layouts.admin')
@section('content') 

{!!Html::script('js/jQuery-2.1.4.min.js')!!}
{!!Html::script('js/jquery.mask.min.js')!!}

<script type="text/javascript">
 
jQuery(function($) {
      $('input,form').attr('autocomplete','off');
      $("#telefono").mask("0000-0000",{placeholder: '0000-0000'} );
      //$('textarea,form').attr('autocomplete','off');
   });

</script>

<div  class="row"  >
  <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3><FONT FACE="times new roman " size="6" color="0e4743" >Listado de Médicos</FONT>
        <a ><button type="button"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" title="Agregar un Nuevo Medico" style="color:#003366; background-color: #99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span></button></a></h3>
      {!!Form::open(array('url'=>'medico','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
          <div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content modal-lg">
                <div style="background-image:url({{asset ('img/100.jpg')}});" class="modal-header">
                  <font size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center" >Registro de Médicos</p></font>
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
                    <div class="form-group" >
                      <label for="nombre" danger="text"><span>  (*)Nombre del Médico :</span></label>
                        <div class="input-group margin-bottom-sm">
                          <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input autocomplete="off" placeholder=" Nombre del consultorio" minlength="3" onkeypress="return soloLetras(event)" onpaste="return false" class="form-control" autofocus type="text" name="nombre" id="nombre" required value="{{old('nombre medico')}}">
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group" >
                      <label for="apellido" danger="text"><span> (*)Apellidos  del Médico :</span></label>
                        <div class="input-group margin-bottom-sm">
                          <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                          <input autocomplete="off" placeholder=" Apellidos del medico" minlength="3" onkeypress="return soloLetras(event)" onpaste="return false" class="form-control" autofocus type="text" name="apellido" id="apellido" required value="{{old('apellido medico')}}">
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="telefono">Teléfono del Médico :</label>
                        <div class="input-group margin-bottom-sm"><span class="input-group-addon"><i  class="fa fa-phone"></i></span>
                          <input class="form-control" type="text" name="telefono" id="telefono" onkeypress="return sololetras(event)" placeholder="Teléfono">
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="direccion"><span> (*)  Dirección del Médico :</span></label>
                        <div class="input-group margin-bottom-sm">
                          <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                          <input class="form-control" type="text" name="direccion" required value="{{old('direccion del medico')}}"  placeholder="Direccion del Medico...">
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
                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                      <div class="input-group margin-bottom-sm">
                        <p class="text-danger"> (*)  Campos requeridos</p>
                      </div>
                    </div>
                  </div>
                </form>
                </div>
                <div class="modal-footer" >
                  <div class="form-group" >
                    <button class="btn btn-primary" style="color: white; background-color: #0a302d"  type="submit">
                      <span class="fa fa-floppy-o"></span>  Guardar
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
          <th style="text-align:left"><font color="white">NOMBRES</font></th>
          <th style="text-align:left"><font color="white">APELLIDOS</font></th>
          <th style="text-align:left"><font color="white">TELEFONO</font></th> 
          <th style="text-align:left"><font color="white">ESPECIALIDAD</font></th>
          <th style="text-align:center"><font color="white">ESTADO</font></th>
          <th style="text-align:center"><font color="white">OPCIONES</font></th>
        </thead>
        @foreach ($medi as $medico)
          <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
            <td  align="left"><i class="fa fa-user fa-fw"></i>{{ $medico-> nombre}}</td>
            <td  align="left">{{ $medico-> apellido}}</td>
            <td  align="left">{{ $medico-> telefono}}</td>
            <td  align="left">
              @foreach ($espe as $especi) 
                @if ($medico->idespecialidad==$especi->idespecialidad)
                  <option value="{{$medico->idespecialidad}}" selected>{{$especi->nombre}}</option>
                @endif
              @endforeach
            </td>
            <td>
              @if($medico->estado == 'ACTIVO')
                <p class="text-center"><small class="label pull center p1 bg-olive">{{$medico->estado}} </small></p>
              @else
                <small class="label pull center p1 bg-red">{{$medico->estado}} </small>
              @endif
            </td>
            <td>
              @can('medico.show')
                <a href="{{URL::action('MedicoController@show',$medico->idmedico)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a>
              @endcan

              @can('medico.edit')
                <a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-medico-edit-{{ $medico->idmedico }}"><i class="fa fa-pencil"></i></a>
              @endcan

              @can('medico.destroy')
                @if($medico->estado == 'ACTIVO')
                  <a href="" data-target="#modal-delete-{{$medico->idmedico}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-level-down"></span></button></a>
                @else
                  <a href="" data-target="#modal-delete-{{$medico->idmedico}}" data-toggle="modal"><button type="button" class="btn btn-primary mb1 bg-red" style="color: #003366; background-color: #5affab"><span class="fa fa-level-up"></span></button></a>
                @endif
              @endcan
            </td>
          </tr>
          @include('medico.edit', ['medico' => $medico])
          @include('medico.modal')
          @endforeach
      </table>
    </div>
    {{$medi->render()}}
  </div>
</div>

@endsection






