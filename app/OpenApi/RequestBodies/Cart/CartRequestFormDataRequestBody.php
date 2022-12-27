<?php

namespace App\OpenApi\RequestBodies\Cart;

use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\RequestBodyFactory;

class CartRequestFormDataRequestBody extends RequestBodyFactory
{
    public function build(): RequestBody
    {
        return RequestBody::create()
            ->required()
            ->description('Cart modification')
            ->content(MediaType::json()->schema(
                Schema::object()->properties(
                    Schema::array('modifications')->items(
                        Schema::object()->properties(
                            Schema::integer('product_id'),
                            Schema::integer('color_id'),
                            Schema::integer('size_id'),
                            Schema::integer('quantity')
                        )
                    ),
                    Schema::array('modifications')->items(
                        Schema::object()->properties(
                            Schema::integer('product_id'),
                            Schema::integer('color_id'),
                            Schema::integer('size_id'),
                            Schema::integer('quantity')
                        )
                    ),

                )
            ));
    }
}
