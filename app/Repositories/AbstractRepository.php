<?php

namespace App\Repositories;

use Illuminate\Support\Facades\App;

abstract class AbstractRepository
{
    protected static string $model;

    public function __call(string $name, array $arguments)
    {
        return App::make(static::$model)->{$name}(...$arguments);
    }
}
