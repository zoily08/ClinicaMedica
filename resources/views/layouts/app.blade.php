<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.CLÍNICA MÉDICA ', 'CLÍNICA MÉDICA ') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        


      <!-- <nav class="navbar navbar-expand-sm navbar-dark navbar-SisClinica" style="background-color: #005a65;" >-->

       <!--<nav class="navbar navbar-expand-sm navbar-dark navbar-SisClinica" style="background-color: #072a5c;">-->

       
         <!--<nav class="navbar navbar-default" style="background-color: #005a65!important;" role="navigation">-->

            <!-- <div class="container">

           <a class="navbar-brand" href="{{ url('') }}">
                    {{ config('app.inicio', 'PANTALLA PRINCIPAL') }}
                </a>-->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <!--@guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('INICIAR  SESIÓN') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}"></a></li>
                        @else-->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
                                    {{ Auth::user()->name }} <span class="caret" ></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                       <!-- @endguest-->
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

             <!--<body background = {{asset ('img/2.jpg')}}style="background-position:50px 200px ";style="background-position:absolute ";-->
          <!-- <body background = {{asset ('img/Hospital.jpg')}}
                                style="background-size:950px";
                                
                                 style="background-position: top center";
                                style="background-repeat: no-repeat";
                                


                                 >-->

                                 <body background = {{asset ('img/sa.jpg')}}
                                style="background-size:100% 150%"; 
                                
                                style="background-position: center center";
                                style="background-repeat: no-repeat";
                                


                                 >





                               <!--<img src={{asset ('img/Hospital.jpg')}} margin-top: 90px"  gn=left >

                        <body background-image: url(../img/hospital.jpg); 
                               style="background-position: top center"; style="background-repeat: no-repeat";
                               style="padding-top: 30%";
>
                                </body>-->

        </main>
    </div>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
<style>
body {


  background-color: #189ad8;
}

/*
-webkit-animation: colorchange 60s infinite; 
    animation: colorchange 60s infinite;

}
@-webkit-keyframes colorchange {
     background-color: orange;
     0%  {background: #33FFF3;}
    25%  {background: #78281F;}
    50%  {background: #117A65;}
    75%  {background: #DC7633;}
    100% {background: #9B59B6;}
}
@keyframes colorchange {
     0%  {background: #33FFF3;}
    25%  {background: #78281F;}
    50%  {background: #117A65;}
    75%  {background: #DC7633;}
    100% {background: #9B59B6;}
}  */ 
</style>
</head>
<body>
</body>
</html>