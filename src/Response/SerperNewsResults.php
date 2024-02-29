<?php

namespace GregPriday\LaravelSerper\Response;

class SerperNewsResults
{
    use ArrayConstructable;

    /**
     * @var NewsResult[]
     */
    public readonly array $news;

    public readonly SearchParameters $searchParameters;

    /**
     * @param  NewsResult[]  $news  The organic results from the search
     *
     * @throws \Exception
     */
    public function __construct(array $news, array $searchParameters)
    {
        $this->news = self::buildInstancesFromArray($news, NewsResult::class);
        $this->searchParameters = SearchParameters::fromArray($searchParameters);
    }

    public function toArray(): array
    {
        return [
            // For simplicity, we'll use 'organic' as the key for news results.
            'organic' => array_map(fn ($result) => $result->toArray(), $this->news),
            'searchParameters' => $this->searchParameters->toArray(),
        ];
    }
}
