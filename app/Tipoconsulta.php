<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;


class Tipoconsulta extends Model
{
    protected $table= 'tipoconsulta';

     protected $primaryKey='idtipoconsulta';

     public $timestamps=false;

     protected $fillable =[

            'nombre'
             
     ];

     protected $guarded =[


     ]; 

     public function scopeSearch($query,$searchText)
    {
        if($searchText)
            return $query->where('nombre', 'LIKE',"%$searchText%");
    }
}
