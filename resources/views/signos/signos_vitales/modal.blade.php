<div data-backdrop="static" class="modal fade" id="modal-delete-{{$sig->idsignos_vitales}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document"> 
	 
	{{Form::open(array('action'=>array('SignosVitalesController@destroy',$sig->idsignos_vitales),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
				
			</div> 
			<div class="modal-header">
				 <div style="text-align: right;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">X</span>
				</button></div> 
				<font size="6" face="Comic Sans MS,arial,verdana" color="blue"><p align="center"><legend aling="center"  >ENVIAR A CONSULTA</legend></p></font>
			</div>
			<div class="modal-body">
				<font size="3" face="Comic Sans MS,arial,verdana" color="#436b95"><p align="left" aling="center"> Confirme si desea Enviar a Consulta</p><br></font>
			</div>
			<div class="modal-footer">
				
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::close()}}

</div> 








