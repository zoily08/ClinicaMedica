<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class SignosVitales extends Model
{
	protected $table='signos_vitales';
    protected $primaryKey ='idsignos_vitales';
    
    public $timestamps=false;

    protected $fillable =[
        'temperatura',
        'presionsistolica',
        'presiondiastolica',
        'peso',
        'estatura',
        'IMC',
        'idpaciente',
        'estado',
        'fecharegistro'
    ];
    protected $guarded=[ 
        
    ];    
}
