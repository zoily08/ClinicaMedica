<?php

namespace ClinicaMedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        'name' => ['string', 'max:255','unique:users'],
        'apellidos' => ['string', 'max:255'], 
        'direccion' => ['string', 'max:255'],
        'fechanacimiento'=> ['string', 'max:100'],
        'edad'=> ['string', 'max:100'],
        'telefono' => ['string', 'max:255'],
        'estado' => ['string', 'max:255'],
        'email' => ['string', 'email', 'max:255', 
        'unique:users'],
         'password' => ['string', 'min:6', 'confirmed'],
        
         
        ];
    }
}
