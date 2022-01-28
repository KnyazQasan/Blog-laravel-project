<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestActiveSubs extends FormRequest
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
            'email' => 'required||email',
            'code' => 'required||min:10000||max:99999||integer'
        ];
    }
    public function messages()
    {
        return[
            'email.required' => 'Emaili daxil edin',
            'email.email' => 'Emaili düzgün daxil edin',
            'code.required' => 'Kodu daxil edin',
            'code.integer' => 'Kodu düzgün daxil edin',
            'code.min' => '5 reqemli kodu daxil edin',
            'code.max' => '5 reqemli kodu daxil edin'
            

        ];
    }
}
