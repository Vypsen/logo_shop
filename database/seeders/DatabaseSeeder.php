<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Modules\Products\Database\Seeders\BrandsDatabaseSeeder;
use App\Modules\Products\Database\Seeders\ColorsDatabaseSeeder;
use App\Modules\Products\Database\Seeders\ImageDatabaseSeeder;
use App\Modules\Products\Database\Seeders\ProductsDatabaseSeeder;
use App\Modules\Products\Database\Seeders\SizesDatabaseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ColorsDatabaseSeeder::class,
            BrandsDatabaseSeeder::class,
            SizesDatabaseSeeder::class,
            ProductsDatabaseSeeder::class,
            ImageDatabaseSeeder::class,
        ]);
    }
}
