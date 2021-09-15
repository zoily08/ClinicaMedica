@foreach($signos as $sig) 
    <div data-backdrop="static" class="modal" id="modal-consulta-medica-{{$sig->idpaciente}}" identificador="{{ $sig->idsignos_vitales }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content"> 
                <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                    <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Registro de Nueva Consulta Médica</p></font> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div> 
                {!!Form::open(array('url'=>'consulta/consulta_medica','method'=>'POST','autocomplete'=>'off'))!!}
                <div class="panel-group" id="accordion">  
                    <div class="panel panel-default">      
                        <div class="panel-heading">  
                            <h4 class="panel-title">       
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Datos Generales del Paciente</a>       
                            </h4>                              
                        </div>           
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">                          
                                <div class="row">     
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="form-group">    
                                            <label for="idpaciente">(*) Paciente:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <label name="idpaciente" class="form-control " id="idpaciente" data-live-search="true" >
                                                    <option value="{{$sig->idpaciente}}">{{$sig->nombre_p}} {{$sig->apellido_p}}</option></label>
                                            </div> 
                                        </div>     
                                    </div>         
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="form-group"> 
                                            <label for="detalle">Signos Vitales</label>
                                            <textarea name="detalle" rows="5" cols="10" class="form-control" disabled="true">Temperatura: {{$sig->temperatura}}°C
Presión: {{$sig->presionsistolica}}/{{$sig->presiondiastolica}} mmHG  
Peso: {{$sig->peso}} lb 
Estatura: {{$sig->estatura}} cm 
IMC: {{$sig->IMC}}                                           
                                            </textarea> 
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Datos de la Consulta</a> 
                                </h4>
                            </div> 
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body"> 
                                    <div class="row">           
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label for="idsintomas">(*) Sintomas:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <select name="idsintomas"  class="select" multiple="multiple" id="idsintomas" data-live-search="true" identificador="{{ $sig->idsignos_vitales }}>
                                                        <option value=">--- Elige los síntomas ---</option>
                                                            @foreach ($sintomas as $key => $value)
                                                                <option value="{{ $key }}">{{ $value }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label for="idenfermedad">(*) Enfermedad:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <select name="idenfermedad"  id="idenfermedad" class="select" identificador="{{ $sig->idsignos_vitales }}">
                                                         <option value=""></option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="observacion">(*)Observación</label>
                                                    <textarea class="form-control" type="text" name="observacion"   rows="5" cols="50" placeholder="Observación..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="fecha_c"><span>Fecha de Registro</span></label><div class="input-group margin-bottom-sm">
                                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                                    <input  type="Date"  class="form-control"  name="fecha_c"  id="fechaActual" required value="{{old('fecha_c')}}"  placeholder="fecha_c" max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
								    <div class="form-group">
									   <button class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
									   <button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
									   <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                        <span class="fa fa-retweet"></span>
										<span aria-hidden="true">Salir</span>
									   </button>
								    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                 </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
        
    @endforeach

@push('scripts')



<script> 
    let identificador = -1;
    $('body').on('shown.bs.modal', '.modal', function () {
        identificador = jQuery(this).attr( "identificador" )
        $(this).find('select').each(function () {
            var dropdownParent = $(document.body);
            if ($(this).parents('.modal.in:first').length !== 0)
                dropdownParent = $(this).parents('.modal.in:first');
            $(this).select2({
                width: "100%",
                tags: true
            });
        });
    });

 

    jQuery(document).ready(function (){
        jQuery('select[name="idsintomas"]').on('change',function(){
            var sintomasID = jQuery(this).val();
            let selector = 'select[name="idenfermedad"][identificador="'+identificador+'"]'
                if(sintomasID){
                    jQuery.ajax({
                        url : 'consulta_medica/getenfermedad/' +sintomasID,
                        type : "GET",
                        dataType : "json",
                        success:function(data){
                            // ELiminar la lista desplegable de las enfermedades
                            jQuery(selector).empty();
                            // Ordenar los datos recibidos según las probabilidades (de mayor a menor)
                            data.sort((a, b) => {
                                if (a.probabilidad > b.probabilidad)
                                    return -1;
                                if (a.probabilidad < b.probabilidad)
                                    return 1;
                                return 0;
                            });
                            data.forEach(({idenfermedad, enfermedad, probabilidad}) => {
                                let formato = probabilidad + "% - " + enfermedad;
                                $(selector).append($('<option>', {value:idenfermedad, text:formato})); // Crear <option> y agregarlos al select correspondiente
                            });
                        }
                    });
                }
                else{
                    $(selector).empty();
                }
        });
    });

    


/*

    jQuery(document).ready(function (){
        jQuery('select[name="idsintomas"]').on('change',function(){
            var sintomasID = jQuery(this).val();
            if(sintomasID){
                jQuery.ajax({
                    url : 'consulta/consulta_medica/getSint_enf/' +sintomasID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        console.log(data);
                        jQuery('select[name="idenfermedad"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="idenfermedad"]').append('<option value="'+ key +'">'+ value +'</option>');
                       });
                    }
                });
            }
            else{
                $('select[name="idenfermedad"]').empty();
            }
        });
    })*/
    
        </script>

@endpush 


