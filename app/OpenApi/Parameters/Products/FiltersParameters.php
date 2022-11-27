<?php

namespace App\OpenApi\Parameters\Products;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\ParametersFactory;

class FiltersParameters extends ParametersFactory
{
    /**
     * @return Parameter[]
     */
    public function build(): array
    {
        return [
            Parameter::query()
                ->name('category name')
                ->description('category name')
                ->required(false)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('article_query')
                ->required(false)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('search_query')
                ->required(false)
                ->schema(Schema::string()),
            Parameter::query()
                ->name('sort_mode')
                ->required(false)
                ->schema(Schema::integer())
                ->description('0 - price asc, 1 - price desc'),
            Parameter::query()
                ->name('filters')
                ->required(false)
                ->schema(Schema::array()->items(
                    Schema::array()->items(
                        Schema::string()
                    )
                )),
        ];
    }
}
