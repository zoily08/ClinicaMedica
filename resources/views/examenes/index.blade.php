@extends('layouts.admin')

@section('content') 
 
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>
            <FONT FACE="times new roman" size="6" color="0e4743"> Listado de Examenes </FONT>
            <a><button type="button" class="btn btn-success" data-toggle="modal" href="#modal-exam-create" onclick="enableInputs()" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span> 
            </button></a>
        </h3>
    </div>  
</div>


<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive" style="overflow: auto">
          <table class="table table-striped table-bordered table-condensed table-hover datatable" style="text-align:center;">
              <thead style="background-color:#1c779e">
                  <tr>
                      <th style="text-align:left"><font color="white">#</font></th>
                      <th style="text-align:left"><font color="white">CODIGO</font></th> 
                      <th style="text-align:left"><font color="white">EXAMEN</font></th>
                      <th style="text-align:left"><font color="white">PRECIO</font></th>
                      <th style="text-align:left"><font color="white">ESTADO</font></th>
                      <th style="text-align:left"><font color="white">OPCIONES</font></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($exams as $exam)
                      <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
                          <td align="left">{{ $loop->iteration }}</td>
                          <td align="left">{{ $exam->code }}</td>
                          <td align="left">{{ $exam->name }}</td>
                          <td align="left">{{ $exam->price }}</td>
                          <td>
                            @if ($exam->status == "Activo")
                              <p class="text-center"><small class="label pull center p1 bg-olive">{{$exam->status}} </small></p>  
                            @else
                                @if ($exam->status == "Inactivo")
                                  <p class="text-center"><small class="label pull center p1 bg-red">{{$exam->status}} </small></p>
                                @else
                                  <p class="text-center"><small class="label pull center p1 bg-yellow">{{$exam->status}} </small></p>
                                @endif
                            @endif
                          </td>
                          <td>
                              <a data-toggle="modal" href="#modal-exam-create" class="btn btn-Secondary" onclick="getExamData({{ $exam->id }});disableInputs()"><span class="fa fa-eye"></span></a>
                              <a data-toggle="modal" href="#modal-exam-create" class="btn btn-primary" style="color: white; background-color: #d2691e" onclick="getExamData({{ $exam->id }});enableInputs()"><span class="fa fa-pencil"></span></a>
                          </td>
                      </tr>

                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>


@include('examenes.create')
@include('examenes.edit')
@include('examenes.show')

@endsection

@push('scripts')

<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 
    <script type="text/javascript" charset="utf-8" async defer>
  function toCamelCase(str) {
    return str
        .replace(/\s(.)/g, function($1) { return $1.toUpperCase(); })
        .replace(/\s/g, '')
        .replace(/^(.)/, function($1) { return $1.toLowerCase(); });
  }
  
  function unCamelCase(camelCaseStr) {
    return camelCaseStr.replace(/([A-Z])/g, ' $1')
    .replace(/([0-9])/g, ' $1')
    .replace(/^./, function(str){ return str.toUpperCase(); });
  }

  function clearTable(table_id) {
    let table = document.getElementById(table_id);

    for (let index = table.rows.length - 1; index > 0; index--)
    {
      table.deleteRow(index);
    }
  }

    function toggle(id) {
      var div = getElement(id);
      div.style.display = div.style.display == "none" ? "block" : "none";
    }

    function getElement(element_id = null) {
      return element_id ? document.getElementById(element_id): element_id;
    }

    function deleteRow(e) {
      e.target.parentNode.parentNode.remove();
    }

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

    function appendAttributes(node, name, arrayList) {
      for (var i = 0; i < arrayList.length; i++) {
        let item = arrayList[i];
        let _a = createHTMLElement('INPUT','hidden',name+'['+i+'][name]',item.name);
        let _b =  createHTMLElement('INPUT','hidden',name+'['+i+'][value]',item.value);
        console.log(_a);
        console.log(_b);
        node.appendChild(_a);
        node.appendChild(_b);
      }
    }

    function add() {
      attributesGlobal = [];
      let tbl = getElement('dataList');
      let classes = ['form-control'];
      let typeInput = ['input','select','textarea'];
      let num_rows = tbl.rows.length;
      let select = getElement('select-type').selectedIndex;
      if(select >0){
        let name = getElement('name-field').value;
        if(name == ''){
          return -1;
        }
      let textArea = getElement('options-lst');
      let lines = [];
      let tr = document.createElement('TR');
      let tdName = document.createElement('TD');
      let tdType = document.createElement('TD');
      let tdBtn = document.createElement('TD');
      let btn = document.createElement('BUTTON');
      btn.innerHTML ='Remover';
      btn.addEventListener('click', deleteRow);
      btn.setAttribute("class", "btn btn-danger");
      tdName.innerHTML = name;
      tdType.innerHTML = getElement('select-type').options[select].text;
      tdBtn.appendChild(btn);

      let hidden = createHTMLElement('INPUT','hidden','inputs['+num_rows+'][name]',toCamelCase(name));
      tdName.appendChild(hidden);

      let hiddenType =  createHTMLElement('INPUT','hidden','inputs['+num_rows+'][type]',typeInput[select-1]);
      tdName.appendChild(hiddenType);

      textArea.querySelectorAll('option').forEach(el=>{
        lines.push(el.value);
        console.log(el.value);
      });
      // console.log(lines);
      if(getElement('select-type').value == 'select'){
        appendToNode(tdName,'inputs['+num_rows+'][options][][name]',lines);
        textArea.querySelectorAll('option').forEach(el=>{
          tdName.appendChild(createHTMLElement('INPUT','hidden','inputs['+num_rows+'][options][][name]',el.value));
      });
        
        // console.log(lines);
      }else{
        let hiddenOption = createHTMLElement('INPUT','hidden','inputs['+num_rows+'][options]',false);
        tdName.appendChild(hiddenOption);
      }
      
      let hiddenClasses = createHTMLElement('INPUT','hidden','inputs['+num_rows+'][classes]');
      // hiddenClasses.setAttribute();
      appendToNode(hiddenClasses,'inputs['+num_rows+'][classes][]',classes);

      tr.appendChild(tdName);
      tr.appendChild(tdType);
      tr.appendChild(hiddenClasses);
      tr.appendChild(tdBtn);
      // if(typeInput[select-1] == 'input' ||typeInput[select-1] == 'textarea'){
        
        let hiddenAttribute = createHTMLElement('INPUT','hidden','inputs['+num_rows+'][attributes]');
        let array = {};
        array.name = "placeholder";
        array.value = name;
        let tittle = {};
        tittle.name = "title";
        tittle.value = name;
        let a = [array,tittle];
        console.log(a);
        appendAttributes(hiddenAttribute,'inputs['+num_rows+'][attributes]',a);
        tr.appendChild(hiddenAttribute);
      // }
      // console.log(tr);
      tbl.appendChild(tr);
      getElement('select-type').selectedIndex = 0;
      getElement('name-field').value = '';
      getElement('options-lst').value = ''; 
      }
      // let arrays = $('#JSONform').extractObject();
      // console.log(arrays);
      // getElement('show').innerHTML = JSON.stringify(arrays);
    }

    window.addEventListener('load', function () {
      getElement('options-textarea').style.display = 'none';
      getElement('number-comment').style.display = 'none';

      getElement('addBtn').addEventListener('click',add);
      getElement('select-type').addEventListener('change', function() {
        let select = document.getElementById('select-type');
        if (select.options[select.selectedIndex].value == 'select') {
          toggle('options-textarea');
        }else{
          let div = getElement('options-textarea');
          div.style.display = 'none';
        }
      });
    }, false);

    function getExamData(id) {

      // clearTable('tblExamStruct');
      let url = '{{ route("exams.get_info",":id") }}'.replace(':id',id);
      let url_edit= '{{ route("exams.update",":id") }}'.replace(':id',id);
      let form = getElement('ExamForm');
      let action = form.action;
      form.appendChild(createHTMLElement('INPUT','hidden','_method','PATCH'));
      form.appendChild(createHTMLElement('INPUT','hidden','exam_id',id));
      form.action= url_edit.replace(':id',id);
      axios.get(url).then(function (response) {
        let data = response['data'];
        form.elements["name"].value = data['exam']['name'];
        form.elements["price"].value = data['exam']['price'];
        let values =data['areas_id']; 
        let areas = Array.from(document.querySelectorAll('#areas_id option'));
        values.forEach(function(v) {
          // console.log(areas);
          areas.find(c => c.value == v).selected = true;
        });
        $('#areas_id').trigger("change");
        document.getElementById('areas_id').disabled=true;
         form.elements["type"].value = data['exam']['type'];
         $('#exam_type').trigger("change");
       let inputs =JSON.parse(data['exam']['inputs']);
      //  console.log(inputs);
       let input_lst = getElement('dataList');
        for (let index = 0; index < inputs.length; index++) {
          const element = inputs[index];
          // console.log(element);
          let tr = document.createElement('TR');
          let tdName = document.createElement('TD');
          let tdType = document.createElement('TD');
          let tdBtn = document.createElement('TD');
          let btn = document.createElement('BUTTON');
          let index_row = input_lst.rows.length;
          btn.innerHTML ='Remover';
          btn.addEventListener('click', deleteRow);
          btn.setAttribute("class", "btn btn-danger btnRemover");
          // btn.setAttribute("id", "btnRemover");
          tdName.innerHTML = unCamelCase(element.name);
          switch (element.type) {
            case 'input':
            tdType.innerHTML = 'Texto'
              break;
            case 'select':
            tdType.innerHTML = 'Seleccion'
              break;
            case 'textarea':
            tdType.innerHTML = 'Comentario'
              break;
            default:
              break;
          }
          // ESTRUCTURA INPUTS
          tdName.appendChild(createHTMLElement('INPUT','hidden','inputs['+index_row+'][name]',element.name));
          tdName.appendChild(createHTMLElement('INPUT','hidden','inputs['+index_row+'][type]',element.type));
          if(element.type == 'select'){
            element.options.forEach(el => {
              tdName.appendChild(createHTMLElement('INPUT','hidden','inputs['+index_row+'][options][][name]',el.name));
            });
          }else{
            tdName.appendChild(createHTMLElement('INPUT','hidden','inputs['+index_row+'][options]',false));
          }
          appendAttributes(tdName,'inputs['+index_row+'][attributes]',element.attributes);
          appendToNode(tdName,'inputs['+index_row+'][classes][]',element.classes);

          // ESTRUCTURA INPUTS
          //FIN
          tdBtn.appendChild(btn);
          tr.appendChild(tdName);
          tr.appendChild(tdType);
          tr.appendChild(tdBtn);
          input_lst.appendChild(tr);
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    }
    
    document.querySelectorAll('.reset-form').forEach(function(btn){
      btn.addEventListener('click',function(evt){
        let form = evt.target.parentNode.parentNode.parentNode;
        form.action= "{{ route('exams.store') }}";
        form.method = 'POST';
        var ele= document.getElementsByName("_method");
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
    function disableInputs() {
      document.getElementById('areas_id').disabled=true;
      document.getElementById('exam_name').disabled=true;
      document.getElementById('exam_price').disabled=true;
      document.getElementById('exam_type').disabled=true;

      document.getElementById('name-field').parentNode.style.display = "none";
      document.getElementById('select-type').parentNode.style.display = "none";
      document.getElementById('options-lst').style.display = "none";
      document.getElementById('colums-lst').style.display = "none";
      document.getElementById('addBtn').parentNode.style.display = "none";
      document.getElementById('btnSubmit').disabled=true;
      document.getElementById('btnReset').disabled=true;
      // document.getElementById('btnRemove').style.display = "none";
      setTimeout(function () {
        document.querySelectorAll('.btnRemover').forEach(btn =>{
        // console.log(btn);
        btn.style.display = "none";
      });
      },500);
    }

    function enableInputs() {
      document.getElementById('areas_id').disabled=false;
      document.getElementById('exam_name').disabled=false;
      document.getElementById('exam_price').disabled=false;
      document.getElementById('exam_type').disabled=false;

      document.getElementById('name-field').parentNode.style.display = "block";
      document.getElementById('select-type').parentNode.style.display = "block";
      document.getElementById('options-lst').style.display = "block";
      document.getElementById('colums-lst').style.display = "block";
      document.getElementById('addBtn').parentNode.style.display = "block";
      document.getElementById('btnSubmit').disabled=false;
      document.getElementById('btnReset').disabled=false;
      // document.getElementById('btnRemove').style.display = "none";
    }

    function addOption2Select(from_input, to_select) {
      let text = document.getElementById(from_input).value;
      if(text != "")
      if ($('#'+to_select).find("option[value='" + text + "']").length) {
        $('#'+to_select).val(text).trigger("change");
      } else { 
        var newState = new Option(text, text, true, true);
        $('#'+to_select).append(newState).trigger('change');
        document.getElementById(from_input).value ="";
        // return 0;
      } 
    }
    window.addEventListener('keydown',function(e){
      if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){
        if(e.target.nodeName=='INPUT'&&e.target.type=='text'){
          e.preventDefault();return false;
        }
      }
    },true);

  </script>
@endpush
