<div class="modal fade" id="modal-exam">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Nuevo Tipo Consulta</p></font> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
             {!! Form::open(['route'=>'laboratory.order_store','method'=>'POST','autocomplete'=>'off','id'=>'formOrder']) !!}
            <div class="modal-body">
                <div class="row">
                 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
                  <u><h3><font size="4" face="Comic Sans MS,arial,verdana" color="0e4743">Examenes:</font></h3></u>
                    <div class="form-group"> 
                      <ul class="list-unstyled"> 
                        @foreach($exams as $exam)
                          <li>
                            <label>
                              <li> {{$exam->id}}" </li>
                              <li> {{$exam->name}} </li>
                            </label>  
                          </li> 
                        @endforeach
                      </ul>
                    </div>
                </div>
                <div class="modal-footer">
                @include('layouts.modal_buttons')
                </div> 
            {!! Form::close() !!}
            </div>
        </div>   
    </div>
</div>
