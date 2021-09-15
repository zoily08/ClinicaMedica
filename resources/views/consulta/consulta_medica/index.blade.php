@extends('layouts.admin')
@section('content') 



<div class="row">   
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> 
		<h3><FONT FACE="times new roman" size="6" color="0e4743"> Consulta Médica </FONT></h3> 
	</div>  
</div>  
<div class="row">    
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
		<div class="table-responsive" style="overflow: auto">
      		<table class="table table-striped table-bordered table-condensed table-hover datatable"
                style="text-align:center;">
				<thead style="background-color:#1c779e" >
					<th style="text-align:left;"><font color="white" >PACIENTE</th>
					<th style="text-align:center;"><font color="white" >ESTADO</th>
					<th style="text-align:center;"><font color="white" >OPCIONES</th>
				</thead> 
				@foreach ($signos as $sig)   
				
					<tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'> 
						<td align="left" ><i class="fa fa-user"></i> {{ $sig->nombre_p}} {{$sig->apellido_p}}</td> 
						<td> 
							@if($sig->estado == 'EN CONSULTA')
								<p class="text-center"><small class="label pull center p1 bg-olive">{{$sig->estado}} </small></p>
							@else  
              			@endif    
          				</td> 
          				<td align="center">  
          					
          					<a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-consulta-medica-{{$sig->idpaciente}}" onclick="enableInputs()" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus" color="0e4743"></span></button></a>

          					<a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-historial-{{$sig->idpaciente}}" style="color: #FFFFFF; background-color:#DF6F21"><span class="fa fa-list" color="0e4743"></span></button></a>
                                    

          				</td> 
					</tr>
                
          			@include('consulta.consulta_medica.historial')
				@endforeach
			</table>
		</div>
	</div>
</div>
@include('consulta.consulta_medica.create')

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


 

