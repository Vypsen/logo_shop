<?php

namespace App\Modules\Products\Entities;

use App\Modules\Products\Database\factories\BrandFactory;
use App\Modules\Products\Database\factories\ColorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    protected static function newFactory()
    {
        return BrandFactory::new();
    }
}
