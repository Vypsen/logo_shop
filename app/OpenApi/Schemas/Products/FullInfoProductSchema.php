<?php

namespace App\OpenApi\Schemas\Products;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AllOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AnyOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Not;
use GoldSpecDigital\ObjectOrientedOAS\Objects\OneOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;

class FullInfoProductSchema extends SchemaFactory implements Reusable
{
    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    public function build(): SchemaContract
    {
        return Schema::object('FullInfoProduct')
            ->properties(
                Schema::string('id')->default(null),
                Schema::string('article_number')->default(null),
                Schema::string('name')->default(null),
                Schema::string('slug')->default(null),
                Schema::string('description')->default(null),
                Schema::string('price')->default(null),
                Schema::string('discount_price')->default(null),
                Schema::boolean('is_sale')->default(null),
                Schema::boolean('is_new')->default(null),
                CategorySchema::ref('category'),


                Schema::array('attributes')->items(
                    Schema::object()->properties(
                        Schema::string('name'),
                        Schema::string('value')
                    )
                ),
                Schema::array('colors')->items(
                    Schema::object()->properties(
                        Schema::string('id'),
                        Schema::string('color_name')
                    )
                ),
                Schema::array('size')->items(
                    Schema::object()->properties(
                        Schema::string('id'),
                        Schema::string('color_name')
                    )
                ),
                Schema::array('images')->items(
                    Schema::object()->properties(
                        Schema::string('id'),
                        Schema::string('path')
                    )
                ),
                Schema::object('brand')->properties(
                        Schema::string('id'),
                        Schema::string('brand_name')
                ),
            );
    }
}
