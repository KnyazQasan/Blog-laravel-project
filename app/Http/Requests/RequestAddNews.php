<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAddNews extends FormRequest
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
            'caption'=>'required|max:255',
            'author_id'=>'required',
            'category_id'=>'required',
            'h_view'=>'nullable',
            'c_view'=>'nullable',
            'text'=>'required',
            'image'=>'required|image',
            'mintext'=>'required'
        ];
    }
}
