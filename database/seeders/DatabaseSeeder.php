<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Modules\Products\Database\factories\ProductAttributesFactory;
use App\Modules\Products\Database\Seeders\BrandsDatabaseSeeder;
use App\Modules\Products\Database\Seeders\ColorsDatabaseSeeder;
use App\Modules\Products\Database\Seeders\ImageDatabaseSeeder;
use App\Modules\Products\Database\Seeders\ProductAttributesSeeder;
use App\Modules\Products\Database\Seeders\ProductAttributeValuesSeeder;
use App\Modules\Products\Database\Seeders\ProductCategorySeeder;
use App\Modules\Products\Database\Seeders\ProductsDatabaseSeeder;
use App\Modules\Products\Database\Seeders\SizesDatabaseSeeder;
use App\Modules\Products\Entities\ProductCategory;
use App\Modules\Users\Database\Seeders\PhoneNumberDatabaseSeeder;
use App\Modules\Users\Database\Seeders\UsersDatabaseSeeder;
use Faker\Provider\en_PH\PhoneNumber;
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
//            ColorsDatabaseSeeder::class,
//            BrandsDatabaseSeeder::class,
//            SizesDatabaseSeeder::class,
//            ProductCategorySeeder::class,
//            ProductAttributesSeeder::class,
//            ProductsDatabaseSeeder::class,
//            ProductAttributeValuesSeeder::class,
//            ImageDatabaseSeeder::class,
            UsersDatabaseSeeder::class,
            PhoneNumberDatabaseSeeder::class,
        ]);
    }
}
