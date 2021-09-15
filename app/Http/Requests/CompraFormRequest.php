<?php

namespace ClinicaMedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraFormRequest extends FormRequest
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
            
            'num_comprobante'=>'required|max:7',
            'cantidad'=>'required',
            'precio_compra'=>'required',
            'impuesto'=>'max:20',
            'fecha_vencimiento'=>'max:50'

     
        ];
    }
}
