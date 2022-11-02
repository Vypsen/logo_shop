<?php

namespace App\Modules\Products\Database\factories;

use App\Modules\Products\Entities\Brand;
use App\Modules\Products\Entities\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_name' => $this->faker->word,
        ];
    }
}

