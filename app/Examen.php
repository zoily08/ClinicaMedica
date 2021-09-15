<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $table= 'examen';
    protected $primaryKey ='idexamen';
    
    public $timestamps=false;

    protected $fillable =[
        'idexamen',
        'idregistro_examen',
        'idpaciente',
        'idusuario'
    ];
    protected $guarded=[
        
    ];

    public function orders()
    {
        return $this->belongsToMany('ClinicaMedica\Order','medical_exam_orders');
    }
}
