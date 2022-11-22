<?php

namespace App\Modules\Products\Entities;

use App\Modules\Products\Enums\ProductSortType;
use App\Modules\Products\Http\Filters\ProductFilters;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Modules\Products\Entities\Product
 *
 * @property int $id
 * @property string $article_number
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property float $price
 * @property float $discount_price
 * @property bool $is_sale
 * @property bool $is_new
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Color[] $colors
 * @property-read int|null $colors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Size[] $sizes
 * @property-read int|null $sizes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereArticleNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @mixin \Eloquent
 */

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

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'products_colors');
    }

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'products_sizes');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function attributeValues(): HasMany
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function sortedAttributeValues(): HasMany
    {
        return $this
            ->attributeValues()
            ->join('product_attributes', 'product_attributes.id', '=', 'product_attribute_values.product_attribute_id')
            ->orderBy('product_attributes.sort_order')
            ->orderBy('product_attributes.id');
    }

    public static function findProducts(array $requestData)
    {
        $categoryName = $requestData['category_name'] ?? null;

        $categoryQuery = ProductCategory::query()
            ->with('children', 'products');
        if ($categoryName === null) {
            $categoryQuery->where('parent_id');
        } else {
            $categoryQuery->where('name', $categoryName);
        }

        $category = $categoryQuery->get();

        $productQuery = ProductCategory::getTreeProductBuilder($category);

        $appliedFilters = $requestData['filters'] ?? [];
        $filters = ProductFilters::build($productQuery);
        $productQuery = ProductFilters::apply($productQuery, $appliedFilters);

        $searchQuery = $requestData['search_query'] ?? null;
        if ($searchQuery) {
            $productQuery->search($searchQuery);
        }

        $articleQuery = $requestData['article_query'] ?? null;
        if ($articleQuery) {
            $productQuery->searchForArticle($articleQuery);
        }

        $sortMode = $requestData['sort_mode'] ?? null;
        if ($sortMode === strval(ProductSortType::PRICE_ASC)) {
            $productQuery->orderBy('price');
        } else if ($sortMode === strval(ProductSortType::PRICE_DESC)) {
            $productQuery->orderBy('price', 'desc');
        }

        $countProducts = $productQuery->count();

        return [
            'product_query' => $productQuery,
            'filters' => $filters,
            'category' => $category,
            'countProducts' => $countProducts,
            'key_params' => [
                'category_name' => $categoryName,
                'article_query' => $articleQuery,
                'search_query' => $searchQuery,
                'filters' => $appliedFilters,
                'sort_mode' => $sortMode
            ]
        ];
    }

    public function scopeSearch(Builder $builder, string $searchQuery): Builder
    {
        return $builder->where('products.name', 'ilike', "%{$searchQuery}%");
    }

    public function scopeSearchForArticle(Builder $builder, string $articleQuery): Builder
    {
        return $builder->where('products.article_number', 'ilike', "%{$articleQuery}%");
    }

}
