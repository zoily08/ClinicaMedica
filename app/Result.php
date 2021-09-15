<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['id','exam_id','values'];
}
