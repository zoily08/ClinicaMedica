<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Especificacion extends Model
{
    protected $table= 'especificacion';

     protected $primaryKey='idespecificacion'; 

     public $timestamps=false;

     protected $fillable =[
     	 
     	'idtipoconsulta',
     	'idmedico',
          'idpaciente'
     	 
     ];

     protected $guarded =[


     ];
}

