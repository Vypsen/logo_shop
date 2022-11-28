<?php

namespace App\Modules\Products\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;


/**
 * App\Modules\Products\Entities\ImageCategory
 *
 * @property int $id
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $category_id
 * @property-read \App\Modules\Products\Entities\ProductCategory|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCategory wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImageCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ImageCategory extends Model
{
    use HasFactory;

    protected $table = 'categories_images';

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public static function deleteStorageImages()
    {
        $files = Storage::allFiles('public/categories/image');
        Storage::delete($files);
    }

}
