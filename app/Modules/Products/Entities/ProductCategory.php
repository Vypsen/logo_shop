<?php

namespace App\Modules\Products\Entities;

use App\Modules\Products\Database\factories\ProductCategoryFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Exception;

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
        return $this->hasMany(Product::class, 'category_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public static function getTreeProductBuilder(Collection $categories)
    {
        if ($categories->isEmpty()) {
            throw new Exception('categories collection is empty');
        }

        $categoryIds = [];

        $collectCategoryIds =
            function(ProductCategory $category) use (&$categoryIds, &$collectCategoryIds)
            {
                $categoryIds[] = $category->id;
                foreach ($category->children as $childCategory){
                    $collectCategoryIds($childCategory);
                }
            };

        foreach ($categories as $category){
            $collectCategoryIds($category);
        }

        return Product::query()->whereIn('category_id', $categoryIds);
    }

    protected static function newFactory()
    {
        return ProductCategoryFactory::new();
    }


}
