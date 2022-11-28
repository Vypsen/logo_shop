<?php

namespace App\Modules\Products\Entities;

use App\Modules\Products\Database\factories\ProductCategoryFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Modules\Products\Entities\ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $parent_id
 * @property-read Collection|ProductCategory[] $children
 * @property-read int|null $children_count
 * @property-read Collection|\App\Modules\Products\Entities\Product[] $products
 * @property-read int|null $products_count
 * @method static \App\Modules\Products\Database\factories\ProductCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @mixin \Eloquent
 * @property-read Collection|\App\Modules\Products\Entities\ImageCategory[] $images
 * @property-read int|null $images_count
 */
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

    public function images(): HasMany
    {
        return $this->hasMany(ImageCategory::class, 'category_id');
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
