<?php

namespace GregPriday\LaravelSerper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GregPriday\LaravelSerper\LaravelSerper
 */
class LaravelSerper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \GregPriday\LaravelSerper\LaravelSerper::class;
    }
}
