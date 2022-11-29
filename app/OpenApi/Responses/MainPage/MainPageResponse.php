<?php

namespace App\OpenApi\Responses\MainPage;

use App\OpenApi\Schemas\MainPage\MainPageSchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class MainPageResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::ok()
            ->description('Successful response')
            ->content(
                MediaType::json()->schema(Schema::object()->properties(
                    MainPageSchema::ref('data')
                ))
            );
    }
}