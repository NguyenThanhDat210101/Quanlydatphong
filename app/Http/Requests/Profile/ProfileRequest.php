<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'nameProfile'=>'required|min:6',
            'phoneProfile'=>'required|max:10|regex:/(0)[0-9]{9}/'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Không được để trống',
            'regex'=>'Nhập đúng số điện thoại',
            'min'=>'Nhập đầy đủ họ tên',
            'max'=>'Nhập đúng số điện thoại'
        ];
    }
}
