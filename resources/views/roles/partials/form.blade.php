<div style=" background-color:#f2f2f1 " >

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
	{{ Form::label('slug','URL(Acceso rapido):') }}
	{{ Form::text('slug',null,['class'=>'form-control']) }}
	
</div>
</div>

<!--<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
<div class="form-group"> 
	{{ Form::label('description','Descripcion del Rol:') }}
	{{ Form::textarea('description',null,['class'=>'form-control']) }}
	
</div>
</div>-->

  

	<hr>
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
	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
         <div class="table-responsive" style="overflow: auto" >

         <table  class="table table-striped table-bordered table-condensed table-hover" style="text-align:center;">
           <thead style="background-color:#1c779e">
              <tr>

              <th style="text-align:center">
                     <font color="white">Modulos</font></th>

                     <th style="text-align:center">
                     <font color="white">Navegar </font></th>

                     <th style="text-align:center">
                     <font color="white">Agregar </font></th>

                     <th style="text-align:center">
                     <font color="white">Actualizar </font></th>

                     <th style="text-align:center">
                     <font color="white">Eliminar </font></th>


              </tr>
            </thead>

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 

           <u><h3> <font size="4" face="Comic Sans MS,arial,verdana" color="0e4743">Listado de Permisos:</font></h3></u>

            @foreach($permissions as $permission)
               <tr>          
                  <td >
                    <label>
                   
                       {{ $permission->name }}
                    
                    
                    </label>
                    
    
                </td>
                <td>
              
                    {{ Form::checkbox('permissions[]',$permission->id,null) }}
                     
                     </td>

                     <td>
                      {{ Form::checkbox('permissions[]',$permission->id,null)}}
                      
                   
                     </td>

                      <td>
                      {{ Form::checkbox('permissions[]',$permission->id,null) }}
                      
                   
                     </td>

                      <td>
                      {{ Form::checkbox('permissions[]',$permission->id,null)}}
                      
                   
                     </td>

 @endforeach
         
            </table>
            </div>
	</div>
	</div>



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