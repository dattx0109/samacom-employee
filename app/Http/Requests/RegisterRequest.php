<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'             => 'required|max:50',
            'email'            => 'required|email|max:50',
            'phone'            => 'required|min:10',
            'password'         => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'Email không được để trống',
            'name.required'=>'Họ tên không được để trống',
            'phone.required'=>'Số điện thoại không được để trống',
            'email.email'=>'Định dạng email không đúng',
            'password.required'=>'Mật khẩu không được để trống',
            'phone.min'=>'Số điện thoại phải nhiều hơn 10 số',
            'password.min'=>'Mật khẩu phải nhiều hơn 6 kí tự',
            'confirm_password.required'=>'Mật khẩu không được để trống',
            'confirm_password.min'=>'Mật khẩu phải nhiều hơn 6 kí tự',
            'confirm_password.same'=>'Mật khẩu phải trùng nhau',
        ];
    }
}
