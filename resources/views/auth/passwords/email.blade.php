@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <!-- <div  class="card-header">
                 <font size=4  color="blue" ><p align="left"> {{ __('Restablecer Contraseña') }} </p></font></div>-->
                  <div  class="card-header">
                 <font size=4  color="blue" style="align:center" size="4" face="Comic Sans MS,arial,verdana" ><p align="left" > Restablecer Contraseña</p></font>
                 </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Dirección   de Correo Electrónico :</label>
                             <!--<label  placeholder=" &#128272;" for="email" class="col-sm-4 col-form-label text-md-right">
                            <font style="align:center" size="2" face="Arial"><p><span style="align:center;width:400px" style="color: rgba(76,113,117,0.8);" > Dirección   de Correo Electrónico :</span></font></p>
                            </label>-->


                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar enlance para Reestablecer Contraseñaaa') }}
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
