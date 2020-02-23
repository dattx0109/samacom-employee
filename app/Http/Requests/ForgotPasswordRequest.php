<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ForgotPasswordRequest extends FormRequest
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

            'email'         =>['required','regex:/^(([^<>()\[\]\\\\.,;:\s@"]+(\.[^<>()\[\]\\\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],

        ];
    }
    public function messages()
    {
        return [
            'email.required'         =>'Không để trống trường này.',
            'email.regex'            =>'Định dạng email không đúng.',
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $errors = $validator->errors()->messages();
            if (!empty($errors)) {
                throw new HttpResponseException(response()->json(
                    [
                        'error' => $errors,
                        'status_code' => 422,
                    ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
            }
        });
    }
}
