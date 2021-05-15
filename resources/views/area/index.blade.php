@extends('layouts.admin')

@section('content')



<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>
            <FONT FACE="times new roman" size="6" color="0e4743"> Listado de Áreas </FONT>
            <a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-area-create" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span> 
            </button></a>
            {{-- @include('area.search') --}}
        </h3>
        {{-- @include('area.search') --}} 
    </div> 
</div>
 
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table datatable" style="text-align:center;">
                <thead style="background-color:#1c779e">
                    <tr>
                        <th style="text-align:center;"><font color="white">#</font></th>
                        <th style="text-align:center;"><font color="white">ÁREA</font></th>
                        <th style="text-align:center;"><font color="white">ESTADO</font></th>
                        <th style="text-align:center;"><font color="white">OPCIONES</font></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areas as $area)
                    <tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $area->name }}</td>
                        <td>{{ ($area->status) ? 'ACTIVO': 'INACTIVO'}}</td>
                        <td>
                            
                            <a class="btn btn-primary" title="Editar" data-toggle="modal" href="#modal-area-edit-{{ $area->id }}"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-Secondary" title="Mostrar" data-toggle="modal" href="#modal-area-show" onclick="clearExamsTable();loadExams({{ $area->id }})"><i class="fa fa-eye"></i></a>
                            <a onclick="changeStatus({{ $area->id }},'{{ $area->name }}',{{ $area->status }})" @if ($area->status)
                                class="btn btn-danger" title="Dar de Baja"
                            @else
                                class="btn btn-success"  title="Dar de Alta"
                            @endif>
                            @if ($area->status)
                            <i class="fa fa-arrow-down"></i>
                        @else
                        <i class="fa fa-arrow-up"></i>
                        @endif</a>
                        </td>
                    </tr>
                    @include('area.edit', ['area' => $area])
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{-- {{ $areas->links() }} --}}
            </div>
        </div>
    </div>
</div>

@include('area.create') 
@include('area.show')
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>

    function changeStatus(id, area, status) {
        console.log(id);
        let url = "{{ route('area.destroy',':id') }}";
        Swal.fire({
            title: '¿Estás seguro?',
            text: (!status) ? "Desea de habilitar el área: "+ area +" !":"Desea de deshabilitar el área: "+ area +" !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: (!status) ? '¡Sí, habilítelo!':'¡Sí, deshabilítelo!'
            }).then((result) => {
            if (result.value) {
                axios.delete(url.replace(':id',id)).then(function (response) {
                    if (!response.data.error) {
                        Swal.fire({
                            type: 'success',
                            title: 'Exito!!!',
                            text: response.data.msg
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Error!!!',
                            text: response.data.msg
                        });
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        });
        
    }
    
    function clearExamsTable() {
        let tbody = document.getElementById('exams_list');
        tbody.querySelectorAll('tr').forEach(function(el,index){
                tbody.removeChild(el)
            });
    }

    function loadExams(area_id) {
        let url = "{{ route('area.get_exams',':id') }}";
        axios.get(url.replace(':id',area_id)).then(function (response) {
            // console.log(response.data);
            let tbody = document.getElementById('exams_list');
            response.data.exams.forEach(element => {
                let tr = document.createElement('TR');
                let tdName = document.createElement('TD');
                let tdType = document.createElement('TD');
                tdName.innerHTML = element.code;
                tdType.innerHTML = element.name;
                tr.appendChild(tdName);
                tr.appendChild(tdType);
                tbody.appendChild(tr);
            });
        })
        .catch(function (error) {
            console.log(error);
        });
      }
</script>
@endpush