
<!--{!!Form::open(array('url'=>'registro/paciente','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}" title="Busqueda de Paciente">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">
     		 <span class="fa fa-search"></span>
   		 	</button>
   		 	
		</span>
	</div>
</div>

{{Form::close()}}-->

{!!Form::open(array('url'=>'paciente','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
	</div>
</div>

{{Form::close()}}








