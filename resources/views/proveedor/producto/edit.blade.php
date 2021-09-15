<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<div data-backdrop="static" class="modal fade" id="modal-producto-edit-{{$prod->idproducto}}"> 
<div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                            <!--<h3>NUEVO PRODUCTO</h3>-->
                            <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Producto</p></font>
                                @if (count($errors)>0)  
                                    <div class="alert alert-danger">  
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul> 
                                    </div> 
                                @endif
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        			<span aria-hidden="true">&times;</span>
                        		</button>
                            </div>   
                         
             
            {!! Form::model($prod,['route'=>['producto.update',$prod->idproducto],'method'=>'PATCH','autocomplete'=>'off', 'files'=>'true']) !!} 


            <div class="modal-body"> 
            <br>  
                <div class="row"> 
            <br>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="codigo_barra">(*) Código de Barra:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-barcode"></i></span>
					<input type="text" name="codigo_barra" required value="{{$prod->codigo_barra}}" class="form-control">
				</div>
			</div> 
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre_producto">(*) Nombre:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-medkit"></i></span>
					<input type="text" name="nombre_producto"  required value="{{$prod->nombre_producto}}" onkeypress="return soloLetras(event)" onkeyup="vNom(this)" class="form-control">
					</div>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="imagen">(*) Imagen:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-picture-o" ></i></span>
					<input type="file" min="100px" max="100px" name="imagen"  class="form-control">
						@if (($prod->imagen)!="")
							<img src="{{asset('imagenes/productos/'.$prod->imagen)}}" alt="$prod->nombre_producto" height="400px" width="400px" class="img-thumbnail" >
						@endif 
					</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_registro">(*) Fecha Registro:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input class="form-control" id="fecha_registro" type="date" name="fecha_registro" value="<?php echo date('Y-m-d', strtotime($prod->fecha_registro)) ?>" >  

				</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="unidad_medida">(*) Unidad de Medida:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-flask"></i></span>
					<input type="text" name="unidad_medida" required value="{{$prod->unidad_medida}}" class="form-control" title="10 ml,15 mg,etc">
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="margen_ganancia">(*) Margen Ganancia: ( % )</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-percent"></i></span>
					<input type="number" name="margen_ganancia" required value="{{$prod->margen_ganancia}}" class="form-control" title="00%">
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
			<div class="form-group">
				<label for="indicacion">(*) Indicación:</label><div class="input-group margin-bottom-lg"><span class="input-group-addon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
  					<input class="form-control" type="text" name="indicacion" onkeyup="vNom(this)" required value="{{$prod->indicacion}}" >
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Proveedor:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
				<select name="idproveedor" class="form-control">
					@foreach ($proveedor as $prov)
						@if ($prov->idproveedor==$prod->idproveedor)
							<option value="{{$prov->idproveedor}}" selected>{{$prov->nombre_p}}</option>
						@else
							<option value="{{$prov->idproveedor}}">{{$prov->nombre_p}}</option>
						@endif 
					@endforeach
				</select>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="presentacion">(*) Presentación:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-th-list"></i></span>
					<input type="text" name="presentacion" required value="{{$prod->presentacion}}" onkeypress="return soloLetras(event)" onkeyup="vNom(this)" class="form-control" title="Blister, Botella, Pastilla, etc">
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="descuento">(*) Descuento: ( % )</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-percent"></i></span>
					<input type="text" name="descuento" required value="{{$prod->descuento}}" class="form-control" title="00%">
				</div>
			</div>
		</div>
		

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">	
			<div class="form-group">
				<div class="input-group margin-bottom-sm">
					<p class="text-danger">(*) Campos Requeridos</p>
				</div>
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
				{!!Form::close()!!}		 

		@push('scripts')
			<script>
			function soloLetras(e) {
				key = e.keyCode || e.which;
   	 			tecla = String.fromCharCode(key).toLowerCase();
    			letras = " áéíóúabcdefghijklmnñopqrstuvwxyz-_";
   			 	especiales = [8, 37, 39, 46];

   				tecla_especial = false
    			for(var i in especiales) {
    				if(key == especiales[i]) {
            			tecla_especial = true;
            			break;
        			}
    		}

    		if(letras.indexOf(tecla) == -1 && !tecla_especial)
    			return false;
    	}

    	function vNom(solicitar){
    		var txt = solicitar.value;
    		solicitar.value = txt.substring(0,1).toUpperCase() + txt.substring(1,txt.length);
    	}

    	function soloNumeros(e){
    		key = e.keyCode || e.which;
    		tecla = String.fromCharCode(key).toLowerCase();
    		letras = " 0123456789";
    		especiales = [8,37,39,46];

    		tecla_especial = false
    		for(var i in especiales){
    			if(key == especiales[i]){
    				tecla_especial = true;
    				break;
    			} 
    		}
    		if(letras.indexOf(tecla)==-1 && !tecla_especial)
    			return false;
    	}





    	</script>

		 
	@endpush





