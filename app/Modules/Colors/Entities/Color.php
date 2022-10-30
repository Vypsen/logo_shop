<?php

namespace App\Modules\Colors\Entities;

use App\Modules\Colors\Database\factories\ColorFactory;
use App\Modules\Products\Entities\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';


    public function getProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected static function newFactory()
    {
        return ColorFactory::new();
    }
}
