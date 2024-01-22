<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTinTucRequest extends FormRequest
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
            'anh_dai_dien' =>'required',
            'tieu_de'=>'required',
            'noi_dung'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'anh_dai_dien.required' =>'Bạn cần chọn ảnh.',
            'tieu_de.required'=>'Bạn cần nhập tiêu đề',
            'noi_dung.required'=>'Bạn cần nhập nội dung.',
        ];
    }
}
