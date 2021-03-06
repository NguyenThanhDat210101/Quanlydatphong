<?php

namespace App\Http\Requests\BookRoom;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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

            'meetRoom'=>'required|min:1|'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Hãy chọn phòng họp bạn cần',

        ];
    }
}
