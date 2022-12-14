<?php

namespace App\Modules\Products\Transformers;

use App\Modules\Products\Entities\Product;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Product */
class PreviewProductResource extends JsonResource
{
    /**
     *
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'images' => ImageResource::collection($this->images),
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'is_sale' => $this->is_sale,
            'is_new' => $this->is_new,
        ];
    }


}
