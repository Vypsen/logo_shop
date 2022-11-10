<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\ProductAttribute;
use App\Modules\Products\Entities\Size;
use App\Modules\Products\Enums\ProductAttributeType;
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
        ProductAttribute::factory(random_int(3, 10))->create();
    }
}
