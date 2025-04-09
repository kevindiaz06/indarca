<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422));
    }

    protected function sanitizeInput()
    {
        $input = $this->all();

        array_walk_recursive($input, function(&$item) {
            if (is_string($item)) {
                $item = trim(strip_tags($item));
            }
        });

        $this->replace($input);
    }

    public function prepareForValidation()
    {
        $this->sanitizeInput();
    }
}
