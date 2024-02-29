<?php

namespace GregPriday\LaravelSerper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GregPriday\LaravelSerper\Serper
 */
class Serper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \GregPriday\LaravelSerper\Serper::class;
    }
}
