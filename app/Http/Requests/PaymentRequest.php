<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'fullName' => 'required',
            'phoneNumber' => 'required|regex:/^[0-9]{10}$/',
            'address'=>'required',
            'payment'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'fullName.required' => 'Không được để họ tên người nhận rỗng.',
            'phoneNumber.required' => 'Không được để số điện thoại rỗng.',
            'address.required' => 'Không được để địa chỉ rỗng.',
            'phoneNumber.regex' => 'Số điện thoại không hợp lệ. Hãy nhập 10 chữ số.',
            'payment.required' => 'Hãy chọn phương thức thanh toán'
        ];
    }
}
