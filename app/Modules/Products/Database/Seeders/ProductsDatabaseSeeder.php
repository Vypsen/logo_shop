<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\Product;
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
        Product::factory(random_int(50, 80))->create();
    }
}
