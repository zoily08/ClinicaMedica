
<div data-backdrop="static" class="modal fade" id="modal-users-user_roles-{{ $user->id }}"> 

 
    <div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                            <!--<h3>NUEVO PRODUCTO</h3>-->
                            <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Usuarios</p></font>
                                @if (count($errors)>0)  
                                    <div class="alert alert-danger"> 
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul> 
                                    </div> 
                                @endif
                            </div>
                        
           
            {!! Form::model($user,['route'=>['users.update',$user->id],'method'=>'PATCH','autocomplete'=>'off']) !!}




            <div class="modal-body">
            
                <div class="row"> 
          
            <br>
            
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
          <label for="name"><span>Nombres del Usuario:</span></label>
           <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
             <input autocomplete="off" autofocus placeholder=" Nombres del usuario" minlength="3" onkeypress="return soloLetras(event)" onpaste="return false"   type="text" name="name" required value="{{$user->name}}" class="form-control" placeholder="Nombre Usuario..." onkeyup="vNom(this)">

          
        </div>
        </div>
      </div>

      


      
      <hr>
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
  <u><h3> <font size="4" face="Comic Sans MS,arial,verdana" color="0e4743">Listado de Roles:</font></h3></u>

  
  <div class="form-group">
    <ul>
      @foreach($roles as $role)
      <li>
        
        <label>
          {{ Form::checkbox('roles[]',$role->id,null) }}
          {{ $role->name }}
          <em>({{ $role->description  ?:'Sin descripcion' }})</em>
          
        </label>
          
      </li>

      @endforeach
      
    </ul>
    
  </div>

  </div>
 
                <div class="col-lg-22 col-sm-22 col-md-22 col-xs-12">
                    <div class="form-group">
                        <div style="text-align: right;">
                            <button  class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>

                            <button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>

                            
                            <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> <span class="fa fa-retweet"></span><span aria-hidden="true">Salir</span></button>
                        </div>
                    </div>
                </div>
        </div>
        </div>
                </div>
             </div>
        
    </div>

    
        
            {!! Form::close() !!}






 