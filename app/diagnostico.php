<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class diagnostico extends Model
{
    protected $table= 'diagnostico';
    protected $primaryKey ='iddiagnostico';
    
    public $timestamps=false;

    protected $fillable =[
        'detalle',
        'observacion',
        'idconsulta_medica'
    ];
    protected $guarded=[
        
    ];
}
