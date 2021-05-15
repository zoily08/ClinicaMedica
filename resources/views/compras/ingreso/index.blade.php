@extends('layouts.admin')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

    <!--<h3 style="color:#EE2121" >Listado de Compras -->

    <h3><FONT FACE="times new roman " size="6" color="0e4743" >Listado de Compras</FONT>

@can('compras.ingreso.create')
    <a > <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" title="Agregar una Nueva Compra" style="color: #003366; background-color: #99CCFF"><span class="fa fa-plus"></span> 
        </button></a></h3>    
@endcan

   
          {!!Form::open(array('url'=>'compras/ingreso','method'=>'POST','autocomplete'=>'off'))!!}
         {{Form::token()}}

                <div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width:1250px;" role="document">
                      <div class="modal-content"> 
                          <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">

                              <font size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Registro de Nueva Compra</p></font>


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

                          <div class="modal-body">
                              <form>

                              <div class="row">
                              <strong>


                            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                         <div class="form-group">
                               <label for="proveeddor"> (*) Proveedor (Representante)</label>
                               <select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true">
                                  @foreach($proveedors as $proveedor)
                                  <option value="{{$proveedor->idproveedor}}">{{$proveedor->nombre_p}}</option>
                                  @endforeach
                               </select>
                            </div>
                            </div>

         <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
               <label>(*)Tipo Comprobante</label>
               <select name="tipo_comprobante" class="form-control selectpicker" data-live-search="true" >
                     <option value="Boleta">Boleta</option>
                     <option value="Factura">Factura</option>
                     <option value="Recibo">Recibo</option>
                     <option value="Ticket">Ticket</option>
                  
               </select>
            </div>
         </div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            
          <div class="form-group">
             <label for="num_comprobante"><span>(*) Numero de Comprobante</span></label>
          <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
           <input class="form-control" type="text" name="num_comprobante" required value="{{old('num_comprobante')}}"  placeholder="Numero de  comprobante...">
            </div>
            </div>
            </div>
    
              
               
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                
                <label>(*) Tiene Impuesto:</label>
               <!--<select  name="pimpuesto" id="pimpuesto"  class="form-control selectpicker" data-live-search="true">-->
               <select  name="pimpuesto"  id="pimpuesto"  class="form-control selectpicker" data-live-search="true" onchange="if(this.value=='SI') document.getElementById('impuesto').disabled = false">

              <!--<option value>SELECCIONE</option>-->
               <option value="SI">SI</option>
              <option value="NO">NO </option>
            
             
            
             </select>
            </div>
            

            </div>


            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
              <label for="impuesto">Impuesto:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                    <input class="form-control" type="text" name="impuesto" id="impuesto" placeholder="IVA %"  >
              </div> 
            </div>
            </div>


            <!--<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
              <label for="impuesto">Impuesto:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                    <input class="form-control" type="text" name="impuesto" id="impuesto" placeholder="IVA %" >
              </div> 
            </div>
            </div>-->
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
      <div class="form-group">
      <!--<div class='input-group'>-->
      <label>Tiene Costo el Producto:</label>
               <select  name="pdonacion" id="pnodacion"  class="form-control selectpicker" data-live-search="true">
              <!--<option value>SELECCIONE</option>-->
             <option value="SI">SI</option>
             <option value="NO">NO </option>
            
             </select>
            </div>
            

            </div>

          <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <label for="fecha_compra"><span>(*) Fecha de Registro</span></label>
                     <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        <input  type="Date"  class="form-control" type="text" name="fecha_compra" id="fechaActual" id="fecha_compra" required value="{{old('fecha_compra')}}"  placeholder="fecha_compra" max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."+ 0 days"));?>">
                        </div>
                  </div>
               </div>


          </div>


              
          <div class="panel panel-primary"><!-- color celeste -->
            <div class="panel-body">

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                     <label>Productos</label>
                     <select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
                        @foreach($productos as $producto)
                        <option value="{{$producto->idproducto}}">{{$producto->producto}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>


              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <div class="form-group">
                  <label>Presentacion:</label>
                           <select  name="presentacion" id="presentacion"  class="form-control selectpicker" data-live-search="true">
                          <option value>SELECCIONE</option>
                         <option value="cajas">Cajas</option>
                         <option value="blister">Blister </option>
                         <option value="frascos">Jarabe </option>
            
                         </select>
                        </div>
                                 
                              </div>
                           </div>



<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <label for="cantidad"><span>(*) Cantidad</span></label>
                     <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><i class="fa fa-pencil-square fa-fw"></i></span>
                        <input class="form-control" type="number" name="pcantidad"  id="pcantidad" required value="{{old('pcantidad')}}"  placeholder="Cantidad">
                        </div>
                  </div>
               </div>



               <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                     <label for="precio_compra"><span>(*) Precio Compra</span></label>
                       <div class="input-group margin-bottom-sm">
                         <span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
                            <input class="form-control" type="number" name="pprecio_compra"  id="pprecio_compra" placeholder="P. Compra" >
                        </div>
                  </div>
               </div>


                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <label for="fecha_vencimiento"><span>Fecha Vencimiento</span></label>
                     <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        <input  type="Date"  class="form-control" type="text" name="fecha_vencimiento"  id="fecha_vencimiento" required value="{{old('pfecha_vencimiento')}}"  placeholder="fecha_vencimiento"  min = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")));?>" onblur="obtenerfechafinf1();" >
                        </div>
                  </div>
               </div>


               


                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <div class="form-group">
                     <button type="button" id="bt_add" class="btn btn-success" style="color: #003366; background-color: #99CCFF"><span class="fa fa-plus"></span></button></a></button>
                  </div>
                  </div>

               <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover" >

                     <thead style="background-color:#A9D0F5" disable>
                           <th style="text-align:center">Opciones</th>
                           <th style="text-align:center">Productos</th>
                           <th style="text-align:left">F.Vencimiento</th>
                           <th style="text-align:left">Cantidad</th>
                           <th style="text-align:left">P.Compra</th>
                           <th style="text-align:left">IVA</th>
                           <th style="text-align:left">TOTAL</th>                      
                        </thead>
                        <tfoot>
                          
                           <th></th>
                           <th></th> 
                           <th></th> 


                           
                           <th>TOTAL DE LA COMPRA<h4 id="total">.</h4></th>
                           <th>IVA<h4 id="total2">$/ 0.000</h4></th>
                           <th>TOTAL<h4 id="total3">$/ 0.000</h4></th>
                           
                           

                        </tfoot>


                     </table>

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
     </form>

   </div>
                  <div class="modal-footer">
                   <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
                   <div class="form-group">

                   <input name="_token" value="{{ csrf_token() }}" type="hidden">
                  
                  <button class="btn btn-primary" style="color: white; background-color: #0a302d"  type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
                  
                <button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
                
                <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> <span class="fa fa-retweet"></span><span aria-hidden="true">Salir</span></button>
               
                                </div>
                              </div>
                          </div>




</strong>

                      </div>
                    </div>
                  </div>
              </div>
  </div>
</div>


         {!!Form::close()!!}




         @push('scripts')
   <script>
   $(document).ready(function(){
      $('#bt_add').click(function(){
         agregar();
      });
   });

   var cont=0;
   total=0;
   total1=0;
   total2=0;
   total3=0;
   subtotal=[];
   totalc=0;
   $("#guardar").hide();


         /* function getSelectValue(){

            var selectedValue=document.getElementById("impuesto").value;
            console.log(selectedValue);



           }*/

   function agregar(){
         idproducto=$("#pidproducto").val();
         producto=$("#pidproducto option:selected").text();
         fecha_vencimiento=$("#fecha_vencimiento").val();
         cantidad=$("#pcantidad").val();
         impuesto=$("#impuesto").val();
         precio_compra=$("#pprecio_compra").val();
        // precio_venta=$("#pprecio_venta").val();

         if(idproducto!="" && cantidad!="" && cantidad>0 && precio_compra!=""&& impuesto!="" ){
            //subtotal[cont]=(cantidad*precio_compra);
            //total=total+subtotal[cont];
            //total2="";


               if($('#pnodacion option:selected').val()=='SI'){
              //subtotal[cont]=(cantidad*precio_compra);
              //total=total+subtotal[cont]; 
             // subtotal[cont]=(cantidad*precio_compra);
             // total=total+subtotal[cont];
             total1=cantidad*precio_compra;
             




             


            }
            else{

             // subtotal[cont]=(cantidad*0.00);
              total1=(cantidad*0.00);
            } 

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









            var fila='<tr  class="selected" id="fila'+cont+'"><td><button type="button" class="btn  btn-warnig" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+producto+'</td><td><input type="date" name="fecha_vencimiento[]" value="'+fecha_vencimiento+'"></td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td><input type="number" name="impuesto[]" value="'+impuesto+'"></td><td>'+total3+'</td></tr>';
           // <input type="number" name="precio_venta[]" value="'+precio_venta+'">


            cont++;
            limpiar();
            $("#total").html("$ " + total);
            $("#total1").html("$ " + total1);
            $("#total2").html("$ " + total2);
            $("#total3").html("$ " + total3);

            evaluar();
            $('#detalles').append(fila);
            }

         else{
            alert("Error al ingresar el detalle de la compra, revise los datos del producto");
            
         }
      }


        

   function limpiar(){
         //$("#pcantidad").val("");
        // $("#pprecio_compra").val("");
         //$("#pprecio_venta").val("");
      }

      function evaluar(){
        // if(total>0)
        if(total3>=0)
         {
            $("#guardar").show();
         }
         else
         {
            $("#guardar").hide();
         }
      }

      function eliminar(index){
        total=total-subtotal[index];
        //total2=total-subtotal[index];
        total2=total*(impuesto/100);
         //total3=total3-subtotal[index];
          total3=total+total2;
         $("#total").html("$/. "+ total);
          $("#total2").html("$/. "+ total2);
          $("#total3").html("$/. "+ total3);
         $("#fila" + index).remove();
         evaluar();
      }


//Guardamos en una variable el nombre del campo provincia.
/*var idimpuesto = document.getElementById("idimpuesto");
var pro = idimpuesto.options[idimpuesto.selectedIndex].value;
//Creamos un nodo de texto que agregaremos al div.
var pro_valor = document.createTextNode("Impuesto: "+pro);
//Añadimos el nuevo nodo al final de la lista.
div.appendChild(pro_valor);*/

    /*var select = document.getElementById('impuesto');
    select.addEventListener('change', function(){
        var selectedOption = this.options[select.selectedIndex];
        console.log(selectedOption.value + ': ' + selectedOption.text);

  });*/



  window.onload = function(){
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth()+1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
  mes='0'+mes //agrega cero si el menor de 10
document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
}



  </script>
  @endpush




        <div class="row"> 
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
    <div class="table-responsive" style="overflow: auto" >


        <table  class="table datatable" style="text-align:center;">

     
        <thead style="background-color:#1c779e">


        
        
          
          <th style="text-align:center">
          <font color="white">FECHA</font></th>
          <th style="text-align:center"> 
          <font color="white">T. COMPROBANTE</font></th>
          <th style="text-align:center">
          <font color="white">TOTAL</font></th>
          <th style="text-align:center">
          <font color="white">ESTADO</font></th>

          <th style="text-align:center">
          <font color="white">OPCIONES</font></th>
          <!--<th style="text-align:center">Opciones2</th>-->
        </thead>
        @foreach ($compras as $com)
        <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>

        <td ><?php echo formatoFecha($com->fecha_compra);?></td>

          

          <!--<td>{{ $com-> nombre_p}}</td>-->
          <td >{{ $com-> tipo_comprobante.': '.$com-> num_comprobante}}</td>


          
          

                     <td>${{ $com->total}}
                     
                     
                    

                     
                    <!--<td>{{ $com-> estado}}-->

                



                    <td>
            @if($com->estado == 'ACTIVO')

          <p class="text-center" ><small class="label pull center p1 bg-olive">{{$com-> estado}} </small></p>

                  @else
                  <small class="label pull center p1 bg-red">{{$com-> estado}} </small>
                  @endif

          </td>


            
          
          
          <td>
             @can('compras.ingreso.show')
            <a href="{{URL::action('CompraController@show',$com->idcompra)}}"><button class="btn btn-Secondary"><span class="fa fa-eye"></span></button></a>
             @endcan


           @can('compras.ingreso.destroy')
           @if($com->estado == 'ACTIVO')

            <a href="" data-target="#modal-delete-{{$com->idcompra}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-level-down"></span></button></a>
            @else
            <a href="" data-target="#modal-delete-{{$com->idcompra}}" data-toggle="modal"><button type="button" class="btn btn-primary mb1 bg-red" style="color: #003366; background-color: #5affab"><span class="fa fa-level-up"></span></button></a>
            @endif 
             @endcan


            <!--<a href="" data-target="#modal-delete-{{$com->idcompra}}" data-toggle="modal"><button type="button" Class="btn btn-danger"><span class="fa fa-trash"></span></button></a>-->
        </td>
        </tr>
        @include('compras.ingreso.modal')
        @endforeach
      </table>
    </div>
    {{$compras->render()}}
  </div>
</div>




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


     
