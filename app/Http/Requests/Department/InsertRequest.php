<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;

class InsertRequest extends FormRequest
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
            'nameDepartment'=> 'required|min:6|unique:departments,name'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Không được để trống name',
            'min'=>'Tên phòng không hợp lệ!',
            'unique'=>'Tên Phòng Đã Tồn Tại'
        ];
    }
}
