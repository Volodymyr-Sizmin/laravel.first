<?php

namespace App\Repositories\Contracts;

interface ImageRepositoryContract
{
    public static function attach(Model $model, string $methodName, array $images = []);
}
