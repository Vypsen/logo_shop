<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\ProductAttribute;
use Illuminate\Database\Seeder;

class ProductAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductAttribute::query()->delete();
        ProductAttribute::factory(random_int(3, 7))->create();
    }
}
