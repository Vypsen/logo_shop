<?php

namespace App\Modules\Cart\Transformers;

use App\Modules\Cart\Entities\Cart;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Cart
 */
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
            'total_sale' => $this->total_sale,
            'total_sum' => $this->total_sum,
            'total_quantity' => $this->total_quantity,
        ];
    }
}
