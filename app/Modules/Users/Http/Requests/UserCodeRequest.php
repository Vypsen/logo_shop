<?php

namespace App\Modules\Users\Http\Requests;

use App\Modules\Products\Enums\ProductSortType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserCodeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_code' => ['required'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
