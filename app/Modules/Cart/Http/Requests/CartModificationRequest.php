<?php

namespace App\Modules\Cart\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CartModificationRequest extends FormRequest
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
            'modifications' => 'required|array|min:1',
            'modifications.*.product_id' => 'required|int|exists:products,id',
            'modifications.*.color_id' => 'required|int|exists:colors,id',
            'modifications.*.size_id' => 'required|int|exists:sizes,id',
            'modifications.*.quantity' => 'required|int|min:0|max:99',
        ];
    }
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = response()->json([
            'message' => $errors->messages(),
        ], 422);

        throw new HttpResponseException($response);
    }
}
