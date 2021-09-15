@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>
            <FONT FACE="times new roman" size="6" color="0e4743"> Listado de Síntomas</FONT>
            <a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-sintomas-create" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span> 
            </button></a>

            

            {{-- @include('sintomas.search') --}}
        </h3>
        {{-- @include('sintomas.search') --}}   
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>
            <a  href="#" data-toggle="modal" data-target="#modal-sint_enf">Ir a Ingreso de Sintomas y Enfermedades</a>
        </h3>
    </div>
</div> 

<div class="row"> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
        <div class="table-responsive"> 
            <table class="table datatable" style="text-align:center;" >
                <thead style="background-color:#1c779e">
                    <th style="text-align:left;"><font color="white" >SÍNTOMA</th>
                    <th style="text-align:center;"><font color="white" >OPCIONES</th>
                </thead>
                <tbody>
                    @foreach ($sintomas as $sint)   
                        <tr>
                            <td align="left"><i class="fa fa-heartbeat"></i> {{ $sint-> nombre_sintomas}}</td>
                            <td align="center"> 
                                <a href="{{URL::action('SintomasController@show',$sint->idsintomas)}}"><button type="button" class="btn btn-Secondary "><span class="fa fa-eye"></span></button></a>
                                <a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-sintomas-edit-{{ $sint->idsintomas }}"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr> 
                        @include('sintomas.edit', ['sintomas'=> $sint])
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{-- {{ $sintomas->render() }} --}} 
            </div>
        </div>
    </div>
</div>
@include('sintomas.create')
@include('sintomas.sint_enf')
@endsection
 

    @push('scripts')
        <script>

            function soloLetras(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toLowerCase();
                letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                especiales = [8, 37, 39, 46];

                tecla_especial = false
                for(var i in especiales) { 
                    if(key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
            }

            if(letras.indexOf(tecla) == -1 && !tecla_especial)
                return false;
        }

        function soloNumeros(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " 0123456789-";
            especiales = [8,37,39,46];

            tecla_especial = false
            for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                } 
            }
            if(letras.indexOf(tecla)==-1 && !tecla_especial)
                return false;
        }

        function vNom(solicitar){
            var txt = solicitar.value;
            solicitar.value = txt.substring(0,1).toUpperCase() + txt.substring(1,txt.length);
        }

        </script>
          
    @endpush

