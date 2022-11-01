<?php

namespace App\Modules\Products\Entities;

use App\Modules\Products\Database\factories\ColorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 */
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
