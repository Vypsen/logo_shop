<?php

namespace App\Modules\Products\Database\Seeders;

use App\Modules\Products\Entities\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    private const DEPTH = 4;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::query()->delete();
        $this->seedChildren(ProductCategory::factory(random_int(1, 3))->create()->pluck('id'));
    }
    public function seedChildren(iterable $parentIds, int $depth = 1) : void
    {
        if ($depth > self::DEPTH) {
            return;
        }

        foreach ($parentIds as $parentId ){
            $this->seedChildren(
                ProductCategory::factory(random_int(1, 3))->child($parentId)->create()->pluck('id'),
                ++$depth
            );
        }
    }
}
