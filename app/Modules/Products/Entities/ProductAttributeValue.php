<?php

namespace App\Modules\Products\Entities;

use App\Modules\Products\Database\factories\ProductAttributeValuesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ProductAttributeValue extends Model
{
    use HasFactory;

    protected $table = 'product_attribute_values';

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class);
    }

    protected static function newFactory()
    {
        return ProductAttributeValuesFactory::new();
    }
}
