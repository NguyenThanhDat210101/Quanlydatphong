<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ChangeRequest extends FormRequest
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
            'configpassword'=>'required|min:6',
            'newpassword'=>'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Mật Khẩu Không Hợp Lệ',
            'min'=>'Mật Khẩu Không Hợp Lệ'
        ];
    }
}
