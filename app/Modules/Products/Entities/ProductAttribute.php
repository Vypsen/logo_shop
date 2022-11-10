<?php

namespace App\Modules\Products\Entities;

use App\Modules\Products\Database\factories\ProductAttributesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return ProductAttributesFactory::new();
    }
}
