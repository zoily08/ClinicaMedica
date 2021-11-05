@extends ('layouts.admin')
@section('content')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3><FONT FACE="times new roman" size="6" color="0e4743"> Consulta Psicologica </FONT><a></a></h3>      		
	</div>
</div>

{!!Form::open(array('url'=>'consulta/consulta_psicologica','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
@foreach($consultap as $conp)
<div data-backdrop="static" class="modal" id="exampleModal-{{$conp->idpaciente}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
		<div class="modal-dialog modal-lg" role="document"> 
   			<div class="modal-content"> 
      			<div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
      				<font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Registro Consulta Psicologica</p></font>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span> 
       					</button> 
       			</div>
       			 
       						<div class="modal-body">  
      							<form> 
      								<div class="row"  style="background-color: #f2f2f1">
      									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      										<div class="form-group">
      											<label for="idpaciente">Paciente</label>
      												<div class="input-group margin-bottom-sm">
  														<span class="input-group-addon"><i class="fa fa-street-view"></i></span>
														<label name="idpaciente" class="form-control " id="idpaciente" data-live-search="true" >
													
                                                    <option value="{{$conp->idpaciente}}"> {{$conp->nombre_p}} {{$conp->apellido_p}} </option>
                                               	 	
                                            	</label>
													</div>
											</div>
										</div>
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<label for="detalle">(*)  Detalle de la Consulta</label>
													<textarea class="form-control" type="text" name="detalle"   rows="5" cols="50" placeholder="Detalle..."></textarea>
											</div>
										</div>
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<div class="form-group">
												<label for="observacion">(*)Observación</label>
													<textarea class="form-control" type="text" name="observacion"   rows="5" cols="50" placeholder="Observación..."></textarea>
                        					</div>
										</div>
										<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="fecha_consulta">(*) Fecha Registro:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  										<input class="form-control" type="date" name="fecha_consulta" id="fecha_consulta"  placeholder="fecha_consulta" max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>">
										</div>
									</div>
								</div>

										
									</div>
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">	
								 		<div class="form-group">
											<div class="input-group margin-bottom-sm">
									 			<p class="text-danger">(*) Campos Requeridos</p>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
									<div class="form-group">
										<button class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
										<button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
										<button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
											<span class="fa fa-retweet"></span>
											<span aria-hidden="true">Salir</span>
										</button>
									</div>
								</div>
							</div>
						
						</div>
					</div>
				</div>
@endforeach

{!! Form::close() !!}











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
					<td align="left" ><i class="fa fa-user"></i> {{$conp->nombre_p}} </td>
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
        document.getElementById('fecha_consulta').value=ano+"-"+mes+"-"+dia;
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

