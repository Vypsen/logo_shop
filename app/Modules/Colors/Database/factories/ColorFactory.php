<?php

namespace App\Modules\Colors\Database\factories;

use App\Modules\Colors\Entities\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Color::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'color_name' => $this->faker->colorName,
        ];
    }
}

