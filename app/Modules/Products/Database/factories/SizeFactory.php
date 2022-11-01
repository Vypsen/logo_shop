<?php

namespace App\Modules\Products\Database\factories;

use App\Modules\Products\Entities\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

class SizeFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Size::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'size_name' => $this->faker->word,
        ];
    }
}

