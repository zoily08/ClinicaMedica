@extends('layouts.admin')
@section('content') 
<script type="text/javascript">
  jQuery(function($) {
      $('input,form').attr('autocomplete','off');
      $("#telefono").mask("0000-0000",{placeholder: '0000-0000'} );
      //$('textarea,form').attr('autocomplete','off');
    });
  function llama_Edad() {
    var a =calcularEdad($('#idfecha').val());
     $('#Idedad_p').val(a);
     //alert("Holas");
   } 
////////
function calcularEdad(fecha) {
        // Si la fecha es correcta, calculamos la edad

        if (typeof fecha != "string" && fecha && esNumero(fecha.getTime())) {
            fecha = formatDate(fecha, "yyyy-MM-dd");
        }

        var values = fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];

        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth() + 1;
        var ahora_dia = fecha_hoy.getDate();

        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
        if (ahora_mes < mes) {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia)) {
            edad--;
        }
        if (edad > 1900) {
            edad -= 1900;
        }

        // calculamos los meses
        var meses = 0;

        if (ahora_mes > mes && dia > ahora_dia)
            meses = ahora_mes - mes - 1;
        else if (ahora_mes > mes)
            meses = ahora_mes - mes
        if (ahora_mes < mes && dia < ahora_dia)
            meses = 12 - (mes - ahora_mes);
        else if (ahora_mes < mes)
            meses = 12 - (mes - ahora_mes + 1);
        if (ahora_mes == mes && dia > ahora_dia)
            meses = 11;

        // calculamos los dias
        var dias = 0;
        if (ahora_dia > dia)
            dias = ahora_dia - dia;
        if (ahora_dia < dia) {
            ultimoDiaMes = new Date(ahora_ano, ahora_mes - 1, 0);
            dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
        }

        return edad + " años";
    }


      


   </script>


   <div  class="row" >
        <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            

            <h3><FONT FACE="times new roman " size="6" color="0e4743" >Listado de Usuarios</FONT>

                @can('users.create')
                     <a ><button type="button"  class="btn btn-success" data-toggle="modal" data-target="#exampleModal" title="Agregar un Nuevo Usuario" style="color: #003366; background-color: #99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span></button>

                     </a>


                          <a href="{{ route('users.pdf') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download"> PDF</span></button>
  
  
                         </a>


                         <a href="{{ route('users.excel') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download">  EXCEL</span></button>
  
  
                         </a>
                      @endcan


                      </h3>
            {!!Form::open(array('url'=>'users','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
              {{Form::token()}}
               
              <div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal" role="document">
              <div class="modal-content">
                   <div style="background-image:url({{asset ('img/100.jpg')}});" class="modal-header">

                     <font size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center" >Registro de Nuevo Usuario</p></font>

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


                 <div class="modal-body"  style="background-color: #f5fffa" >
                <form >

                  <strong>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="color: black;" >{{ __('(*) Nombre:') }}</label>

                            <div class="col-md-6">
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  placeholder="Nombre del Usuario..." required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('(*) Apellidos:') }}</label>

                            <div class="col-md-6">
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input id="apellido" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ old('apellidos') }}"  placeholder="Apellidos del Usuario..." required autofocus>

                                @if ($errors->has('apellidos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>


                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('(*) Dirección:') }}</label>

                            <div class="col-md-6">
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" placeholder="Direccion del Usuario..." required autofocus>

                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </div>

                        <div class="form-group row">
                            <label for="fechanacimiento" class="col-md-4 col-form-label text-md-right">{{ __('(*) Fecha de Nacimiento:') }}</label>

                            <div class="col-md-6">
                            <div class="input-group margin-bottom-sm">
                               <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                <input type="Date"  min="1940" 
                                 class="form-control{{ $errors->has('fechanacimiento') ? ' is-invalid' : '' }}" name="fechanacimiento" value="{{ old('fechanacimiento') }}" id ="idfecha" placeholder="fecha de nacimiento del ususario... " onchange="llama_Edad()" 
                              max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."- 18 year "));?>"/>

                                @if ($errors->has('fechanacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechanacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div> 
                        <!-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <div class="form-group">
                              <label for="fechanacimiento"><span> (*) Fecha de Nacimiento:</span></label>
                         <div class="input-group margin-bottom-sm">
                               <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                              <input type="Date" min="1940" class="form-control" type="text" name="fechanacimiento"   id ="idfecha" placeholder="fecha de nacimiento del usuario... " onchange="llama_Edad()" 
                              max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."- 18 year "));?>"/>
                          </div>
                      </div>
                  </div>--> 

                         <!-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                       <div class="form-group">
                                <label for="edad"><span> Edad:</span></label>
                            <div class="input-group margin-bottom-sm">
                                  <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                                 <input class="form-control" type="text" name="edad" required value="{{old('edad del usuario')}}"  placeholder="Edad del Usuario..." readonly="readonly" Id="Idedad_p">
                            </div>
                            
                      </div>
                 </div>-->

                       <div class="form-group row">
                            <label for="edad" class="col-md-4 col-form-label text-md-right">{{ __(' (*) Edad:') }}</label>
                            <div class="col-md-6">
                            <div class="input-group margin-bottom-sm">
                               <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                                <input  type="text"  class="form-control{{ $errors->has('edad') ? ' is-invalid' : '' }}" name="edad" value="{{ old('edad') }}"placeholder="Edad del Usuario..." readonly="readonly" Id="Idedad_p">

                                @if ($errors->has('edad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('edad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('(*) Teléfono:') }}</label>

                            <div class="col-md-6">
                            <div class="input-group margin-bottom-sm">
                               <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono" required autofocus>

                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div> 

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('(*) Dirección   de Correo Electrónico :') }}</label>

                            <div class="col-md-6">
                            <div class="input-group margin-bottom-sm">
                               <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div> 

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('(*) Contraseña:') }}</label>

                            <div class="col-md-6">
                            <div class="input-group margin-bottom-sm">
                               <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div> 

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('(*) Confirmar Contraseña:') }}</label>

                            <div class="col-md-6">
                            <div class="input-group margin-bottom-sm">
                               <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                            </div>
                      </div> 
                      </div>  
                      <div class="col-md-6">
                    <div class="form-group row">
                      <div class="input-group margin-bottom-sm">
                        <p class="text-danger"> (*)  Campos requeridos</p>
                      </div>
                    </div>
                  </div>
                        <hr>
               
                  </strong>
                 
                </form>


                </div>

                <div class="modal-footer">
                  <div class="form-group">

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

          </div >

    </div >

  
{!!Form::close()!!}
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="table-responsive">
      <table class="table datatable" style="text-align:center;" >
        <thead style="background-color:#1c779e">
          <tr>
            <th style="text-align:left"><font color="white">USUARIO</font></th>
            <th style="text-align:left"><font color="white">CORREO ELECTRONICO</font></th>
            <th style="text-align:left"><font color="white">DIRECCION</font></th>
            <th style="text-align:center"><font color="white">TELEFONO</font></th>
            <th style="text-align:center;"><font color="white" >OPCIONES</th>
         </tr>
       </thead>
        @foreach($users as $user)
        <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
          <td align="left"><i class="fa fa-user fa-fw"></i>{{ $user->name }}</td>
          <td align="left"><i class="fa fa-user fa-fw"></i>{{ $user->email }}</td>
          <td align="left">{{ $user-> direccion}}</td>
          <td >{{ $user->telefono}}</td>

          <td > 
            @can('users.edit')
              <a class="btn btn-primary" style="color: white; background-color: #d2691e" href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
            @endcan

            @can('users.destroy')
              {!! Form::open(['route' =>['users.destroy', $user->id], 'method'=>'DELETE', 'class'=>'btn btn-sm btn-secondary']) !!}
               <button class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-trash" ></span></button>    
              {!! Form::close() !!}
            @endcan
          </td>
        </tr>
        @endforeach
      </table>    
      {{ $users-> render() }}
    </div>
  </div>
</div>

  

    @endsection 

