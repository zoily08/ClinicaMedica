<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CLÍNICA  MÉDICA  </title>


  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->


     <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
     <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
     <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>

    <script rel="stylesheet" href="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script rel="stylesheet" href="{{asset('js/dropdown.js')}}"></script>
     <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

 

     <style type="text/css">
       .modal {
        text-align: center;
        padding: 0!important;
      }

      .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
      }

      .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
      }

      .fixed_header{
        width: auto;
        table-layout: fixed;
        border-collapse: collapse;
      }

      .fixed_header tbody{
        display:block;
        width: 100%;
        overflow: auto;
        height: 100px;
      }

      .fixed_header thead tr {
       display: block;
     }

     .fixed_header thead {
      background: blue;
      color:#fff;
    }

    .fixed_header th, .fixed_header td {
      padding: 5px;
      text-align: left;
      width: 200px;
    }

  </style>

</head>
<body class="hold-transition skin-purple-light  sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="index2.html" class="logo" style="background-color: #126180;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini" style="background-color: #126180;"><b>CMS</b>R</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg" style="background-color: #126180;" ><b>SisClínica</b></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation" style="background-color: #126180;" style=" color: #1c2323;">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="background-color:#126180;">
          <span class="sr-only">Navegación</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu" style="background-color:  #126180;">
          <ul class="nav navbar-nav" style="background-color:  #126180;">


            <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account: style can be found in dropdown.less -->

                 <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  

                <li><a href="{{url('registro/paciente')  }}"><i class="fa fa-male fa-2x" class="text-red" title="Expediente del Paciente"></i></a></li>
               
               <li><a href="{{url('compras/ingreso')  }}"><i class="fa fa-th fa-2x" title="Compra de Medicamentos"></i> </a></li>

               <li><a href="{{url('compras/ingreso')  }}"><i class="fa fa-calendar fa-2x" title="Citas Medicas"></i> </a></li>

               <li><a href="{{url('seguridad/usuario')  }}"><i class="fa fa-edit fa-2x" title="Registro de Usuarios"></i> </a></li>

               <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fa fa-sign-out fa-fw fa-3x"></i> {{ __('Cerrar Sesión ') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>


                      <div class="collapse navbar-collapse" id="app-navbar-collapse" style="background-color:  #126180;">


                        <ul class="navbar-nav mr-auto" style="background-color: #126180;">

                        </ul>
                        
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto" style="background-color:#126180;">
                          <!-- Authentication Links -->
                          @guest
                          <li class="nav-item" style="background-color:  #126180;">
                            <a class="nav-link" href="{{ route('login') }}"></a>
                          </li>

                              <li class="nav-item">
                                @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}"></a>
                                @endif
                              </li>
                              @else
                             
                            @endguest
                          </ul>
                        </div>

                        @if(session('info'))

                        <div class="container">
                          <div class="row">

                            <div class="col-md-8 col-md-offset-2">
                              <div class="alert alert-success">
                                {{ session('info') }}
                              </div>

                            </div>
                          </div>
                        </div>
                        @endif
 
              </li>
              
            </ul>
          </div>

        </nav>
      </header>


      
        <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar"  >
          <!-- Sidebar user panel -->
          <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search0...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat" data-toggle="push-menu"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
     <ul class="sidebar-menu tree" data-widget="tree">

            <li class="header" ></li>

            <li class="treeview" >

              @can('users.index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
               <!-- <img src="img/paciente.ico" alt="" >-->
                <span>Seguridad</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> Usuario</a></li>
              </ul>

              <ul class="treeview-menu">
                <li><a href="{{ route('roles.index') }}"><i class="fa fa-user"></i> Roles</a></li>
              </ul>

                       
            </li>
            @endcan()




              
               @can('registro.paceiente.index')
                <li><a href="{{url('registro/paciente')  }}"><i class="fa fa-male"></i>Paciente</a></li>
                  @endcan()

                @can('especificacion.index')
                <li><a href="{{url('consulta/especificacion')  }}"><i class="fa fa-list-alt"></i>Especificación</a></li>
                  @endcan()

                 @can('signos.signos_vitales.index')
                <li><a href="{{url('signos/signos_vitales')  }}"><i class="fa fa-file"></i>Toma de Signos Vitales</a></li>
                  @endcan()
              
               @can('citas.index')
                <li><a href="{{url('citas')  }}"><i class="fa fa-calendar fa-fw"></i>  Citas Médicas</a></li>
                  @endcan()
         
            </li>

             
             <li class="treeview" >
             
              
                
                 @can('consulta.consulta_medica.index')
              <li><a href="{{url('consulta/consulta_medica')  }}"><i class="fa fa-stethoscope"></i> Médica</a></li>
                @endcan()
              
               @can('consulta.consulta_psicologica.index')
                <li><a href="{{url('consulta/consulta_psicologica')  }}"><i class="fa fa-stethoscope"></i>Psicológica</a></li>
                  @endcan()
                
             </li>
           
             <li class="treeview" >
              
               @can('examen.index')
              <li><a href="{{ route('laboratory.order') }}"><i class="fa fa-file"></i> Ordenes de Examenes</a></li>
                @endcan()

               @can('examen.index')
               <li><a href=""><i class="fa fa-check-circle"></i> 
                Resultados</a></li>
                  @endcan()
                
                
               
            </li>
     
            <li class="treeview" >
             
               @can('users.index')
                <li><a href="{{ route('users.index') }}"><i class="fa fa-male"></i> Usuario</a></li>
                  @endcan()

                 @can('roles.index')
                <li><a href="{{ route('roles.index') }}"><i class="fa fa-user"></i> Roles</a></li>
                  @endcan()
               
            </li>

            <li class="treeview" >
              

               @can('medicos.index')
                <li><a href="{{url('medico')}}"><i class="fa fa-user-md"></i> Médicos</a></li>
                  @endcan()
                
               @can('consultorio.index')
                <li><a href="{{url('consultorio')}}"><i class="fa fa-edit"></i> Consultorio</a></li>
                  @endcan()

                 @can('especialidad.index')
                <li><a href="{{url('especialidad')}}"><i class="fa fa-users"></i> Especialidad</a></li>
                  @endcan()
              
              @can('sintomas.index')
               <li><a href="{{url('sintomas') }}"><i class="fa fa-heartbeat"></i>  Ingreso de Síntomas</a></li>
                 @endcan()

                 @can('enfermedad.index')
                <li><a href="{{url('enfermedad') }}"><i class="fa fa-wheelchair"></i>Ingreso de Enfermedad</a></li>
                  @endcan()


                 @can('consulta.index')
                <li><a href="{{url('consulta/Tipoconsulta')}}"><i class="fa fa-stethoscope"></i>Tipo de Consulta</a></li>
                  @endcan()
             

                @can('area.index')
               <li><a href="{{url('area') }}"><i class="fa fa-file"></i> 
                Ingreso de una Area</a></li>
                  @endcan()

                
                 @can('examen.index')
                <li><a href="{{url('exams')}}"><i class="fa fa-edit"></i> Ingreso de Examenes</a></li>
                  @endcan()
                
              
               @can('proveedor.producto.index')
               <li><a href="{{url('proveedor/producto')  }}"><i class="fa fa-ban"></i> Productos</a></li>
                 @endcan() 

                 
                 @can('proveedor.registro.index')
                <li><a href="{{url('proveedor/registro')  }}"><i class="fa fa-users"></i> Proveedores</a></li>
                  @endcan()

                 @can('compras.ingreso.index')
                <li><a href="{{url('compras/ingreso')}}"><i class="fa fa-edit"></i>  Compras</a></li>
                  @endcan()

                 @can('compras.ingreso.index')
                <li><a href="{{url('ventas/venta')  }}"><i class="fa fa-shopping-cart"></i> Ventas</a></li>  
                  @endcan()
                

                </li>

             <li>
                <i class="fa fa-question-circle"></i> 
                <strong> <span>AYUDA</span></strong>
                <small class="label pull-right bg-red">PDF</small></u></strong>
          
            </li>

            <br>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i>
                <strong><span>Acerca De...</span></strong>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!--aca empieza-->
      <!--<nav class="navbar navbar-default" role="navigation">-->
  <!-- El logotipo y el icono que despliega el menú se agrupan
   para mostrarlos mejor en los dispositivos móviles -->
   
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
   otro elemento que se pueda ocultar al minimizar la barra -->
   
   <!--</nav>-->
   <!--aca termina-->




   <!--Contenido-->
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title" class="text-danger">Clínica Médica Santa Rosa</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <!--Contenido-->

                  
                  @yield('content')
                              <!--Fin Contenido-->
                              
                             <body background = {{asset ('img/Hospital.jpg')}}
                             style="background-size:1100px";
                             style="background-position:absolute ";
                             


                             >



                           </div>
                         </div>
                         
                       </div>
                     </div><!-- /.row -->
                   </div><!-- /.box-body -->
                 </div><!-- /.box -->
               </div><!-- /.col -->
             </div><!-- /.row -->

           </section><!-- /.content -->
         </div><!-- /.content-wrapper -->
         <!--Fin-Contenido-->
         <footer class="main-footer">
          <strong>Copyright &copy; </strong> All rights reserved UES.
        </footer>

        
        
        {{-- <!-- jQuery 2.1.4 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
 --}}

        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        {!!Html::script('js/jquery.mask.min.js')!!}
        <!-- Bootstrap 3.3.5 -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/app.min.js')}}"></script>
      
        <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
        

        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
        



 <script>


    $(document).ready(function() {
      $('.datatable').DataTable({
        "scrollX": false,
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
      });
      $('.select2able').select2({
        minimumResultsForSearch:6,
        width: '100%'
      });
    });
    </script>
  

  <script>
    $(document).ready(function() {
      $('.solo-letras').keypress(function(e){
        console.log(e.target);
        var inputValue = e.which;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) { 
          e.preventDefault(); 
        }
      });

      $('.clear-form').on('hidden.bs.modal', function (e) {
        $(this)
        .find("input,textarea,select")
        .val('')
        .end()
        .find("input[type=checkbox], input[type=radio]")
        .prop("checked", "")
        .end();
      });

      $('[data-dismiss=modal]').on('click', function (e) {
        var $t = $(this),
        target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

        $(target)
        .find("input,textarea,select")
        .val('')
        .end()
        .find("input[type=checkbox], input[type=radio]")
        .prop("checked", "")
        .end();
      });
    });
  </script>

  @include('sweet::alert')





  @stack('scripts')

  @section('scripts')


  @show


</body>
</html>