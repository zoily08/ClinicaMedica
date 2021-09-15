@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                Usuario
                   
                </div>

                <div class="card-body">

                    {!! Form::model($role,['route' =>['roles.update', $role->id], 'method'=>'PUT']) !!}

                    <div class="form-group"> 
    {{ Form::label('name','Nombre') }}
    {{ Form::text('name',null,['class'=>'form-control']) }}
    
</div>

<div class="form-group"> 
    {{ Form::label('slug','URL Amigable') }}
    {{ Form::text('slug',null,['class'=>'form-control']) }}
    
</div>

<div class="form-group"> 
    {{ Form::label('description','Descripcion') }}
    {{ Form::textarea('description',null,['class'=>'form-control']) }}
    
</div>
    <hr>
    <h3>Permiso Especial</h3>
    <div class="form-group">
    <label>{{ Form::radio('special','all-access') }}Acceso total</label>
    <label>{{ Form::radio('special','no-access') }}Ningun acceso</label>
    </div>

    <hr>
    <h3>Listado de Permisos</h3>

        <div class="form-group">
        <ul class="list-unstyled">
            @foreach($permissions as $permission)
            <li>
                
                <label>
                    {{ Form::checkbox('permissions[]',$permission->id,null) }}
                    {{ $permission->name }}
                    <em>({{ $permission->description  ?:'Sin descripcion' }})</em>
                    
                </label>
                    
            </li>

            @endforeach
            
        </ul>
        
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


                     {!! Form::close() !!}




                

                        </div>
            </div>
        </div>
    </div>
</div>
@endsection