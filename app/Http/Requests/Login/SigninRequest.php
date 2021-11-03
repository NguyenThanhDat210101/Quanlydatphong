<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
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
            'emailLogin'=>'required',
            'passwordLogin'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Không được để trống'
        ];
    }
}
