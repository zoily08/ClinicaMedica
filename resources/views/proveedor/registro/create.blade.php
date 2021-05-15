@extends ('layouts.admin')
@section ('contenido')
 {!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}
 <script type="text/javascript">
jQuery(function($) {
      
      $('#date').mask('99/99/9999',{placeholder:"mm/dd/yyyy"});
      $('#telefono_p').mask('9999-9999');
     
   });
</script>  

	<div class="row"> 
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proveedor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		
	
			{!!Form::open(array('url'=>'proveedor/registro','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
				<div class="form-group">
					<label for="nombre_p">Nombre:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
  							<input class="form-control" type="text" name="nombre_p" id="nombre_p" onkeypress="return soloLetras(event)" placeholder="Nombre">
					</div>
				</div>
				<div class="form-group">
					<label for="direccion_p">Dirección:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
  							<input class="form-control" type="text" name="direccion_p" id="direccion_p"  placeholder="Dirección">
					</div>
				</div>
				<div class="form-group">
					<label for="telefono_p">Teléfono:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
  							<input class="form-control" type="text" name="telefono_p" id="telefono_p" onkeypress="return sololetras(event)" placeholder="Teléfono">
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
		</div>
	</div>
			
			{!!Form::close()!!}
			@push('scripts')
				<script>
					function soloLetras(e) {
						key = e.keyCode || e.which;
    					tecla = String.fromCharCode(key).toLowerCase();
    					letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
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
            	</script>
            @endpush
@endsection