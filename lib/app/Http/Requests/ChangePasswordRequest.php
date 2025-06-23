<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required'=>'Mật khẩu hiện tại là trường bắt buộc',
            'new_password.required'=>'Mật khẩu mới là trường bắt buộc',
            'new_password.min'=>'Mật khẩu mới tối thiểu 6 kí tự',
            'new_password_confirmation.required'=>'Nhập lại mật khẩu mới là trường bắt buộc',
            'new_password_confirmation.min'=>'Nhập lại mật khẩu mới tối thiểu 6 kí tự',
            'new_password.confirmed'=>'Mật khẩu mới không khớp với nhau',
        ];
    }
}
