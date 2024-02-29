<?php

namespace GregPriday\LaravelSerper\Tests;

use GregPriday\LaravelSerper\Facades\Serper;
use GuzzleHttp\Exception\GuzzleException;

class SerperTest extends TestCase
{
    /**
     * Test 'search' method in Serper class
     *
     * Method should handle the search and return the correct type of results, based on the search type ('search' or 'news').
     *
     * @throws GuzzleException
     */
    public function test_search(): void
    {
        $results = Serper::search('what is laravel');

        $this->assertIsArray($results->organic);
        $this->assertEquals('what is laravel', $results->searchParameters->q);
        $this->assertEquals(10, $results->searchParameters->num);
    }

    public function test_search_multi()
    {
        $results = Serper::searchMulti(['what is laravel', 'what is php']);

        $this->assertIsArray($results);
        $this->assertIsArray($results[0]->organic);
        $this->assertIsArray($results[1]->organic);
    }
}
