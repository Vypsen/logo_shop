<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\Color;
use App\Modules\Products\Entities\Image;
use App\Modules\Products\Entities\Product;
use App\Modules\Products\Entities\Size;
use Faker\Generator;
use Illuminate\Database\Seeder;

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

        for ($i = 0; $i < random_int(50, 80); ++$i){

            $product = new Product();
            $product->article_number = $faker->unique()->word;
            $product->name = $faker->word;
            $product->description = $faker->realText();
            $product->price = $faker->randomFloat(8, 10, 1000000);
            $product->discount_price = $faker->randomFloat(8, 10, 1000000);
            $product->is_sale = $faker->boolean();
            $product->is_new = $faker->boolean();
            $product->save();

            if($faker->boolean){
                $product
                    ->colors()
                    ->attach($colorsIds->random(random_int(1, count($colorsIds))));
            }
            if($faker->boolean){
                $product
                    ->sizes()
                    ->attach($sizesIds->random(random_int(1, count($sizesIds))));
            }

        }


    }
}
