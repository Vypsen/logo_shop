<?php

namespace App\OpenApi\Parameters\User;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class PhoneParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [
            Parameter::query()
                ->name('phone')
                ->description('phone user')
                ->required(true)
                ->schema(Schema::string())
                ->example("+78005553535"),
            Parameter::query()
                ->name('policy')
                ->description('Terms of use')
                ->required(true)
                ->schema(Schema::boolean())
        ];
    }
}
