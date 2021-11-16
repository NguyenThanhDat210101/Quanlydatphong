<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'emailRegister'=> 'required|email|unique:app__users,email',
            'departmentRegister'=>'required',
            'configPasswordRegister'=>'required|min:6',
            'passwordRegister'=>'required|min:6',
            'cmndRegister'=>'required|min:9|max:10|unique:app__users,cmnd',
            'phoneRegister'=>'max:10|regex:/(0)[0-9]{9}/',
            'nameRegister'=> 'required|min:6',
            'photoRegister'=>''
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Không được để trống',
            'emailRegister.email'=>'Hãy nhập đúng Email',
            'emailRegister.unique'=>'Email này đã được sử dụng',
            'cmndRegister.max'=>'Nhập đúng số CMND/SCCCD',
            'nameRegister.min' =>'Nhập đúng tên',
            'passwordRegister.min'=>'Password ít nhất 6 kí tự',
            'configPasswordRegister.min'=>'ConfigPassword ít nhất 6 kí tự',
            'phoneRegister.regex'=>'Nhập đúng số điện thoại',
            'phoneRegister.max'=>'Nhập đúng số điện thoại',
            'cmndRegister.min'=>'CMND/SCCCD không đúng',
            'cmndRegister.unique'=>'CMND/SCCCD đã tồn tại',
        ];
    }

}
