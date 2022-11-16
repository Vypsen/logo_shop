<?php

namespace App\Modules\Products\Transformers;

use App\Modules\Products\Entities\Size;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Size */
class SizeResource extends JsonResource
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
            'size_name' => $this->size_name,
        ];
    }
}
