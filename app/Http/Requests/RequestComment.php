<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestComment extends FormRequest
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
            'news'=>'required||integer',
            'name' => 'required||string||max:255',
            'email' => 'required||email',
            'comment' => 'required||string'
        ];
    }
    public function messages()
    {
        return[
            'news.required'=> 'Console ile oynama :DDDD!',
            'name.required'=>'Adı daxil edin.',
            'name.string'=>'Adı düzgün daxil edin.',
            'name.max'=>'Ad maksimum 255 simvoldan ibarət olsun.',
            'email.required'=>'Emaili daxil edin.',
            'email.email'=>'Emaili düzgün daxil edin.',
            'comment.required'=>'Rəyi daxil edin.',
            'comment.string'=>'Reyi düzgün daxil edin.'
        ];
    }
}
