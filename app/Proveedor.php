<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
   protected $table= 'proveedor';

     protected $primaryKey='idproveedor';

     public $timestamps=false;

     protected $fillable =[
     	'nombre_empresa',
        'registro_sanitario',
        'nombre_p',
     	'direccion_p',
     	'telefono_p',
     	'fecha_registro_p',
     	'estado_p',
        'detalle_baja'  
     ];

     protected $guarded =[


     ];

     public function scopeSearch($query,$searchText)
    {
        if($searchText)
            return $query->where('nombre_p', 'LIKE',"%$searchText%");
    } 
}
