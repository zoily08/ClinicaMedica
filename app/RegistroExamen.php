<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class RegistroExamen extends Model
{
    protected $table= 'registro_examen';
    protected $primaryKey ='idregistro_examen';
    
    public $timestamps=false;

    protected $fillable =[
        'tipo_examen',
        'precio',
        'nombre_examen',
        'fecha_examen'
    ];
    protected $guarded=[
        
    ];
}
