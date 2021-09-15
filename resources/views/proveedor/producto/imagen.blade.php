<div  class="modal fade" id="modal-imagen-{{$prod->idproducto}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">    
		<div class="modal-content"> 
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>  
			</div> 
			<div class="modal-body">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
						<p style="text-align:center;" ><img  src="{{asset('imagenes/productos/'.$prod->imagen)}}" alt="$prod->nombre_producto" height="200px" width="200px" class="img-thumbnail"> </p>
					</div> 
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>  