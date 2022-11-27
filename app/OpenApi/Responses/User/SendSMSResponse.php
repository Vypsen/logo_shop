<?php

namespace App\OpenApi\Responses\User;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;

class SendSMSResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::ok()->description('sms code sent successfully');
    }
}
