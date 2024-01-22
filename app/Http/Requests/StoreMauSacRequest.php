<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMauSacRequest extends FormRequest
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
//            'ma_mau' => 'unique: mau_sacs',
//            'mau' => 'unique: mau_sacs,mau',
        ];
    }

    public function messages()
    {
        return [
//            'ma_mau.unique' => 'Mã màu đã tồn tại',
//            'mau.unique' => 'Tên màu đã tồn tại',
        ];
    }
}
