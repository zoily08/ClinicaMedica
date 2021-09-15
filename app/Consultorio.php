<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;


class Consultorio extends Model
{
    protected $table= 'consultorio';

     protected $primaryKey='idconsultorio';

     public $timestamps=false;

     protected $fillable =[

            'nombre'
            
     ];

     protected $guarded =[


     ];
}
