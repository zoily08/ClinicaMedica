<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable =['id','name','status','date'];
    protected $hidden =['timestamps'];

    public function exams()
    {
        return $this->belongsToMany('ClinicaMedica\MedicalExam')->withPivot('correlative');;
    }

    public function scopeSearch($query,$searchText)
    {
        if($searchText)
            return $query->where('name', 'LIKE',"%$searchText%");
    }
} 
