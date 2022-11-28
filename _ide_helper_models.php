<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \App\Modules\Users\Database\factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Entities\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Entities\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Entities\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Entities\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Entities\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Entities\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Entities\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Entities\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Entities\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Entities\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modules\Users\Entities\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Modules\Products\Entities{
/**
 * App\Modules\Products\Entities\Brand
 *
 * @property int $id
 * @property string $brand_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Products\Entities\Product[] $products
 * @property-read int|null $products_count
 * @method static \App\Modules\Products\Database\factories\BrandFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 */
	class Brand extends \Eloquent {}
}

namespace App\Modules\Products\Entities{
/**
 * App\Modules\Colors\Entities\Color
 *
 * @property int $id
 * @property string $color_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \App\Modules\Products\Database\factories\ColorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereColorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Products\Entities\Product[] $product
 * @property-read int|null $product_count
 */
	class Color extends \Eloquent {}
}

namespace App\Modules\Products\Entities{
/**
 * App\Modules\Products\Entities\Image
 *
 * @property int $id
 * @property string $path
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Modules\Products\Entities\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProducts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProducts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProducts query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProducts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProducts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProducts wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProducts whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageProducts whereUpdatedAt($value)
 */
	class Image extends \Eloquent {}
}

namespace App\Modules\Products\Entities{
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
 * @property int $brand_id
 * @property int $category_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Products\Entities\ProductAttributeValue[] $attributeValues
 * @property-read int|null $attribute_values_count
 * @property-read \App\Modules\Products\Entities\Brand $brand
 * @property-read \App\Modules\Products\Entities\ProductCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Products\Entities\ImageProducts[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Products\Entities\ProductAttributeValue[] $sortedAttributeValues
 * @property-read int|null $sorted_attribute_values_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Modules\Products\Entities{
/**
 * App\Modules\Products\Entities\ProductAttribute
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \App\Modules\Products\Database\factories\ProductAttributesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereUpdatedAt($value)
 */
	class ProductAttribute extends \Eloquent {}
}

namespace App\Modules\Products\Entities{
/**
 * App\Modules\Products\Entities\ProductAttributeValue
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $value
 * @property int $product_id
 * @property int $product_attribute_id
 * @property-read \App\Modules\Products\Entities\ProductAttribute|null $attribute
 * @property-read \App\Modules\Products\Entities\Product $product
 * @method static \App\Modules\Products\Database\factories\ProductAttributeValuesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValue whereProductAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValue whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValue whereValue($value)
 */
	class ProductAttributeValue extends \Eloquent {}
}

namespace App\Modules\Products\Entities{
/**
 * App\Modules\Products\Entities\ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $parent_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Products\Entities\Product[] $products
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
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Modules\Products\Entities{
/**
 * App\Modules\Sizes\Entities\Size
 *
 * @property int $id
 * @property string $size_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \App\Modules\Products\Database\factories\SizeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Size newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size query()
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereSizeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Products\Entities\Product[] $products
 * @property-read int|null $products_count
 */
	class Size extends \Eloquent {}
}

