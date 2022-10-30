<?php

namespace App\Modules\Colors\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{

    public function setProduct(int $productId): self
    {
        return $this->state(function () use ($productId) {
            return[
                'product_id' => $productId,
            ];
        });
    }
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,

        ];
    }
}

