<?php

namespace App\Modules\Products\Database\factories;

use App\Modules\Products\Entities\ProductAttribute;
use App\Modules\Products\Entities\ProductAttributeValue;
use App\Modules\Products\Enums\ProductAttributeType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductAttributeValuesFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductAttributeValue::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [];
    }

    public function setProduct(int $productId): self
    {
        return $this->state(function () use ($productId) {
            return[
                'product_id' => $productId,
            ];
        });
    }

    public function setAttribute(ProductAttribute $attribute): self
    {
        switch ($attribute->type) {
            case ProductAttributeType::STRING:
                $value = $this->faker->realTextBetween(5, 20);
                break;
            case ProductAttributeType::NUMERIC:
                $value = random_int(1, 1000);
                break;
            case ProductAttributeType::BOOLEAN:
                $value = $this->faker->boolean();
                break;
            default:
                $value = '';
                break;
        }

        return $this->state(function () use ($attribute, $value) {
            return[
                'product_attribute_id' => $attribute->id,
                'value' => $value,
            ];
        });

    }
}
