

<div data-backdrop="static" class="modal fade" id="modal-signos-edit-{{ $sig->idsignos_vitales }}"> 
<div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                            <!--<h3>NUEVO PRODUCTO</h3>-->
                            <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Signos Vitales</p></font> 
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
                         
            
            {!! Form::model($sig,['route'=>['signos_vitales.update',$sig->idsignos_vitales],'method'=>'PATCH','autocomplete'=>'off']) !!}

 
            <div class="modal-body">
            <br>
                <div class="row"> 
            <br>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="temperatura">(*) Temperatura:</label>
						<div class="input-group margin-bottom-sm">
		  				<span class="input-group-addon"><i class="fa fa-magic"></i></span>
		  				<input type="text" name="temperatura" required value="{{$sig->temperatura}}" class="form-control" onkeypress="return soloNumeros(event)" placeholder="Temperatura">
		  				</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label >(*) Presion:</label>
							<div class="input-group">
			  				<div class="input-group margin-bottom-xs">
			  					<label></label>
			  						<span class="input-group-addon"><i class="fa fa-stethoscope"></i></span>
			  										
			  						<label for="presionsistolica"></label>
			  							<div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
			  								<input type="float" name="presionsistolica" required value="{{$sig->presionsistolica}}" class="form-control" placeholder="Sistolica">
			  							</div>
			  						<label for="presiondiastolica"></label>
										<div class="col-lg-5 col-sm-5 col-md-5 col-xs-5" />
											<input type="float" name="presiondiastolica" required value="{{$sig->presiondiastolica}}" class="form-control" placeholder="P. Diastolica">
										</div>
							</div> 
							</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="peso">(*) Peso:</label>
						<div class="input-group margin-bottom-sm">
			  			<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						<input type="text" name="peso" id="peso" required value="{{$sig->peso}}" class="form-control" onkeyup="calculaIMC();" onkeypress="return soloNumeros(event)" placeholder="Peso">
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="estatura">(*)Estatura:</label>
						<div class="input-group margin-bottom-sm">
			  			<span class="input-group-addon"><i class="fa fa-male"></i></span>
						<input type="text" name="estatura" id="estatura" required value="{{$sig->estatura}}" class="form-control" onkeyup="calculaIMC();" onkeypress="return soloNumeros(event)" placeholder="Estatura...">
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="IMC">IMC:  </label>
						<div class="input-group margin-bottom-sm">
							<span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
							<input type="text" name="IMC" id="IMC" required value="{{$sig->IMC}}" class="form-control" readonly="readonly"  placeholder="IMC...">
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label for="fecharegistro">(*) Fecha Registro:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input class="form-control" id="fecharegistro" type="date" name="fecharegistro" value="<?php echo date('Y-m-d', strtotime($sig->fecharegistro)) ?>" > 
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
						<button class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
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

@push('scripts')
			<script>

    	function soloNumeros(e){
    		key = e.keyCode || e.which;
    		tecla = String.fromCharCode(key).toLowerCase();
    		letras = " 0123456789.";
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

    	IMC=0;
    	$("#IMC").change(calculaIMC);
    	function calculaIMC(){
    		peso=document.getElementById("peso").value;
    		estatura=document.getElementById("estatura").value;
    		//comprobamos que los campos
    		//no vengan vacíos
    		if(peso!="" && estatura!=""){
    			//aplicamos la fórmula
    			estatura = parseInt(estatura)/100;
    			IMC=(peso/(estatura*estatura)).toFixed(2);
    			$("#IMC").val(IMC);  
    		}
    	}


    	



		</script>


@endpush

