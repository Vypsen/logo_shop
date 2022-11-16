<?php

namespace App\Modules\Products\Database\factories;

use App\Modules\Products\Entities\ProductAttribute;
use App\Modules\Products\Enums\ProductAttributeType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductAttributesFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductAttribute::class;

    private $sortOrder = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'type' => $this->faker->randomElement(array_values(ProductAttributeType::getConstants())),
            'sort_order' => $this->sortOrder++,
        ];
    }
}

