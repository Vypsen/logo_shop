<?php

namespace App\Modules\Products\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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
 * @mixin \Eloquent
 */
class ImageProducts extends Model
{
    use HasFactory;

    protected $table = 'product_images';


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public static function deleteStorageImages()
    {
        $files = Storage::allFiles('public/products/image');
        Storage::delete($files);
    }

}
