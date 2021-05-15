<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Especificacion extends Model
{
    protected $table= 'producto';

     protected $primaryKey='idproducto';

     public $timestamps=false;

     protected $fillable =[
     	
     ];

     protected $guarded =[


     ];
}

