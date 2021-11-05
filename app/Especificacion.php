<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Especificacion extends Model
{
    protected $table= 'especificacion';

     protected $primaryKey='idespecificacion';

     public $timestamps=false;

     protected $fillable =[
     	'estado_espe'  
     ];    


     protected $guarded =[  
  

     ];  

      public function scopeSearch($query,$searchText)
    {
        if($searchText)
            return $query->where('estado_espe', 'LIKE',"%$searchText%");
    }
}
