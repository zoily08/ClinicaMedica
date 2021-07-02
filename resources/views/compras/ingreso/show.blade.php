@extends ('layouts.admin')
@section ('content')

<div  style=" background-color:#f2f2f1 " >
  <fieldset  style="min-width: 0;padding:.35em .625em .75em!important;margin:0 2px;
  border:2px solid silver!important;margin-bottom: 10em;box-shadow: -6px 10px 20px 0px; ">

  <legend  style="width: inherit;padding:inherit;border:2px solid silver;" class="legend" align= "center"  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><div style="color: #112b56"  ><B>Información  de la Compra</B></div></legend>
  <br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
            <label for="proveeddor">Nombre del Proveedor: {{$compra->nombre_p}}</label>
               <p></p>
            </div>
         </div>
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
               <label for="proveeddor">Nombre del Representante del Proveedor: {{$compra->nombre_p}}</label>
               <p></p>
            </div>
         </div>
         <div class="col-lg-3 col-sm-3 col-md-3 col-xs-10">
            <div class="form-group">
               <label>Tipo Comprobante: {{$compra->tipo_comprobante}}</label><p></p>
             </div>
         </div>
         <div class="col-lg-3 col-sm-3 col-md-3 col-xs-10">
            <div class="form-group">
               <label for="num_comprobante">Número Comprobante: {{$compra->num_comprobante}}</label>
            </div>
         </div>
         <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
               <label for="fecha_compra">Fecha de Compra:   <?php echo formatoFecha($compra->fecha_compra);?></label>
               <!--<p>{{$compra->fecha_compra}}</p>-->
            </div>
         </div>
         <div class="row">
          <div class="panel panel-primary">
            <div class="panel-body">
               
                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <!--<thead style="background-color:#A9D0F5">-->
                        <thead style="background-color:#1c779e">

                           <th style="text-align:left">
                           <font color="white">CANTIDAD</font></th>
                           <th style="text-align:left">
                           <font color="white">PRESENTACION</font></th>
                           <th style="text-align:left">
                           <font color="white">PRODUCTOS</font></th>
                           <th style="text-align:left">
                           <font color="white">PRECIO COMPRA</font></th>
                           <th style="text-align:left">
                           <font color="white">SUBTOTAL(P*C)</font></th> 
                            <th style="text-align:left">
                           <font color="white">IMPUESTO (%)</font></th>
                           <th style="text-align:left">
                           <font color="white">FECHA VENCIMIENTO</font></th>

                         

                         


                        </thead>
                        <tfoot>
                           
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                          
                           
                            

                           
                        </tfoot>
                        <tbody>
                           @foreach($detalles as $det)
                           <tr>
                              <td>{{$det->cantidad}}</td>
                              <td>{{$compra->presentacion}}</td>

                              <td>{{$det->producto}}</td>
                              
                              <td>${{$det->precio_compra}}</td>
                              <td>${{$det->precio_compra*$det->cantidad }}</td>
                              <td>{{$det->impuesto}}%</td>
                              <td><p><?php echo formatoFecha($det->fecha_vencimiento);?></p></td> 
                             
                              
                              
                           </tr>
                           @endforeach
                        </tbody>
                     </table>


                      </div>
               </div>
            </div>
            <div class="modal-footer">
            <!--<a href="{{ route('paciente.pdf') }}"><button type="button"  class="btn btn-success" style="color: #003366; background-color: #e7fffe" ><span class="fa fa-download"> IMPRIMIR LISTADO DE PACIENTES</span></button></a>-->
            <a href="{{URL::action('CompraController@index',$compra->idcompra)}}"><button type="button" class="btn btn-danger"><span class="fa fa-retweet" aria-hidden="true" > Regresar</span></button></a>
          </div>
         
      </div>

              </fieldset>
 </div> 
         
<script>
   $(document).ready(function(){
      $('#bt_add').click(function(){
         agregar();
      });
   });

   var total=0;
   total1=0;
   total2=0;
   total3=0;

   

   if($('#pimpuesto option:selected').val()=='SI'){
             
              
            total2=(impuesto/100);
            }
            else{

              total2=total*0.00;
              //total2=total2+subtotal[cont]*0.00;

            } 
            //total3[cont]=total+total2[cont];

            
               totalc=total2*total1;
               total3=total1+totalc;

              subtotal[cont]=total3;
             total=total+subtotal[cont];



</script>

<!--<font size=6 face="Comic Sans MS,arial,verdana" color="red" ><p align="center"> Nuevo Paciente </p></font>
<th style="text-align:left">
                           <font color="white">PRODUCTOS</font></th>

-->
<div class="form-group">
       <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group" style="text-align:right" >
            <font size=3 face="Comic Sans MS,arial,verdana" color="black" style="text-align:right"  style="text-align:right" ><p  align="right"> TOTAL DE LA COMPRA: ${{$compra->total}}</p></font>
               <!--<label>SUBTOTAL:</label>
               <p>{{$compra->total}}</p>-->
            </div>
         </div>
 </div>


        <!--<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
               <label>TOTAL COMPRA:</label>
               <p>${{$compra->total*($det->impuesto)+$compra->total}}</p>
            </div>
         </div>-->

         

         <!--<

         <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
               <label>TOTAL:</label>
               <p>${{$compra->total*0.13+$compra->total}}</p>
            </div>
         </div>-->

                     <!--<th>SUBTOTAL:<h4 id="subtotal">
                          ${{$compra->total}}</h4></th>

                            <th>IVA:<h4 id="iva"> ${{$compra->total*0.13}}</h4></th>

                            <th>TOTAL:<h4 id="total">${{$compra->total*0.13+$compra->total}}</h4></th>-->


                         <!--<br> 
                      <button class="btn btn-primary  center-block" type="reset" > 
                          <span class="fa fa-print">
                          </span>  Imprimir Informe
                        </button>-->


                            
@endsection


<?php 
$time=time();
    
    function dameFecha($fecha,$dia){
        list($year,$mon,$day)=explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));    
    }
   $total=0; 
   function formatoFecha($fecha){
    return date("d-m-Y",strtotime($fecha));
  } 
?>

<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
@section('scripts')