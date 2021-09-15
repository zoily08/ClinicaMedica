<?php

namespace ClinicaMedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
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
            'nombre_empresa'=>'required|max:100',
            'registro_sanitario'=>'required|max:100',
            'nombre_p'=>'required|max:100',
            'direccion_p'=>'max:50',
            'telefono_p'=>'max:15',
            'fecha_registro_p'=>'required|max:50',
            'detalle_baja'=>'max:100' 
        ];
    }
}
