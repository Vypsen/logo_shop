<?php

namespace App\Modules\Sizes\Entities;

use App\Modules\Products\Entities\Product;
use App\Modules\Sizes\Database\factories\SizeFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Size extends Model
{
    use HasFactory;

    public function getProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected static function newFactory()
    {
        return SizeFactory::new();
    }
}
