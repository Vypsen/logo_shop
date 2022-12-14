<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\Brand;
use App\Modules\Products\Entities\Color;
use App\Modules\Products\Entities\Product;
use App\Modules\Products\Entities\ProductCategory;
use App\Modules\Products\Entities\Size;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()->delete();

        /** @var Generator $faker */
        $faker = app(Generator::class);

        $colorsIds = Color::query()->get('id');
        $sizesIds = Size::query()->get('id');

        for ($i = 0; $i < random_int(20, 50); ++$i){

            $product = new Product();
            $product->article_number = $faker->unique()->word;
            $product->name = $faker->word;
            $product->name_on_site = $product->name;
            $product->description = $faker->realText();
            $product->price = $faker->randomFloat(2, 10, 1000000);
            $product->discount_price = $product->price - $faker->randomFloat(2, 100, 100000);
            $product->is_sale = $faker->boolean();
            $product->is_new = $faker->boolean();
            $product->is_show = $faker->boolean(80);
            $product->is_fitting = $faker->boolean(80);

            $category = ProductCategory::inRandomOrder()->first();
            $brand = Brand::inRandomOrder()->first();
            $product->brand()->associate($brand);
            $product->category()->associate($category);
            $product->save();

            for ($j = 0; $j < random_int(2, 5); ++$j){
                $product->colors()->save(
                    $colorsIds->random(),
                    array('size_id' => $sizesIds->random()->id,
                        'count_products' => random_int(1, 50)));
            }
        }
    }
}
