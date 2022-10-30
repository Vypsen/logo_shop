<?php

namespace App\Modules\Colors\Database\Seeders;

use App\Modules\Colors\Entities\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
        Color::factory(random_int(20, 30))->create();
    }
}
