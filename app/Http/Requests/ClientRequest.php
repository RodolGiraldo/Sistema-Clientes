<?php

namespace App\Http\Requests;
use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ClientRequest extends FormRequest
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
            'idnumber' => 'required|integer|unique:clients,IdNumber|digits_between:0,10',
            'firstname' => 'required|regex:/^[a-zA-Z\s]+$/u',
            'lastname' => 'required|regex:/^[a-zA-Z\s]+$/u',
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
            'idnumber.digits_between' => 'El campo Id Number no puede ser negativo',
            'idnumber.integer' => 'El campo Id Number solo recibe datos numericos.',
            'idnumber.unique' => 'El Id Number ya existe.',
            'firstname.required' => 'El campo First Name no puede estar vacio.',
            'firstname.regex' => 'El campo First Name no acepta numeros ni caracteres especiales',
            'lastname.required' => 'El campo Last Name no puede estar vacio.',
            'lastname.regex' => 'El campo Last Name no acepta numeros ni caracteres especiales',
            'email.required' => 'El campo Email no puede estar vacio.',
            'email.email' => 'El campo Email no es un correo electronico valido',
            'phonenumber.required' => 'El campo Phone Number no puede estar vacio.',
            'phonenumber.integer' => 'El campo Phone Number tiene que ser numerico.',
            'address.required' => 'El campo Address no puede estar vacio.',
            'gender.required' => 'El campo Gender no puede ser Seleccionar.'
        ];
    }
}
