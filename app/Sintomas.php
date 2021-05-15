<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Sintomas extends Model
{
    protected $table= 'sintomas';

     protected $primaryKey='idsintomas';

     public $timestamps=false;

     protected $fillable =[
     	'nombre_sintomas'  
     ];    


     protected $guarded =[  
  

     ];  

      public function scopeSearch($query,$searchText)
    {
        if($searchText)
            return $query->where('nombre_sintomas', 'LIKE',"%$searchText%");
    }
} 
       