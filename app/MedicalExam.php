<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class MedicalExam extends Model
{
    protected $fillable =['id','name','price','status','inputs','type'];
    protected $hidden =[];

    protected $cast =[
        'price' => 'double'
    ];

    protected $appends = ['code'];

    public function getCodeAttribute()
    {
        $letters ='';
        $words = explode(' ', $this->attributes['name']);
        if (count($words) > 1) {
            for($i =0 ; $i < 2; $i ++){
               $letters .= strtoupper($words[$i][0]); 
            };
        }else{
            $letters = strtoupper($words[0][0].$words[0][0]);
        }
        $correlative = str_pad($this->areas()->where('medical_exam_id',$this->attributes['id'])->first()->pivot->correlative,2,'0',STR_PAD_LEFT);
        return "$letters$correlative";
    }


    public function scopeSearch($query, $searchText)
    {
        if($searchText)
            return $query->where('name', 'LIKE',"%$searchText%");
    }

    public function areas()
    {
        return $this->belongsToMany('ClinicaMedica\Area')->withPivot('correlative');
    }

    public function orders()
    {
        return $this->belongsToMany('ClinicaMedica\Order','medical_exam_orders');
    }
}
