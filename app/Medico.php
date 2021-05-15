<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;


class Medico extends Model
{
    protected $table= 'medico';

     protected $primaryKey='idmedico';

     public $timestamps=false;

     protected $fillable =[

            'nombre',
            'apellido',
            'telefono',
            'direccion',
            'estado',
            'idespecialidad'


            

            
     ];

     protected $guarded =[


     ];
}
