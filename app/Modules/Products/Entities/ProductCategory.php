<?php

namespace App\Modules\Products\Entities;

use App\Modules\Products\Database\factories\ProductCategoryFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    protected static function newFactory()
    {
        return ProductCategoryFactory::new();
    }
}
