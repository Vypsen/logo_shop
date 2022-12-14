<?php

namespace App\Modules\Products\Transformers;

use App\Modules\Products\Entities\Product;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Product */
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
            'category' => CategoryResource::make($this->category),
            'attribute' => AttributeValueResource::collection($this->sortedAttributeValues),
            'colors' => ColorResource::collection($this->colors->unique()),
            'sizes' => SizeResource::collection($this->sizes->unique()),
            'images' => ImageResource::collection($this->images),
            'brand' => BrandResource::make($this->brand),
        ];
    }
}
