<?php

namespace GregPriday\LaravelSerper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GregPriday\LaravelSerper\Serper
 *
 * @method static \GregPriday\LaravelSerper\Response\SerperResults search(string $query, array $params = [])
 * @method static \GregPriday\LaravelSerper\Response\SerperResults[] searchMulti(array $queries, int $results = 10, string $type = 'search', array $params = [])
 */
class Serper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \GregPriday\LaravelSerper\Serper::class;
    }
}
