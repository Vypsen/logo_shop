<?php

namespace App\OpenApi\Responses\User;

use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class UserTokenResponse extends ResponseFactory implements Reusable
{
    public function build(): Response
    {
        $response = Schema::object()->example(['token' => 'token_string']);

        return Response::create('User Token')
            ->description('User Token')
            ->content(
                MediaType::json()->schema($response)
            );
    }
}
