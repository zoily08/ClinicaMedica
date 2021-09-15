<?php

namespace ClinicaMedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaMedicaFormRequest extends FormRequest
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
            
            'observacion'=>'required|max:300',
            'otros'=>'required|max:300',
        ];
    }
}
 