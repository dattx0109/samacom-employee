<?php
/**
 * Created by PhpStorm.
 * User: thanhvuminh
 * Date: 9/19/19
 * Time: 5:07 PM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class changePasswordRequest extends FormRequest
{
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
            'password' => 'required|min:6',
            'password_confirm' => 'required|min:6|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required'         => 'Không để trống trường này',
            'password.min'              => 'Mật khẩu tối thiểu 6 kí tự',
            'password_confirm.required' => 'Không để trống trường này',
            'password_confirm.min'      => 'Mật khẩu tối thiểu 6 kí tự',
            'password_confirm.same'     => 'Mật khẩu xác nhận phải giống với mật khẩu mới',
        ];
    }
}
