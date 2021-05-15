@extends('layouts.app')

@section('content')


 {!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}



   {!!Html::script('js/jquery-1.9.0.min.js')!!}
   {!!Html::script('js/sweetalert.min.js')!!}
   {!!Html::style('css/sweetalert.css')!!}
    {!!Html::script('js/jquery-1.7.2.min.js')!!}
     {!!Html::script('js/jquery.numeric.js')!!}
   {!!Html::script('js/jquery.mask.min.js')!!}

<script type="text/javascript">


jQuery(function($) {
      $('input,form').attr('autocomplete','off');
      $("#telefono").mask("0000-0000",{placeholder: '0000-0000'} );
      //$('textarea,form').attr('autocomplete','off');
   });

   </script>


<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-8" >
            <div class="card" >
                <!-- <div class="card-header">{{ __('Register') }}</div>-->
                <div  class="card-header" style="background-color: #f8f8f8" >
                 <!--<font size=4  color="blue" style="align:center" size="4" face="Comic Sans MS,arial,verdana" ><p align="left" > Registro de Usuarios al Sistema</p></font>-->

                 <FONT FACE="times new roman " size="6" color="0e4743" >Registro de Usuarios al Sistema</FONT>
                 </div>


                <div class="card-body" style="background-color: #f5fffa" >
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
<strong>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="color: black;" >{{ __('(*)Nombre:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('(*)Apellidos:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('(*)Dirección:') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" required autofocus>

                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fechanacimiento" class="col-md-4 col-form-label text-md-right">{{ __('(*) Fecha de Nacimiento:') }}</label>

                            <div class="col-md-6">
                                <input id="fechanacimiento" type="Date" class="form-control{{ $errors->has('fechanacimiento') ? ' is-invalid' : '' }}" name="fechanacimiento" value="{{ old('fechanacimiento') }}" required autofocus>

                                @if ($errors->has('fechanacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechanacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                      
                      

                       <div class="form-group row">
                            <label for="edad" class="col-md-4 col-form-label text-md-right">{{ __('(*) Edad:') }}</label>

                            <div class="col-md-6">
                                <input id="edad" type="text"  class="form-control{{ $errors->has('edad') ? ' is-invalid' : '' }}" name="edad" value="{{ old('edad') }}" required autofocus>

                                @if ($errors->has('edad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('edad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                


                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('(*)Telefono:') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required autofocus>

                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('(*)Dirección   de Correo Electrónico :') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('(*)Contraseña:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('(*)Confirmar Contraseña:') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                      </div>  




                <div class="form-group row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="form-group">
                          <div class="input-group margin-bottom-sm">
                              <p class="text-danger"> (*)  Campos requeridos</p>
                          </div>
                      </div>
                  </div>
                  </div>
                  </strong>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="color: white; background-color: #0a302d"  >
                                    {{ __('Guardar datos') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
