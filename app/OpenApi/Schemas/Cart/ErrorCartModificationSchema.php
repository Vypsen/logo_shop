<?php

namespace App\OpenApi\Schemas\Cart;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AllOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AnyOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Not;
use GoldSpecDigital\ObjectOrientedOAS\Objects\OneOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;

class ErrorCartModificationSchema extends SchemaFactory implements Reusable
{
    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    public function build(): SchemaContract
    {
        return Schema::object('ErrorCartModification')
            ->properties(
                Schema::string('message'),
                Schema::array('details')->items(Schema::object()->properties(
                    Schema::array('modifications')->items(
                        Schema::object()->properties(
                            Schema::integer('product_id')->nullable(),
                            Schema::integer('quantity')->nullable()
                        )
                    )
                ))
            );
    }
}
