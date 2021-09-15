    <br>
<strong>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
	{{ Form::label('name','Nombre  del Usuario:') }}
	{{ Form::text('name',null,['class'=>'form-control']) }}
	
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
	{{ Form::label('apellidos','Apellidos  del Usuario:') }}
	{{ Form::text('apellidos',null,['class'=>'form-control']) }}
	
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group"> 
	{{ Form::label('direccion','Direccion:') }}
	{{ Form::text('direccion',null,['class'=>'form-control']) }}
	
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group"> 
	{{ Form::label('telefono','Telefono:') }}
	{{ Form::text('telefono',null,['class'=>'form-control']) }}
	
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group"> 
	{{ Form::label('email','Correo Electronico:') }}
	{{ Form::text('email',null,['class'=>'form-control']) }}
	
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
					<em>({{ $role->descripcion  ?:'Sin descripcion' }})</em>
					
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
          <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> <span class="fa fa-retweet"></span><span aria-hidden="true">Regresar</span></button>

	
</div>
</div>
</div>

