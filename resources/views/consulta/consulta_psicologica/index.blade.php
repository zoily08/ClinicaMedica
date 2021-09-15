@extends ('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3><FONT FACE="times new roman" size="6" color="0e4743"> Consulta Psicologica </FONT><a></a></h3>      		
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
		<div type="hidden" class="table-responsive" id="table_list" style="display:block">
			<table class="table datatable" style="text-align:center;">
				<thead style="background-color:#1c779e">
					<th style="text-align:left;"><font color="white" >NOMBRE DEL PACIENTE</th>
					<th style="text-align:center;"><font color="white" >ESTADO</th>
					<th style="text-align:center;"><font color="white" >OPCIONES</th> 
				</thead>
				@foreach ($consultap as $conp)  
				<tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
					<td align="left" ><i class="fa fa-user"></i> {{$conp->nombre_p}}</td>
					<td> 
							@if($conp->estado == 'A CONSULTA')
								<p class="text-center"><small class="label pull center p1 bg-olive">{{$conp->estado}} </small></p>
							@else  
              			@endif    
          				</td>
					<td>
					<div style="text-align:center;">
						@can('consulta.consulta_psicologica.create')
						<a href="" data-target="#exampleModal-{{$conp->idpaciente}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle"></span></button></a>
 
						@endcan

						 @can('consulta.consulta_psicologica.show')
						<a href="{{URL::action('ConsultaPsicologicaController@show',$conp->idconsulta_psicologica)}}"><button type="button" class="btn btn-Secondary " ><span class="fa fa-eye"></span></button></a>
						 @endcan

                          @can('consulta.consulta_psicologica.edit')
                          <a class="btn btn-primary" style="color: white; background-color: #d2691e" data-toggle="modal" href="#modal-consulta_psicologica-edit-{{ $conp->idconsulta_psicologica }}"><i class="fa fa-pencil"></i></a>
						 @endcan 

					
                          @can('consulta.consulta_psicologica.destroy')
						<a href="" data-target="#modal-delete-{{$conp->idconsulta_psicologica}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-level-down"></span></button></a>
						@endcan
					</div>
					</td>
				</tr>
				@include('consulta.consulta_psicologica.edit', ['conp' => $conp])
				@endforeach
			</table>
		</div>
		{{$consultap->render()}}
	</div>
</div>
@include('consulta.consulta_psicologica.create')
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
@endsection

<?php 
$time=time();
    
    function dameFecha($fecha,$dia){
        list($year,$mon,$day)=explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));    
    }
   $total=0; 
   function formatoFecha($fecha){
    return date("d-m-Y",strtotime($fecha));
  } 
?>	

