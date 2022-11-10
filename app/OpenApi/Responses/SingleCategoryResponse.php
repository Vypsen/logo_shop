<?php

namespace App\OpenApi\Responses;

use App\OpenApi\Schemas\CategorySchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class SingleCategoryResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::ok()
            ->description('Successful response')
            ->content(
                MediaType::json()->schema(
                    Schema::object()->properties(
                        CategorySchema::ref('data')
                    )
                )
            );
    }
}
