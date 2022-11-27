<?php

namespace App\OpenApi\Responses\Products;

use App\OpenApi\Schemas\PaginatorLinksSchema;
use App\OpenApi\Schemas\PaginatorMetaSchema;
use App\OpenApi\Schemas\Products\CategorySchema;
use App\OpenApi\Schemas\Products\FilterSchema;
use App\OpenApi\Schemas\Products\PreviewProductSchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class ListProductsResponse extends ResponseFactory implements Reusable
{
    public function build(): Response
    {
        return Response::ok()
            ->description('Successful response')
            ->content(
                MediaType::json()->schema(
                    Schema::object()->properties(
                        Schema::array('data')->items(PreviewProductSchema::ref()),
                        PaginatorLinksSchema::ref('links'),
                        PaginatorMetaSchema::ref('meta'),
                        Schema::array('filters')->items(
                            FilterSchema::ref()
                        ),
                        Schema::array('category')->items(
                            CategorySchema::ref()
                        ),
                        Schema::integer('countProducts'),
                    )
                )
            );
    }
}
