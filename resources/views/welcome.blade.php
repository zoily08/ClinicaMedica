<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CLINICA MEDICA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                width: 100%;
                margin: 0;
                padding: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" ><FONT size="4" color="0e4743" >Inicio de Sesión</FONT></a>

                       <!--@if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrooo</a>
                        @endif-->
                    @endauth
                </div>
            @endif

            <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    </div> <!-- -->

                   <!-- Has iniciado Sesion!-->
                

           <!-- <div class="content">
                <div class="title m-b-md">
                    SIS_Clinica
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    
                </div></div>

                <div class="links">
                    <a href="redirect">Redirect</a>
                    
                </div>-->

        

           <body background = {{asset ('img/logo_clinica.png')}}
                                style="background-size:100% 100%";
                                
                                 style="background-position: center center";
                                style="background-repeat: no-repeat"; 

                                


                                 >

                                  <!-- <body background = {{asset ('img/nuevaimagen.jpg')}}
                                style="background-size:1000px";
                                
                                 style="background-position: top center";
                                style="background-repeat: no-repeat";
                                


                                 >-->




        </div>
        @include('sweet::alert')
    </body>
</html>
