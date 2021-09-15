@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                    <div  style=" background-color:#f2f2f1 " >   

                        <fieldset  style="min-width: 0;padding:.35em .625em .75em!important;margin:0 2px;
                border:2px solid silver!important;margin-bottom: 10em;box-shadow: -6px 10px 20px 0px; ">

                 <legend  style="width: inherit;padding:inherit;border:2px solid silver;" class="legend" align= "center"  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><div style="color: #112b56"  >

                    <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header"> <B>Asignacion de roles a Usuarios</B>
                         </div>

                </div>

            </legend>
                
   <br>
   
        <div class="col-md-12" >

                    {!! Form::model($user,['route' =>['users.update', $user->id], 'method'=>'PUT']) !!}

                    @include('users.partials.form')


                     {!! Form::close() !!}


 

                

                        </div>
                         </fieldset>
                         </div>
   
                      
                 <br>
        </div>
    </div>
</div>
</div>
@endsection