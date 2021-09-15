<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $table= 'enfermedad';

     protected $primaryKey='idenfermedad';

     public $timestamps=false;

     protected $fillable =[
        'enfermedad'
     ];

     protected $guarded =[


     ]; 


      public function scopeSearch($query,$searchText)
    {
        if($searchText)
            return $query->where('enfermedad', 'LIKE',"%$searchText%");
    }
}
