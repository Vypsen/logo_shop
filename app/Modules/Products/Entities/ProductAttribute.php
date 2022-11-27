<?php

namespace App\Modules\Products\Entities;

use App\Modules\Products\Database\factories\ProductAttributesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @mixin \Eloquent
 */
class ProductAttribute extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return ProductAttributesFactory::new();
    }
}
