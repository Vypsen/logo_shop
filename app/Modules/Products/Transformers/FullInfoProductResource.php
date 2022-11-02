<?php

namespace App\Modules\Products\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class FullInfoProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'article_number' => $this->article_number,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'is_sale' => $this->is_sale,
            'is_new' => $this->is_new,
            'colors' => $this->whenPivotLoaded('products_colors', function (){
                return $this->colors;
            }),
            'sizes' => $this->whenPivotLoaded('products_sizes', function (){
                return $this->sizes;
            }),
        ];
    }
}
