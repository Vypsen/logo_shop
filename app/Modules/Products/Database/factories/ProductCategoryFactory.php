<?php

namespace App\Modules\Products\Database\factories;

use App\Modules\Products\Entities\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }

    public function child(int $parentId): self
    {
        return $this->state(function () use ($parentId){
            return [
                'parent_id' => $parentId
            ];
        });
    }
}

