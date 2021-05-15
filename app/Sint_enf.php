<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Sint_enf extends Model
{
    protected $table= 'sint_enf';

     protected $primaryKey='idsint_enf';

     public $timestamps=false;

     protected $fillable =[
     	'idsint_enf',
     	'idsintomas',
     	'idenfermedad'  
     ];    

     public static function enfermedad ($id){
        return Sint_enf::where('idsintomas','=',$id)
        ->get(); 
     }

     protected $guarded =[  
  

     ]; 

      public function scopeSearch($query,$searchText)
    {
        if($searchText)
            return $query->where('idsint_enf', 'LIKE',"%$searchText%");
    }
}
 