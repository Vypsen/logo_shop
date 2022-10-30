<?php

namespace App\Modules\Products\Database\factories;

use App\Modules\Colors\Entities\Color;
use App\Modules\Sizes\Entities\Size;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;


class ProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     *  @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->realText(),
            'price' => $this->faker->randomFloat(8, 10, 1000000),
            'discount_price' => $this->faker->randomFloat(8, 10, 1000000),
            'is_sale' => $this->faker->boolean(),
            'is_new' => $this->faker->boolean(),
        ];
    }
}

