<?php

namespace App\Modules\Products\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';


    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public static function deleteStorageImages()
    {
        $files = Storage::allFiles('public/products/image');
        Storage::delete($files);
    }

}
