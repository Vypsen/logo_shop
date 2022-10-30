<?php

namespace App\Modules\Sizes\Entities;

use App\Modules\Products\Entities\Product;
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
}
