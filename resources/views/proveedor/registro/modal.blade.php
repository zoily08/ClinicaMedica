<div data-backdrop="static" class="modal fade" id="modal-delete-{{$pro->idproveedor}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document"> 

 {{Form::open(array('action'=>array('ProveedorController@destroy',$pro->idproveedor),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
			</div>
			@if($pro->estado_p == 'ACTIVO')
      				<font face="Comic Sans MS,arial,verdana"><p align="center"><legend aling="center" class="text-red" >¿DAR DE BAJA EL PROVEEDOR?</legend></p></font>
			
					<div class="modal-body">
						<p class="modal-title" size=4 face="Arial">Confirme si desea dar de baja el Proveedor </p>
					</div>
				@else 
					<font face="Comic Sans MS,arial,verdana"><p align="center"><legend aling="center" class="text-red" >DAR DE ALTA AL PROVEEDOR</legend></p></font>
					<div class="modal-body">
						<p>Confirme si desea dar de alta a el Proveedor</p>
					</div>
				@endif
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
				</div>
				
		
	</div>
	{{Form::close()}}


</div> 
