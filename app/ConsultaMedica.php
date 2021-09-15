<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class ConsultaMedica extends Model
{
    protected $table= 'consulta_medica';

     protected $primaryKey='idconsulta_medica';

     public $timestamps=false;

     protected $fillable =[
     	'idpaciente',
     	'idsignos_vitales',
     	'enfermedad',
     	'tratamiento',
     	'observacion',
     	'otros',
     	'estado_c' 
     ];

     protected $guarded =[
 

     ];
}
