<?php

namespace App\Modules\Sizes\Database\Seeders;

use App\Modules\Sizes\Entities\Size;
use Illuminate\Database\Seeder;

class SizesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::query()->delete();
        Size::factory(random_int(3, 10))->create();
    }
}
