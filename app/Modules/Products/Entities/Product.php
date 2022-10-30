<?php

namespace App\Modules\Products\Entities;

use App\Modules\Colors\Database\factories\ColorFactory;
use App\Modules\Colors\Entities\Color;
use App\Modules\Products\Database\factories\ProductFactory;
use App\Modules\Sizes\Entities\Size;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
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

    public function getColors(): HasMany
    {
        return $this->hasMany(Color::class);
    }

    public function getSizes(): HasMany
    {
        return $this->hasMany(Size::class);
    }

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

}
