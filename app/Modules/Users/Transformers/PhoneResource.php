<?php

namespace App\Modules\Users\Transformers;

use App\Modules\Users\Entities\PhoneNumber;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin PhoneNumber */
class PhoneResource extends JsonResource
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
            'number' => $this->number,
        ];
    }
}
