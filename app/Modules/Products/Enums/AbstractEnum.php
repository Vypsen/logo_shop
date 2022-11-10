<?php declare(strict_types = 1);

namespace App\Modules\Products\Enums;

use ReflectionClass;

abstract class AbstractEnum
{
    public static function getConstants(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }
}
