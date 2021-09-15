<?php

namespace ClinicaMedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TratamientoFormRequest extends FormRequest
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
            'nombre_tratamiento'=>'max:100', 
            'tipo_tratamiento'=>'max:100',
            'otros'=>'max:120'
        ];
    }
}
