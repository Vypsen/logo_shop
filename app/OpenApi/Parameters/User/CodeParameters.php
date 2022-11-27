<?php

namespace App\OpenApi\Parameters\User;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class CodeParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [
            Parameter::query()
                ->name('user_code')
                ->description('user code for auth')
                ->required(true)
                ->schema(Schema::string())
                ->example("123456"),
        ];
    }
}
