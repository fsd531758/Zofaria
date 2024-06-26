<?php

namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'userId' => 'required|integer',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'address' => 'required|string',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = failureResponse($validator->errors(), __("message.something_wrong"), 400);
        throw new ValidationException($validator, $response);
    }
}
