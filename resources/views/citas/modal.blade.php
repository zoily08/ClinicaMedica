<div data-backdrop="static" class="modal fade" id="modal-delete-{{$cita->idcitas}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">




 {{Form::open(array('action'=>array('CitasController@destroy',$cita->idcitas),'method'=>'delete'))}}
  
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="background-image: url({{asset ('img/Hospital.jpg')}});" class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
        @if($cita->estado == 'ACTIVO')
          <font face="Comic Sans MS,arial,verdana"><p align="center"><legend aling="center" class="text-red" >¿DAR DE BAJA LA CITA?</legend></p></font>
          
          <div class="modal-body" >
            <p>Confirme si desea dar de baja</p>
          </div>
                @else
                  <font face="Comic Sans MS,arial,verdana"><p align="center"><legend aling="center" class="text-red" >¿DAR DE ALTA LA CITA?</legend></p></font>
                    <div class="modal-body">
              <p>Confirme si desea dar de alta</p>
            </div>
                @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
  {{Form::close()}}


</div> 
</div> 
