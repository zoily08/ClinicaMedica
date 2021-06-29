<?php

namespace ClinicaMedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            'codigo_barra'=>'required', 
            'unidad_medida'=>'required|max:100',
            'nombre_producto'=>'required|max:100',
            'imagen'=>'mimes:jpeg,jpg,bmp,png',
            'margen_ganancia'=>'required',
            'indicacion'=>'required',
            'descuento'=>'required',
            'presentacion'=>'required' 
            
        ];
    }
}
