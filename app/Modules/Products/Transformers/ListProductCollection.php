<?php

namespace App\Modules\Products\Transformers;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;


class ListProductCollection  extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }

    public function additional(array $data)
    {
        $this->additional = [
            'filters' => $data[0],
            'categories' => CategoryResource::collection($data[1]),
        ];

        return $this;
    }
}

