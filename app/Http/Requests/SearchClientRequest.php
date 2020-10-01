<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchClientRequest extends FormRequest
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
            'idnumber' => 'required|integer'
        ];
    }
    
    public function messages(){
        return[
            'idnumber.required' => 'El campo Id Number no puede estar vacio.',
            'idnumber.integer' => 'El campo Id Number solo recibe datos numericos.'
        ];
    }
}
