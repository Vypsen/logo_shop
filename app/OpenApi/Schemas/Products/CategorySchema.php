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

class CategorySchema extends SchemaFactory implements Reusable
{
    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    public function build(): SchemaContract
    {
        return Schema::object('Category')
            ->properties(
                Schema::string('id')->default(null),
                Schema::string('name')->default(null),
                Schema::string('slug')->default(null),
                Schema::string('parent_id')->default(null),
                Schema::object('image')->properties(
                        Schema::string('id'),
                        Schema::string('path')
                ),
            );
    }
}
