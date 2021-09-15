<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;


class Especialidad extends Model
{
    protected $table= 'especialidad';

     protected $primaryKey='idespecialidad';

     public $timestamps=false;

     protected $fillable =[

            'nombre'
            
     ];

     protected $guarded =[ 


     ];
}
