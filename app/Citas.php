<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;


class Citas extends Model
{
    protected $table= 'citas';

     protected $primaryKey='idcitas';

     public $timestamps=false;

     protected $fillable =[

            'fecha',
            'hora',
            'observacion',
            'idpaciente',
            'idmedico',
            'idconsultorio',
            'idespecialidad'


            

            
     ];

     protected $guarded =[


     ];
}
