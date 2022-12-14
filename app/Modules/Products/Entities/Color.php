<?php

namespace App\Modules\Products\Entities;

use App\Modules\Products\Database\factories\ColorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
 * @property string|null $hex_color
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereHexColor($value)
 */
class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'size_color_products',
            'color_id',
            'product_id'
        );
    }

    protected static function newFactory()
    {
        return ColorFactory::new();
    }
}
