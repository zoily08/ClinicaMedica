<?php

namespace ClinicaMedica;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
	protected $table= 'tratamiento';

	protected $primaryKey='idtratamiento';

	public $timestamps=false;

	protected $fillable =[
          'idpaciente',
     	'nombre_tratamiento',
     	'tipo_tratamiento',
     	'fecharegistro',
     	'iddiagnostico',
          'otros',
     	'estado'
     ];

     protected $guarded =[
     ];
}
