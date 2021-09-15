@extends('layouts.admin')
@section('content') 
<div class="row">   
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> 
		<h3><FONT FACE="times new roman" size="6" color="0e4743"> Consulta Médica </FONT></h3> 
	</div>  
</div>  
<div class="row">    
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
		<div class="table-responsive">
			<table class="table datatable" style="text-align:justify;">
				<thead style="background-color:#1c779e" >
					<th style="text-align:left;"><font color="white" >PACIENTE</th>
					<th style="text-align:center;"><font color="white" >ESTADO</th>
					<th style="text-align:center;"><font color="white" >OPCIONES</th>
				</thead>
				@foreach ($consulta_medica as $cons) 
					<tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
						<td align="left" ><i class="fa fa-user"></i> {{ $sig->nombre_p}} {{$sig->apellido_p}}</td>
						<td>
							@if($sig->estado == 'EN CONSULTA')
								<p class="text-center"><small class="label pull center p1 bg-olive">{{$sig->estado}} </small></p>
							@else 
								<small class="label pull center p1 bg-red">{{$sig->estado}} </small>
                  			@endif    
          				</td>
          				<td align="center">
          					<a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-consulta-medica-{{$sig->idpaciente}}" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus" color="0e4743"></span></button></a>
                    <a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-historial-{{$sig->idpaciente}}" style="color: #FFFFFF; background-color:#DF6F21"><span class="fa fa-list" color="0e4743"></span></button></a>
                                    

          				</td>
					</tr>
					@include('consulta.consulta_medica.create')
          @include('consulta.consulta_medica.historial')
				@endforeach
			</table>
		</div>
	</div>
</div>