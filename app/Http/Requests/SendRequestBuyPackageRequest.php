<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendRequestBuyPackageRequest extends FormRequest
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
           'count'=>'required|integer|min:1|max:10',
           'id'=>'required'
        ];
    }

    public function messages()
    {
        return [
        'count.required'=>'Số lượng không được để trống',
        'count.integer'=>'Không đúng định dạng ',
        'count.min'=>'Số lượng ít nhất bằng 1 ',
        'count.max'=>'Số lượng ít nhất bằng 1 ',
        'id.required'=>'Không để trống trường này ',
        ];
    }
}
