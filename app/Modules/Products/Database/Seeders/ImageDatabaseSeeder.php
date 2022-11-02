<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\Color;
use App\Modules\Products\Entities\Image;
use App\Modules\Products\Entities\Product;
use Faker\Generator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;

class ImageDatabaseSeeder extends Seeder
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

        Image::query()->delete();
        Image::deleteStorageImages();

        for ($i = 0; $i < random_int(50, 80); ++$i) {

            $image = new Image();
            $image->path = $faker->loremFlickr('products/images');

            $product = Product::inRandomOrder()->first();
            $product->images()->save($image);
            $image->save();
        }

    }

}
