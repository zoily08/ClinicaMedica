<?php

namespace ClinicaMedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_p'=>'required|unique:paciente|max:100',
            'apellido_p'=>'required|max:45',
            'edad_p'=>'max:45',
            'genero_p'=>'required|max:30',
            'fechanacimiento_p'=>'max:50',
            'direccion_p'=>'max:70',
            //'nombre_padre_p'=>'required|max:100',
            //'nombre_madre_p'=>'required|max:100',
            //'nombre_conyuge_p'=>'max:100',
            'nombre_responsable_p'=>'required|max:100'
            //'telefono_p'=>'required|max:15'
        ];
    }
}
