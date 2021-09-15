<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
     protected $table= 'presentacion';

     protected $primaryKey='idpresentacion';

     public $timestamps=false;

     protected $fillable =[
     'nombre',
     'unidades',
     'descripcion',
     'estado'

     ];

     protected $guarded =[


     ];
}
