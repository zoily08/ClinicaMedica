<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table= 'venta';

     protected $primaryKey='idventa';

     public $timestamps=false;

     protected $fillable =[
     'fecha_venta', 
     'tipo_comprobante',
     'num_comprobante',
     'total_venta',
     'estado',
     'idpaciente'

     ];

     protected $guarded =[


     ];
}
