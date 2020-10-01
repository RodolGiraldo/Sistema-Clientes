<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            'idnumber' => 'required|integer',
            'firstname' => 'required|regex:/^([A-Z][a-zñáéíóú]+[\s]*)+$/',
            'lastname' => 'required|regex:/^([A-Z][a-zñáéíóú]+[\s]*)+$/',
            'email' => 'required|email',
            'phonenumber' => 'required|integer',
            'address' => 'required',
            'gender' => 'required',
            'documenttype' => 'required'
        ];
    }

    public function messages(){
        return[
            'documenttype.required' => 'El campo Document Type no puede ser Seleccionar.',
            'idnumber.required' => 'El campo Id Number no puede estar vacio.',
            'idnumber.integer' => 'El campo Id Number solo recibe datos numericos.',
            'firstname.required' => 'El campo First Name no puede estar vacio.',
            'firstname.regex' => 'El campo First Name debe contener mas de un caracte y no puede contener numeros',
            'lastname.required' => 'El campo Last Name no puede estar vacio.',
            'lastname.regex' => 'El campo Last Name debe contener mas de un caracte y no puede contener numeros',
            'email.required' => 'El campo Email no puede estar vacio.',
            'email.email' => 'El campo Email no es un correo electronico valido',
            'phonenumber.required' => 'El campo Phone Number no puede estar vacio.',
            'phonenumber.integer' => 'El campo Phone Number tiene que ser numerico.',
            'address.required' => 'El campo Address no puede estar vacio.',
            'gender.required' => 'El campo Gender no puede ser Seleccionar.'
        ];
    }
}
