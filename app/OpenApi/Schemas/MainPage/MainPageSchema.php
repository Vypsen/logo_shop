<?php

namespace App\OpenApi\Schemas\MainPage;

use App\OpenApi\Schemas\Products\CategorySchema;
use App\OpenApi\Schemas\Products\PreviewProductSchema;
use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AllOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AnyOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Not;
use GoldSpecDigital\ObjectOrientedOAS\Objects\OneOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;

class MainPageSchema extends SchemaFactory implements Reusable
{
    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    public function build(): SchemaContract
    {
        return Schema::object('MainPage')
            ->properties(
                Schema::object('landing_slide')
                        ->properties(
                            Schema::string('landing_image'),
                            Schema::string('subtitle'),
                ),

                Schema::array('categories')
                    ->items(CategorySchema::ref()),

                Schema::array('new_products')
                    ->items(PreviewProductSchema::ref()),

                Schema::array('sale_products')
                    ->items(PreviewProductSchema::ref(),
                ),
            );
    }
}
