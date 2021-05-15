@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <!--<div class="card-header">{{ __('Login') }}</div>-->

               <!--<div class="card-header">
                <font size=4  color="Navy red" ><p align="left"> Inicio de Session </p></font>
                </div>-->
                <!-- <div  class="card-header">
                 <font style="align:center" size="4" face="Comic Sans MS,arial,verdana"><p><span style="align:center;width:400px" color="blue" >Inicio de Sesión </span></font></p>
                 </div>-->



                
                <fieldset  alig="center" style="min-width: 0;padding:.35em .625em .75em!important;margin:0 2px;
                border:2px solid silver!important;margin-bottom: 10em;box-shadow: -6px 10px 20px 0px;">

                 <legend style="width: inherit;padding:inherit;border:2px solid silver;" class="legend"><div style="color: #112b56"><B>Inicio de Sesión</B></div></legend>

                <div  class="card-header" style="background-color: #f8f8f8">




                <div class="card-body" style="background-color: #f5fffa">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <strong>

                        <div class="form-group row">
                            <label  placeholder=" &#128272;" for="email" class="col-sm-4 col-form-label text-md-right">
                            <font style="align:center" size="4" face="Arial"><p><span style="align:center;width:400px" style="color: rgba(76,113,117,0.8);" >Correo  Electrónico :</span></font></p>
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                           <label  placeholder=" &#128272;" for="email" class="col-sm-4 col-form-label text-md-right">
                            <font style="align:center" size="4" face="Arial"><p><span style="align:center;width:400px" style="color: rgba(76,113,117,0.8);" >Contraseña:</span></font></p>
                            </label>

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
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordar contraseña!!') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="color: white; background-color: #0a302d">
                                    {{ __('Iniciar Sesión ') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <!--{{ __('Olvidaste tu Contraseña?') }}-->

                                        Olvidaste tu Contraseña?
                                    </a>
                                @endif

                                <strong>
                            </div>
                        </div>
                    </form>
                     </fieldset>
            </div>
                </div>
            
    </div>
</div>
@endsection
