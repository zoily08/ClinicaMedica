@extends('layouts.admin')
@section('content') 


   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <!--<h3><font  style="text-align:center" color="red">Nueva Compra </font>-->
         <font size=4 face="Comic Sans MS,arial,verdana" color="red" ><p align="center"> NUEVA COMPRA </p></font>
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
   </div>
         {!!Form::open(array('url'=>'compras/ingreso','method'=>'POST','autocomplete'=>'off'))!!}
         {{Form::token()}}

      <div class="row">
         
         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
         <div class="form-group">
               <label for="proveeddor"> Proveedor (Representante)</label>
               <select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true">
                  @foreach($proveedors as $proveedor)
                  <option value="{{$proveedor->idproveedor}}">{{$proveedor->nombre_p}}</option>
                  @endforeach
               </select>
            </div>
            </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
               <label>Tipo Comprobante</label>
               <select name="tipo_comprobante" class="form-control selectpicker" data-live-search="true" >
                     <option value="Boleta">Boleta</option>
                     <option value="Factura">Factura</option>
                     <option value="Recibo">Recibo</option>
                     <option value="Ticket">Ticket</option>
                  
               </select>
            </div>
         </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            
          <div class="form-group">
             <label for="num_comprobante"><span> Numero de Comprobante</span></label>
          <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
           <input class="form-control" type="text" name="num_comprobante" required value="{{old('num_comprobante')}}"  placeholder="Numero de  comprobante...">
            </div>
            </div>
            </div>
    
              
               
               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                
                <label>Tiene Impuesto:</label>
               <!--<select  name="pimpuesto" id="pimpuesto"  class="form-control selectpicker" data-live-search="true">-->
               <select  name="pimpuesto"  id="pimpuesto"  class="form-control selectpicker" data-live-search="true" onchange="if(this.value=='SI') document.getElementById('impuesto').disabled = false">

              <!--<option value>SELECCIONE</option>-->
              <option value="NO">NO </option>
             <option value="SI">SI</option>
             
            
             </select>
            </div>
            

            </div>


            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
              <label for="impuesto">Impuesto:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-pencil-square-o fa-fw"></i></span>
                    <input class="form-control" type="text" name="impuesto" id="impuesto" placeholder="IVA %" disabled >
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

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
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

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                  <div class="form-group">
                        <label for="fecha_compra"><span>Fecha de Registro</span></label>
                     <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        <input  type="Date"  class="form-control" type="text" name="fecha_compra" id="fechaActual" id="fecha_compra" required value="{{old('fecha_compra')}}"  placeholder="fecha_compra">
                        </div>
                  </div>
               </div>
            



    </div>        

     
      <div class="row">
          <div class="panel panel-primary"><!-- color celeste -->
            <div class="panel-body">


           


               <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                  <div class="form-group">
                     <label>Productos</label>
                     <select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
                        @foreach($productos as $producto)
                        <option value="{{$producto->idproducto}}">{{$producto->producto}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>


                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
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


              

               <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                  <div class="form-group">
                        <label for="cantidad"><span>Cantidad</span></label>
                     <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><i class="fa fa-pencil-square fa-fw"></i></span>
                        <input class="form-control" type="text" name="pcantidad"  id="pcantidad" required value="{{old('pcantidad')}}"  placeholder="Cantidad">
                        </div>
                  </div>
               </div>

               
               


               <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                  <div class="form-group">
                     <label for="precio_compra"><span>Precio Compra</span></label>
                       <div class="input-group margin-bottom-sm">
                         <span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
                            <input class="form-control" type="text" name="pprecio_compra"  id="pprecio_compra" placeholder="P. Compra" >
                        </div>
                  </div>
               </div>


                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-6">
                  <div class="form-group">
                        <label for="fecha_vencimiento"><span>Fecha Vencimiento</span></label>
                     <div class="input-group margin-bottom-sm">
                      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        <input  type="Date"  class="form-control" type="text" name="fecha_vencimiento"  id="fecha_vencimiento" required value="{{old('pfecha_vencimiento')}}"  placeholder="fecha_vencimiento">
                        </div>
                  </div>
               </div>



               

               




               <!--<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                  <div class="form-group">
                     <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                  </div>
               </div>-->

               <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                  <div class="form-group">
                     <button type="button" id="bt_add" class="btn btn-success"><span class="fa fa-plus"></span></button></a></button>
                  </div>
                  </div>

               <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                     

                     <!--<thead style="background-color:#1c779e">

                           <th style="text-align:left">
                           <font color="white">OPCIONES</font></th>
                           <th style="text-align:left">
                           <font color="white">PRODUCTOS</font></th>
                           <th style="text-align:left">
                           <font color="white">FECHA VENCIMIENTO</font></th>
                           <th style="text-align:left">
                           <font color="white">CANTIDAD</font></th>
                           <th style="text-align:left">
                           <font color="white">PRECIO COMPRA</font></th>
                           <th style="text-align:left">
                           <font color="white">SUBTOTAL</font></th>-->


                        <thead style="background-color:#A9D0F5">
                           <th style="text-align:center">Opciones</th>
                           <th style="text-align:center">Productos</th>
                           <th style="text-align:center">F. Vencimiento</th>
                           <th style="text-align:center">Cantidad</th>
                           <th style="text-align:center">Precio Compra</th>
                           <th style="text-align:center">Subtotal</th>                      
                        </thead>
                        <tfoot>
                          
                           <th></th>
                           <th></th> 
                           <th>SUBTOTAL<h4 id="total">.$/ 0.00</h4></th>
                           <th>IVA<h4 id="total2">$/ 0.00</h4></th>
                           <th>TOTAL<h4 id="total3">$/ 0.00</h4></th>
                           
                           
                           

                        </tfoot>
                        
                     </table>
                  </div>

          </div>
               </div>


               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            <div class="form-group">
               <input name="_token" value="{{csrf_token() }}" type="hidden">
               <button class="btn btn-primary" type="submit">Guardar</button>
               <button class="btn btn-danger" type="reset">Cancelar</button>
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
   total2=0;
   total3=0;
   subtotal=[];
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

         if(idproducto!="" && cantidad!="" && cantidad>0 && precio_compra!=""){
            //subtotal[cont]=(cantidad*precio_compra);
            //total=total+subtotal[cont];
            //total2="";

            if($('#pnodacion option:selected').val()=='SI'){
              subtotal[cont]=(cantidad*precio_compra);
              total=total+subtotal[cont];

            }
            else{

              subtotal[cont]=(cantidad*0.00);
            } 
               
            

            if($('#pimpuesto option:selected').val()=='SI'){
             
              
            total2=total*(impuesto/100);
            }
            else{

              total2=total*0.00;
              //total2=total2+subtotal[cont]*0.00;

            } 
            //total3[cont]=total+total2[cont];
             total3=total+total2;




            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn  btn-warnig" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+producto+'</td><td><input type="date" name="fecha_vencimiento[]" value="'+fecha_vencimiento+'"></td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td>'+subtotal[cont]+'</td></tr>';
           // <input type="number" name="precio_venta[]" value="'+precio_venta+'">


            cont++;
            limpiar();
            $("#total").html("$/. " + total);
            $("#total2").html("$/. " + total2);
            $("#total3").html("$/. " + total3);

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

@endsection