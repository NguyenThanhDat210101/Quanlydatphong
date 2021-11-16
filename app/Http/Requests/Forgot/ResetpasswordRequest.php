<?php

namespace App\Http\Requests\Forgot;

use Illuminate\Foundation\Http\FormRequest;

class ResetpasswordRequest extends FormRequest
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
            'emailResetPassword'=>'required|email',
            'newpassword'=>'required|min:6',
            'configpassword'=>'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được bỏ trống',
            'min'=>'Mật khẩu phải lớn hơn 6'
        ];
    }
}
