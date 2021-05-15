<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id','patient_id','price','discount','status'];

    public function getTotalAttribute()
    {
        return $this->attributes['price'] - ($this->attributes['price'] * ($this->attributes['discount']/100));
    }

    public function patient()
    {
        return $this->belongsTo('ClinicaMedica\Paciente','patient_id','idpaciente');
    }

    public function exams()
    {
        return $this->belongsToMany('ClinicaMedica\MedicalExam','medical_exam_orders');
    }
}
