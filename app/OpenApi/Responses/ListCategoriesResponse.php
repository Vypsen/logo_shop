<?php

namespace App\OpenApi\Responses;

use App\OpenApi\Schemas\CategorySchema;
use App\OpenApi\Schemas\PaginatorLinksSchema;
use App\OpenApi\Schemas\PaginatorMetaSchema;
use App\OpenApi\Schemas\Products\FullInfoProductSchema;
use App\OpenApi\Schemas\Products\PreviewProductSchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class ListCategoriesResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::ok()
            ->description('Successful response')
            ->content(
                MediaType::json()->schema(
                    Schema::object()->properties(
                        Schema::array('data')->items(CategorySchema::ref()),
                    )
                )
            );
    }
}
