<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table='detalle_compra';
    protected $primaryKey='iddetalle_compra';
    public $timestamps=false;

    protected $fillable =[
    'idcompra',
    'idproducto',
    'cantidad',
    'precio_compra',
    'impuesto',
    'fecha_vencimiento'
    //'precio_venta'


    
    ];
    protected $guarded=[
    

    ];
}
