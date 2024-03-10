<?php

namespace GregPriday\LaravelSerper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GregPriday\LaravelSerper\Serper
 *
 * @method static \GregPriday\LaravelSerper\Response\SerperResults|\GregPriday\LaravelSerper\Response\SerperNewsResults search(string $query, int $count = 10, string $type = 'search')
 * @method static \GregPriday\LaravelSerper\Response\SerperResults[] searchMulti(array $queries, int $count = 10, string $type = 'search')
 */
class Serper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \GregPriday\LaravelSerper\Serper::class;
    }
}
