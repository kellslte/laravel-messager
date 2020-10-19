<?php

namespace Maximof\LaravelMessager\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelMessager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-messager';
    }
}
