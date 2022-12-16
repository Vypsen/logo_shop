<?php

namespace App\Modules\Cart\Transformers;

use App\Modules\Cart\Entities\CartItem;
use App\Modules\Products\Transformers\ColorResource;
use App\Modules\Products\Transformers\FullInfoProductResource;
use App\Modules\Products\Transformers\PreviewProductResource;
use App\Modules\Products\Transformers\SizeResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin CartItem
 */
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
            'product' => PreviewProductResource::make($this->product),
            'color' => ColorResource::make($this->color),
            'size' => SizeResource::make($this->size),
            'quantity' => $this->quantity,
            'price_item' => $this->price_item,
            'price_total' => $this->price_total,
            'item_sale' => $this->item_sale,
            'total_sale' => $this->total_sale,
        ];
    }
}
