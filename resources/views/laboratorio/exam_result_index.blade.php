@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>
            <font color="red">Listado de Ordenes </font>
           
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            @if (count($orders))
            <table class="table datatable" style="text-align:center;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>PACIENTE</th>
                        
                        <th>FECHA</th>
                        <th>ESTADO</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->patient->nombre_completo }}</td>
                        
                        <td>{{ date("d-m-Y", strtotime($order->created_at)) }}</td>
                        <td>{{ ($order->status) }}</td>
                        <td>
                             <a class="btn btn-info" title="Agregar Resultados" data-toggle="modal" href="#modal-result-edit" onclick="clearExamsTable();loadExams({{ $order->id }})"><i class="fa fa-edit"></i></a>
                          
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="well well-lg text-center">
                <h3>No hay Registros <i class="fa fa-frown-o" aria-hidden="true"></i></h3>
            </div>
            @endif
            {{-- <div class="text-center">
                    {{ $orders->links() }}
        </div> --}}
    </div>
</div>
</div>
@include('laboratorio.exam_result_edit')
@include('laboratorio.exam_result_save')
@endsection

@push('scripts')
<script src="{{ asset('js/laboratorio.js') }}" type="text/javascript" charset="utf-8" async defer></script>
<script>
 
    function clearExamsTable() {
        let tbody = document.getElementById('exams_list');
        tbody.querySelectorAll('tr').forEach(function(el,index){
                tbody.removeChild(el)
            });

       
    }

        
         function loadExams(order_id) {
    
        let url = "{{ route('order.get_exams',':id') }}";
        axios.get(url.replace(':id',order_id)).then(function (response) {
            // console.log(response.data);
            document.getElementById('patient_name').value =response.data.patientname+" "+response.data.patientlastname;
            
                let tbody = document.getElementById('exams_list');
console.log(response.data.exams);
               // response.data.exams.forEach(element => {
                  for (var i = 0 ; i <= response.data.exams.length; i++) {
                       let tr = document.createElement('TR');
                let tdName = document.createElement('TD');
                let tdType = document.createElement('TD');
                let tdOption = document.createElement('TD');
                tdName.innerHTML = response.data.exams[i].code;
                tdType.innerHTML = response.data.exams[i].name;
                 
                var btn = document.createElement('button');
                btn.type = "button";
                btn.innerHTML=response.data.exams[i].id;
                btn.setAttribute("name",response.data.exams[i].id);
                btn.setAttribute("class", "btn btn-danger"); 
                btn.setAttribute("data-toggle", "modal"); 
                btn.setAttribute("href", "#modal-result-save");
                btn.setAttribute("id",response.data.exams[i].id); 
              btn.addEventListener('click', generatemodal(response.data.exams[i].id), false);
                 //var btn = '<input type="submit" name="element.id" id="element.id" class="btn btn-danger" data-toggle="modal" href=#modal-result-save" onclick="generatemodal(element.id)"/>';

                 tdOption.appendChild(btn);
                      
                tr.appendChild(tdName);
                tr.appendChild(tdType);
                tr.appendChild(tdOption);
                 tbody.appendChild(tr);
                  }
                
        
 

        })
        .catch(function (error) {
            console.log(error);
        });
      }
 function clear1(){

   
 }

     function generatemodal(id) {
document.getElementById('exam_code').value="";
document.getElementById('dd').innerHTML="";

        let url = "{{ route('order.generatemodal',':id') }}";
        axios.get(url.replace(':id',id)).then((response) => {
            
        
document.getElementById('exam_code').value=id;

  let div = document.getElementById('dd');
  div.innerHTML=response.data.form;


        console.log(response.data);         
        }).catch((err) => {
            console.log(err);        
        });
    }


      

</script>

<script type="text/javascript">
    jQuery(function($) {
      $('input,form').attr('autocomplete','off');
      $("#telefono_p").mask("0000-0000",{placeholder: '0000-0000'} );
      //$('textarea,form').attr('autocomplete','off');
   });

function soloNumero(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        numerito="0123456789./";
        especiales="8-37-38-46";

        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;
            }
        }
        if(numerito.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
        }
        function soloEntero(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        numerito="0123456789";
        especiales="8-37-38-46";
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;
            }
        }
        if(numerito.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
        }

        function soloLetras(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key).toLowerCase();
        letras=" áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales="8-37-38-46-164";
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;break;
            }
        }
        if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
        }

    
     
    ////////

    
</script>
@endpush