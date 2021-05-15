@extends ('layouts.admin')
@section ('contenido')

		<div class="row">
			<div class="panel panel-primary">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					
					<font size=6 face="Comic Sans MS,arial,verdana" color=#3346FF><p align="center">Examen Clinico</p></font>
				</div>

			</div>
		</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="fecha_registro_p">Fecha de Registro de Examen</label>
					<p><?php echo formatoFecha($registroexamen->fecha_examen);?></p>
				</div>
			</div>
		
		</div>	
	
			
					
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<table id="detalles" class="table table-striped table-bordered table-condensed table-hover" style="text-align:justify-all;" border="1">
								<thead style="background-color:#A3E4D7" >
						
									<TR>
									<TD>Tipo Examen: </TD><td>{{$registroexamen->tipo_examen}}</td>
									</TR>

									<TR>
									<TD>Precio  $:</TD><td>{{$registroexamen->precio}}</td>
									</TR>

									<TR>
									<TD>Nombre:</TD><td>{{$registroexamen->nombre_examen}}</td>
									</TR>								
								</thead>
								
							</table>
						</div>
								
		
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

<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
@section('scripts')