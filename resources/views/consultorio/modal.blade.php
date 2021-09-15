<div data-backdrop="static" class="modal fade" id="modal-delete-{{$consultorio->idconsultorio}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">  
 
 {{Form::open(array('action'=>array('ConsultorioController@destroy',$consultorio->idconsultorio),'method'=>'delete'))}}
   
       
      @if($consultorio->estado == 'ACTIVO')
      <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button> 
      </div>
              <font size="6" face="Comic Sans MS,arial,verdana" color="blue"><p align="center"><legend aling="center"  >¿DAR DE BAJA EL CONSULTORIO?</legend></p></font>
      
          <div class="modal-body">
            <font size="3" face="Comic Sans MS,arial,verdana" color="#436b95"><p align="left" aling="center"> Confirme si desea dar de baja el Consultorio</p><br></font>
          </div>
        @else 
        <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button> 
        </div>
          <font size="6" face="Comic Sans MS,arial,verdana" color="blue"><p align="center"><legend aling="center"  >¿DAR DE ALTA EL CONSULTORIO?</legend></p></font>
      
          <div class="modal-body">
            <font size="3" face="Comic Sans MS,arial,verdana" color="#436b95"><p align="left" aling="center"> Confirme si desea dar de alta el Consultorio</p><br></font>
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
