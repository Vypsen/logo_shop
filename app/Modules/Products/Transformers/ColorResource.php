<?php

namespace App\Modules\Products\Transformers;

use App\Modules\Products\Entities\Color;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Color */
class ColorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'color_name' => $this->color_name,
            'hex_color' => $this->hex_color,
        ];
    }
}
