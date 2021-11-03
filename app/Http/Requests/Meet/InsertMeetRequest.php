<?php

namespace App\Http\Requests\Meet;

use Illuminate\Foundation\Http\FormRequest;

class InsertMeetRequest extends FormRequest
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
            'image_meet_room'=> '',
            'meetName'=>'required',
            'meetAddress'=>'required|min:10',
            'meetSeats'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'meetName.required'=>'Không được bỏ trống Tên Phòng',
            'meetAddress.required'=>'Không được bỏ trống Địa Chỉ',
            'meetAddress.min'=>'Địa chỉ không hợp lệ',
            'numeric' => 'Hãy nhập số vào đây',
            'meetSeats.required'=> 'Không để trống Số Ghế'
        ];
    }
}
