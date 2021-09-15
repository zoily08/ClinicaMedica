<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table= 'paciente';

     protected $primaryKey='idpaciente';

     public $timestamps=false;

     protected $fillable =[
              'idpaciente',
            'nombre_p',
            'apellido_p',
            'edad_p',
            'genero_p',
            'fechanacimiento_p',
            'direccion_p',
            'nombre_padre_p',
            'nombre_madre_p',
            'nombre_conyuge_p',
            'nombre_responsable_p',
            'telefono_p',
            'fecha_registro_p',
            'estado_p',
            'idusuario'
     ];

     protected $appends =[
       'nombre_completo'
     ];

     public function getNombreCompletoAttribute()
     {
       return "{$this->nombre_p} {$this->apellido_p}";
     }

     public function orders()
     {
       return $this->hasMany('ClinicaMedica\Order');
     }
}
