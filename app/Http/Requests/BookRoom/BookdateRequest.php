<?php

namespace App\Http\Requests\BookRoom;

use Illuminate\Foundation\Http\FormRequest;

class BookdateRequest extends FormRequest
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
            'datebook'=>'required|date',
            'hourbook'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'date'=>'Hãy chọn đúng ngày',
            'hourbook.required'=>'Hãy chon giờ họp',
            'datebook.required'=>'Hãy chon ngày họp'
        ];
    }
}
