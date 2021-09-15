<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table='compra';
    protected $primaryKey='idcompra';
    public $timestamps=false;

    protected $fillable =[
    'num_comprobante',
    'tipo_comprobante',
    'presentacion',
    'estado',
    'fecha_compra',
    'idproveedor'
    
    ];
    protected $guarded=[
    

    ];
}
