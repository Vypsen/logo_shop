<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\ImageCategory;
use App\Modules\Products\Entities\ImageProducts;
use App\Modules\Products\Entities\Product;
use App\Modules\Products\Entities\ProductCategory;
use App\Modules\Users\Entities\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class ImageCategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Generator $faker */
        $faker = app(Generator::class);

        ImageCategory::query()->delete();
        ImageCategory::deleteStorageImages();

        $categoriesIds = ProductCategory::query()->get('id');
        $countCategories = $categoriesIds->count();

        for ($i = 0; $i < $countCategories; ++$i) {

            $image = new ImageCategory();
            $image->path = $faker->loremFlickr('categories/images');

            $image->category()->associate($categoriesIds[$i]);
            $image->save();
        }
    }
}
