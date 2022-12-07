<?php

namespace App\Modules\Cart\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'items' => CartItemResource::collection($this->orderedItems),
            'price_total' => $this->price_total,
        ];
    }
}
