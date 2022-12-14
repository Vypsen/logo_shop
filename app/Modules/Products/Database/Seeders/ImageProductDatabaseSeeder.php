<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\ImageProducts;
use App\Modules\Products\Entities\Product;
use Faker\Generator;
use Illuminate\Database\Seeder;

class ImageProductDatabaseSeeder extends Seeder
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

        ImageProducts::query()->delete();
        ImageProducts::deleteStorageImages();
        $productIds = Product::query()->get('id');
        $countProducts = $productIds->count();

        for ($i = 0; $i < random_int(50, 70); ++$i) {

            $image = new ImageProducts();
            $image->path = $faker->loremFlickr('products/images');

            $image->product()->associate($productIds[$i%$countProducts]);
            $image->save();
        }

    }

}
