<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\Product;
use App\Modules\Products\Entities\ProductAttribute;
use App\Modules\Products\Entities\ProductAttributeValue;
use App\Modules\Products\Entities\ProductCategory;
use Faker\Generator;
use Illuminate\Database\Seeder;

class ProductAttributeValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductAttributeValue::query()->delete();

        $products = Product::get();
        $attributes = ProductAttribute::get();
        $categoryIds = ProductCategory::pluck('id')->all();

        /** @var Generator $faker */
        $faker = app(Generator::class);
        $attributeIdsByCategoryId = [];

        foreach ($categoryIds as $categoryId) {
            $attributeIdsByCategoryId[$categoryId] = $faker->randomElements($attributes, rand(1,3));
        }

        foreach ($products as $product) {
            foreach ($attributeIdsByCategoryId[$product->category_id] as $attribute) {
                if ($faker->boolean(90)) {
                    ProductAttributeValue::factory()->setProduct($product->id)->setAttribute($attribute)->create();
                }
            }
        }
    }
}
