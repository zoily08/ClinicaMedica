<div class="modal fade" id="modal-roles-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Nuevo Rol</h4>
            </div>


             

                  {!! Form::open(['route'=>'roles.store','method'=>'POST','autocomplete'=>'off']) !!}



                  <div class="modal-body">


      <br>
<strong>

<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

<div class="form-group"> 
  {{ Form::label('name','Tipo de Rol:') }}
  {{ Form::text('name',null,['class'=>'form-control']) }}
  
</div>
</div>


<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
<div class="form-group"> 
  {{ Form::label('slug','URL:') }}
  {{ Form::text('slug',null,['class'=>'form-control']) }}
  
</div>
</div>

<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
<div class="form-group"> 
  {{ Form::label('description','Descripcion del Rol:') }}
  {{ Form::textarea('description',null,['class'=>'form-control']) }}
  
</div>
</div>

  
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <u><h3> <font size="4" face="Comic Sans MS,arial,verdana" color="0e4743">Permiso Especial:</font></h3></u>


  <div class="form-group">
  <label>{{ Form::radio('special','all-access') }}Acceso total</label>
  <label>{{ Form::radio('special','no-access') }}Ningun acceso</label>
  </div>
  </div>

  <hr>

  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
  <u><h3> <font size="4" face="Comic Sans MS,arial,verdana" color="0e4743">Listado de Permisos:</font></h3></u>
  

  
<div class="form-group">
    <ul class="list-unstyled">
      @foreach($permissions as $permission)
      <li>
        
        <label>
          {{ Form::checkbox('permissions[]',$permission->id,null) }}
          {{ $permission->name }}
          <em>({{ $permission->description  ?:'Sin descripcion' }})</em>
          
        </label>
          
      </li>

      @endforeach
      
    </ul>
    
  </div>
  </div>

 





<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <div class="modal-footer">
<div class="form-group"> 
  

    <button class="btn btn-primary" style="color: white; background-color: #0a302d"  type="submit">
                          <span class="fa fa-floppy-o">

                          </span>  Guardar

                       </button>

                       <button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
          <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> <span class="fa fa-retweet"></span><span aria-hidden="true">Salir</span></button>

  
  
</div>
</div>
</div>

                   </div>


                	 {!! Form::close() !!}

                    




                

                        </div>

                         
 </div>
            </div>
     