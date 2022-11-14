<?php

namespace App\Modules\Products\Http\Requests;

use App\Modules\Products\Enums\ProductSortType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CatalogRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_slug' => ['nullable'],
            'search_query' => ['nullable'],
            'sort_mode' => ['nullable', Rule::in([ProductSortType::PRICE_ASC, ProductSortType::PRICE_DESC])],
            'filters' => ['nullable', 'array'],
            'filters.*' => ['nullable', 'array'],
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
