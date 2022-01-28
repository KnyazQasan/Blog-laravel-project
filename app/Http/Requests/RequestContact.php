<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestContact extends FormRequest
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
            'name' => 'required||string',
            'surname' => 'required||string',
            'email' => 'required||email',
            'message' => 'required||string'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Adınızı daxil edin.',
            'name.string' => 'Adınızı düzgün daxil edin.',
            'surname.required' => 'Soyadınızı daxil edin.',
            'surname.string' => 'Soyadınızı düzgün daxil edin',
            'email.required' => 'Emaili daxil edin.',
            'email.email' => 'Emaili düzgün daxil edin.',
            'message.required' => 'Mesajı daxil edin.',
            'message.string' => 'Mesajı düzgün daxil edin',
        ];
    }
}
