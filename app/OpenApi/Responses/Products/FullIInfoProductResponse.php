<?php

namespace App\OpenApi\Responses\Products;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class FullIInfoProductResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::ok()->description('Successful response');
    }
}
