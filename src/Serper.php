<?php

namespace GregPriday\LaravelSerper;

use GregPriday\LaravelSerper\Response\SerperNewsResults;
use GregPriday\LaravelSerper\Response\SerperResults;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;

class Serper
{
    const string SEARCH_TYPE = 'search';

    const string NEWS_TYPE = 'news';

    private const string SERPER_ENDPOINT = 'https://google.serper.dev';

    private string $key;

    private Client $client;

    private string $endpoint;

    public function __construct(?string $key = null, ?string $endpoint = null)
    {
        $this->key = $key ?? '';
        $this->endpoint = $endpoint ?? self::SERPER_ENDPOINT;

        $this->client = new Client([
            'base_uri' => $this->endpoint,
            'headers' => [
                'X-API-KEY' => $this->key,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * @param  string  $query  The query to perform
     * @param  int  $count  The number of results to return
     *                      $param  string $type The type of search to perform. Either 'search' or 'news'.
     *
     * @throws GuzzleException
     */
    public function search(string $query, int $count = 10, string $type = self::SEARCH_TYPE): SerperResults|SerperNewsResults
    {
        $body = json_encode([
            'q' => $query,
            'num' => min($count, 100),  // Ensure it does not exceed 100
        ]);

        $response = $this->client->post('/'.$type, ['body' => $body]);

        $result = json_decode($response->getBody(), true);

        $class = match ($type) {
            'search' => SerperResults::class,
            'news' => SerperNewsResults::class,
            default => throw new InvalidArgumentException("Unsupported type: $type"),
        };

        return $class::fromArray($result);
    }

    /**
     * @param  array  $queries  The queries to perform. Up to 20 at once.
     * @param  int  $count  The number of results to return per query
     * @return SerperResults[]
     *
     * @throws GuzzleException
     */
    public function searchMulti(array $queries, int $count = 10, string $type = self::SEARCH_TYPE): array
    {
        // Pre-process the queries and ensure the count does not exceed the limit
        $processedQueries = array_map(function ($query) use ($count) {
            return [
                'q' => $query,
                'num' => min($count, 100),
            ];
        }, $queries);

        // Encode the array of queries as JSON
        $body = json_encode($processedQueries);

        // Make the request and retrieve the response
        $response = $this->client->post('/'.$type, ['body' => $body]);

        $results = json_decode($response->getBody(), true);

        // Convert the results to SerperResults objects
        $class = match ($type) {
            'search' => SerperResults::class,
            'news' => SerperNewsResults::class,
            default => throw new InvalidArgumentException("Unsupported type: $type"),
        };

        return array_map(fn ($result) => $class::fromArray($result), $results);
    }
}
