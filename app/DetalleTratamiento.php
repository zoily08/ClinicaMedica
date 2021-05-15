<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class DetalleTratamiento extends Model
{
    protected $table='detalle_tratamiento';
    protected $primaryKey='iddetalle_tratamiento';
    public $timestamps=false;

    protected $fillable =[
    'idtratamiento',
    'idproducto',
    'cantidad'


    ];
    protected $guarded=[
    

    ];
}
