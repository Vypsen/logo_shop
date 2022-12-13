<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\Color;
use Illuminate\Database\Seeder;

class ColorsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::query()->delete();
        Color::factory(random_int(4, 10))->create();
    }
}
