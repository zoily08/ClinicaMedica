<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class ConsultaPsicologica extends Model
{
    protected $table= 'consulta_psicologica';
    protected $primaryKey ='idconsulta_psicologica';

    public $timestamps=false;

    protected $fillable =[
        'detalle',
        'observacion',
        'fecha_consulta',
        'estado',
        'idpaciente'
    ];
    protected $guarded=[
        
    ];
}