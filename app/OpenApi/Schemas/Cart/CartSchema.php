<?php

namespace App\OpenApi\Schemas\Cart;

use App\OpenApi\Schemas\Products\PreviewProductSchema;
use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AllOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AnyOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Not;
use GoldSpecDigital\ObjectOrientedOAS\Objects\OneOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;

class CartSchema extends SchemaFactory implements Reusable
{
    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    public function build(): SchemaContract
    {
        return Schema::object('Cart')
            ->properties(
                Schema::array('items')->items(Schema::object()->properties(
                    PreviewProductSchema::ref('product'),

                    Schema::object('color')->properties(
                        Schema::string('id'),
                        Schema::string('color_name')
                    ),
                    Schema::object('size')->properties(
                        Schema::string('id'),
                        Schema::string('size_name')
                    ),
                    Schema::integer('quantity'),
                    Schema::number('price_item')->format('double'),
                    Schema::number('price_total')->format('double'),
                    Schema::number('item_sale')->format('double'),
                    Schema::number('total_sale')->format('double'),

                )),
                Schema::number('price_total')->format('double'),
                Schema::number('total_sale')->format('double'),
                Schema::number('total_sum')->format('double'),
                Schema::number('total_quantity')->format('double'),
            );
    }
}
