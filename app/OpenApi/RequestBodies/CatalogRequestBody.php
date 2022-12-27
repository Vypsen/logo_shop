<?php

namespace App\OpenApi\RequestBodies;

use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\RequestBodyFactory;

class CatalogRequestBody extends RequestBodyFactory
{
    public function build(): RequestBody
    {
        return RequestBody::create()
            ->required()
            ->description('catalog')
            ->content(MediaType::json()->schema(
                Schema::object()->properties(
                    Schema::string('category_name'),
                    Schema::string('article_query'),
                    Schema::string('search_query'),
                    Schema::string('sort_mode'),
                    Schema::array('filters')->items(
                        Schema::object()->properties(
                            Schema::integer('filter'),
                        )
                    )
                )
            ));

    }
}
