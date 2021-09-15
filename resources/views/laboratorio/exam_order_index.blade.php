@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3>
            <FONT FACE="times new roman" size="6" color="0e4743"> Listado de Examenes </FONT>
            <a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-order_create" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span> 
            </button></a>
        </h3> 
    </div>
</div> 
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive" style="overflow: auto">
            <table class="table table-striped table-bordered table-condensed table-hover datatable"
                style="text-align:center;">
                <thead style="background-color:#1c779e">
                    <tr>
                        <th style="text-align:left">
                            <font color="white">#</font>    
                        </th>
                        <th style="text-align:left">
                            <font color="white">PACIENTE</font> 
                        </th>
                        <th style="text-align:left">
                            <font color="white">SUB TOTAL</font>
                        </th>
                        <th style="text-align:left">
                            <font color="white">DESCUENTO</font>
                        </th>
                        <th style="text-align:left">
                            <font color="white">TOTAL</font>
                        </th>
                        <th style="text-align:left">
                            <font color="white">FECHA</font>
                        </th>
                        <th style="text-align:left">
                            <font color="white">ESTADO</font>
                        </th>
                        <th style="text-align:left">
                            <font color="white">OPCIONES</font>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
                        <td align="left">{{ $loop->iteration }}</td>
                        <td align="left">{{ $order->patient->nombre_completo }}</td>
                        <td align="left">$ {{ $order->price }}</td>
                        <td align="left">$ {{ ($order->discount/100) * $order->price }}</td>
                        <td align="left">{{ $order->total }}</td>
                        <td align="left">{{ date("d-m-Y", strtotime($order->created_at)) }}</td>
                        <td>
                            @if ($order->status == "Finalizada")
                            <p class="text-center"><small class="label pull center p1 bg-olive">{{$order->status}}
                                </small></p>
                            @else
                            @if ($order->status == "Cancelada")
                            <p class="text-center"><small class="label pull center p1 bg-red">{{$order->status}}
                                </small></p>
                            @else
                            <p class="text-center"><small class="label pull center p1 bg-yellow">{{$order->status}}
                                </small></p>
                            @endif
                            @endif 
                        </td>
                        <td>
                            <a data-toggle="modal" href="#modal-order_create" class="btn btn-Secondary"
                                onclick="getOrder({{ $order->id }});disable()"><span class="fa fa-eye"></span></a>
                            <a data-toggle="modal" href="#modal-order_create" class="btn btn-primary"
                                style="color: white; background-color: #d2691e"
                                onclick="clearTable('tbl-exams-order');getOrder({{ $order->id }})"><span
                                    class="fa fa-pencil"></span></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('laboratorio.create_order')
@include('laboratorio.add_patient')
@endsection

@push('scripts')
<script src="{{ asset('js/laboratorio.js') }}" type="text/javascript" charset="utf-8" async defer></script>
<script>
    $(function () {
        $('.exams-select').selectpicker();
});
    function appendToNode(node, name, lines = []) {
      console.log(typeof(lines))
      console.log('object-> '+ lines.length);
      for (var j = 0; j < lines.length; j++) {
          if(lines[j] != ''){
            let hiddenOption = createHTMLElement('INPUT','hidden',name,lines[j]);
            node.appendChild(hiddenOption);
          }
        }
    }

    function createHTMLElement(node_element,type,name,value=false) {
      let _a = document.createElement(node_element);
        _a.setAttribute('type',type);
        _a.setAttribute('name',name);
        _a.setAttribute('value',value); 
        return _a;
    }

    function disable() {
        document.getElementById('patient_id').disabled = true;
        setTimeout(function () {
        document.querySelectorAll('.btnRemover').forEach(btn =>{
            btn.style.display = "none";
        });       
        },1000);
        document.getElementById('btnSubmit').style.display = 'none';
        document.getElementById('btnReset').style.display = 'none';
    }

   async function getOrder(id)  {    
        let url = "{{ route('laboratory.show',':id') }}";
        let url_edit= '{{ route("laboratory.update_order",":id") }}'.replace(':id',id);
        let form = document.getElementById('formOrder'); 
        let action = form.action;
        form.appendChild(createHTMLElement('INPUT','hidden','_method','PATCH'));
        form.appendChild(createHTMLElement('INPUT','hidden','exam_id',id));
        form.action= url_edit.replace(':id',id);
        axios.get(url.replace(':id',id)).then((response) => {
            $('#patient_id').val(response.data.patient.idpaciente).trigger('change');
            response.data.exams.forEach(element => { 
                let select = $('#select-exam');
                select.val(element.id).trigger('change');
            });
        }).catch((err) => {
            console.log(err);        
        });
    }

    function clear() {
        
    }

    function getPatient(select) {
            let patient_id = select.value;
            if (patient_id == -1) {
                return 0;
            }
            let url = "{{ route('laboratory.get_patient',':id') }}";
            axios.get(url.replace(':id',patient_id)).then((response) => {
                console.log(response);
                document.getElementById('patient_name').value = response.data.patient.nombre_completo;
                document.getElementById('patient_age').value = response.data.patient.edad_p;
            }).catch((err) => {
                
            });
        }
        function total(table_id) {
            let records = document.getElementById(table_id).rows;
            let input = document.getElementById('total');
            let sub_total = document.getElementById('sub_total');
            let discount = (parseFloat(document.getElementById('discount').value) > 0.0) ? parseFloat(document.getElementById('discount').value)/100:0;
            let total_table = 0;
            // console.log(discount);
            for (let i = 0; i < records.length-1; i++) {
                let cost = parseFloat(records[i].cells[2].innerHTML);
                // console.log(cost);
                total_table += cost;
            }
            sub_total.value = total_table.toFixed(2);
            input.value = (total_table - (total_table * discount)).toFixed(2);
            document.getElementById('total_hidden').value = total_table;
        }
        function saveForm() {
            let form = document.getElementById('FormAddPatient');
            let dataForm = serializeArray(form);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: form.action,
                    type: 'POST',
                    dataType: 'json',
                    data: dataForm,
                    complete: function(data) {
                        console.log(data);
                    }
                });
            }

            function serializeArray( form ) {
                var obj = {};
                var elements = form.querySelectorAll( "input, select, textarea" );
                for( var i = 0; i < elements.length; ++i ) {
                    var element = elements[i];
                    var name = element.name;
                    var value = element.value;

                    if( name ) {
                        obj[ name ] = value;
                    }
                }

                return JSON.stringify( obj );
            }

            function addNewPatient(evt) {
                // evt.preventDefault();
                let form = document.getElementById('FormAddPatient');
                let data = serializeArray(form);
                let url = form.action;
                axios.post(url,data).then((response) => {
                    console.log(response.data);
                    Swal.fire({
                        icon: 'success',
                        title: 'Nuevo Paciente',
                        text: 'El Paciente ha sido registrado exitosamente.',
                        showConfirmButton: false,
                        timer: 1500
                    });

                }).catch((err) => {
                    console.log(err.response.data);
                });
            }

            function clearTable(table_id) {
                let table = document.getElementById(table_id);
                let tr_select = document.getElementById('select-exam').parentNode.parentNode;
                for (let index = table.rows.length - 1; index > 0; index--)
                {
                    table.deleteRow(index);
                }
                table = $(`#${table_id}`);
                table.append(tr_select);
            }

            function fillSelectExams(select_area) {
                let url = "{{ route('area.get_exams',':id') }}";
                let area_id = select_area.value;
                if(area_id == -1){
                    document.getElementById('select-exam').options.length=0;
                    return -1;
                    // select_area.value=0;
                    // select_area.dispatchEvent(new Event('change'));
                }
                
                axios.get(url.replace(':id',area_id)).then((response) => {
                    console.log(response.data.exams);
                    let select = document.getElementById('select-exam');
                    select.options.length = 0;
                    select.appendChild(new Option('Seleccione una Opcion',-1,false,false));
                    response.data.exams.forEach(exam=>{
                        select.appendChild(new Option(exam.name,exam.id,false,false));
                    });
                }).catch((err) => {
                    console.log(err.response.data); 
                });
            }

            // window.addEventListener('load', function () {
                function deleteRow(e) {
                    let item = e.target.parentNode.parentNode.getElementsByTagName('input')[0].value;
                    document.getElementById('select-exam').options[item].disabled = false;
                    e.target.parentNode.parentNode.remove();
                    total('examens-lst');
                }
                function selectEvent(e) {
                    let selectedId = document.getElementById('select-exam').selectedIndex;
                    let id = document.getElementById('select-exam').options[selectedId].value;
                    if (selectedId == 0 || id == -1) {
                        e.preventDefault();
                        return -1;
                    }
                    // console.log(selectedId);
                    let selectedText = document.getElementById('select-exam').options[selectedId].text;
                    document.getElementById('select-exam').options[selectedId].disabled = true;
                    let oldRow = document.getElementById('select-exam').parentNode.parentNode;
                    let oldCells = oldRow.getElementsByTagName('td');
                    let cpOlRow = oldRow.cloneNode(true);
                    cpOlRow.addEventListener('change', selectEvent);
                    oldRow.cells[1].innerHTML = selectedText;
                    let table = document.getElementById('examens-lst');
                    table.appendChild(cpOlRow);
                    
                    let url = "{{ route('laboratory.order_data',':bar') }}";
                    url = url.replace(':bar',id);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        data: {id: selectedId},
                        complete: function(data) {
                            // console.log(data.responseJSON);
                            oldRow.cells[0].innerHTML = data.responseJSON.code;
                            oldRow.cells[2].innerHTML = data.responseJSON.price;
                            let btn = document.createElement('BUTTON');
                            btn.innerHTML ='<i class="fa fa-trash"></i>';
                            btn.addEventListener('click', deleteRow);
                            btn.setAttribute("class", "btn btn-danger btnRemover");
                            btn.setAttribute("title", "Eliminar");
                            oldRow.cells[3].appendChild(btn);
                            let hidden = document.createElement('INPUT');
                            hidden.setAttribute('type','hidden');
                            hidden.setAttribute('name','exams_lst[][id]');
                            hidden.setAttribute('value',data.responseJSON['id']);
                            oldRow.appendChild(hidden);
                            total('examens-lst');
                        }
                    });
                }

 
document.getElementById('discount').addEventListener("change", total('examens-lst'));

document.querySelectorAll('.reset-form').forEach(function(btn){
      btn.addEventListener('click',function(evt){
        let form = evt.target.parentNode.parentNode.parentNode;
        form.action= "{{ route('laboratory.order_store') }}";
        form.method = 'POST';
        var ele= document.getElementsByName("_method");
        document.getElementById('btnSubmit').style.display = 'block';
        document.getElementById('btnReset').style.display = 'block';
        for(var i=0;i<ele.length;i++)
        {
          ele[i].parentNode.removeChild(ele[i]);
        }
        var ele= document.getElementsByName("exam_id");
        for(var i=0;i<ele.length;i++)
        {
          ele[i].parentNode.removeChild(ele[i]);
        }
      });
    });
</script>

<script type="text/javascript">
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

    function llama_Edad() {
    
         var a =calcularEdad($('#idfecha').val());
         $('#Idedad_p').val(a);
        //alert("Holas");
    }
    ////////
    function calcularEdad(fecha) {
            // Si la fecha es correcta, calculamos la edad
    
            if (typeof fecha != "string" && fecha && esNumero(fecha.getTime())) {
                fecha = formatDate(fecha, "yyyy-MM-dd");
            }
    
            var values = fecha.split("-");
            var dia = values[2];
            var mes = values[1];
            var ano = values[0];
    
            // cogemos los valores actuales
            var fecha_hoy = new Date();
            var ahora_ano = fecha_hoy.getYear();
            var ahora_mes = fecha_hoy.getMonth() + 1;
            var ahora_dia = fecha_hoy.getDate();
    
            // realizamos el calculo
            var edad = (ahora_ano + 1900) - ano;
            if (ahora_mes < mes) {
                edad--;
            }
            if ((mes == ahora_mes) && (ahora_dia < dia)) {
                edad--;
            }
            if (edad > 1900) {
                edad -= 1900;
            }
    
            // calculamos los meses
            var meses = 0;
    
            if (ahora_mes > mes && dia > ahora_dia)
                meses = ahora_mes - mes - 1;
            else if (ahora_mes > mes)
                meses = ahora_mes - mes
            if (ahora_mes < mes && dia < ahora_dia)
                meses = 12 - (mes - ahora_mes);
            else if (ahora_mes < mes)
                meses = 12 - (mes - ahora_mes + 1);
            if (ahora_mes == mes && dia > ahora_dia)
                meses = 11;
    
            // calculamos los dias
            var dias = 0;
            if (ahora_dia > dia)
                dias = ahora_dia - dia;
            if (ahora_dia < dia) {
                ultimoDiaMes = new Date(ahora_ano, ahora_mes - 1, 0);
                dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
            }
            return edad + " años y " + meses + " meses  ";
        }
    
</script>
@endpush