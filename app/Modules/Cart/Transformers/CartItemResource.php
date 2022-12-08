<?php

namespace App\Modules\Cart\Transformers;

use App\Modules\Products\Transformers\FullInfoProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
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
            'product' => FullInfoProductResource::make($this->product),
            'quantity' => $this->quantity,
            'price_item' => $this->price_item,
            'price_total' => $this->price_total,
        ];
    }
}
