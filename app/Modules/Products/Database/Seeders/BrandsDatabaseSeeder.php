<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\Brand;
use Illuminate\Database\Seeder;

class BrandsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::query()->delete();
        Brand::factory(random_int(10, 15))->create();
    }
}
