<div data-backdrop="static" class="modal fade" id="modal-proveedor-edit-{{ $pro->idproveedor }}"> 
	<div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                            <!--<h3>NUEVO PRODUCTO</h3>-->
                            <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Proveedor</p></font>
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
                         
            
            {!! Form::model($pro,['route'=>['registro.update',$pro->idproveedor],'method'=>'PATCH','autocomplete'=>'off']) !!}


            <div class="modal-body"> 
            <br>
                <div class="row">  
            <br>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombre_empresa">(*) Nombre Empresa:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-building"></i></span>
						<input type="text" name="nombre_empresa" required value="{{$pro->nombre_empresa}}" class="form-control"  onkeyup="vNom(this)" onkeypress="return soloLetras(event)"  placeholder="Nombren Empresa">
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="registro_sanitario">(*) Registro Sanitario:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
						<input type="text" name="registro_sanitario" required value="{{$pro->registro_sanitario}}" class="form-control"  placeholder="Registro Sanitario">
						</div>
					</div>
				</div> 
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="direccion_p">(*) Dirección Proveedor:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
						<input type="text" name="direccion_p" value="{{$pro->direccion_p}}" class="form-control" onkeyup="vNom(this)" placeholder="Dirección...">
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="telefono_p">(*) Teléfono Proveedor:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input onkeypress="return soloNumeros(event)" onpaste="return false" maxlength="9" type="text" class="form-control" name="telefono_p" value="{{$pro->telefono_p}}"  id="telefono_p" placeholder="Teléfono" title="2222-2222">
						</div> 
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombre_p">(*) Nombre Visitador:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="nombre_p" required value="{{$pro->nombre_p}}" class="form-control"  onkeypress="return soloLetras(event)" onkeyup="vNom(this)" placeholder="Nombre...">
						</div>
					</div>  
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
     				<div class="form-group">
        				<label for="fecha_registro_p">(*) Fecha Registro:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          				 <input class="form-control" id="fecha_registro_p" type="date" name="fecha_registro_p" value="<?php echo date('Y-m-d', strtotime($pro->fecha_registro_p)) ?>" > 
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
        </div>
                </div>
             </div>
        
    </div>
				{!!Form::close()!!}	
  
