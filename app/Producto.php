<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table= 'producto';

     protected $primaryKey='idproducto';

     public $timestamps=false;

     protected $fillable =[
     	'codigo_barra',
     	'unidad_medida',
     	'nombre_producto',
     	'fecha_registro',
     	'imagen',
          'margen_ganancia',
          'indicacion',
          'descuento',
          'presentacion',
     	'estado', 
     	'idproveedor'
     ];

     protected $guarded =[


     ];
}

