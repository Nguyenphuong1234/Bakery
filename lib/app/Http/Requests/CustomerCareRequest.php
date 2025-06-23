<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCareRequest extends FormRequest
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
            'phone_number' => 'required | numeric',
            'question' => 'required | max:255',
        ];
    }

    public function messages()
    {
        return [
            'phone_number.required'=>'Số điện thoại là trường bắt buộc',
            'phone_number.numeric'=>'Số điện thoại chỉ nhập số',
            'question.required'=>'Câu hỏi là trường bắt buộc',
            'question.required'=>'Câu hỏi tối đa 255 kí tự',
        ];
    }
}
