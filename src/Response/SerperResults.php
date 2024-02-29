<?php

namespace GregPriday\LaravelSerper\Response;

class SerperResults
{
    use ArrayConstructable;

    /**
     * @var OrganicResult[]
     */
    public readonly array $organic;

    public readonly SearchParameters $searchParameters;

    /**
     * @param  OrganicResult[]  $organic  The organic results from the search
     *
     * @throws \Exception
     */
    public function __construct(array $organic, array $searchParameters)
    {
        $this->organic = self::buildInstancesFromArray($organic, OrganicResult::class);
        $this->searchParameters = SearchParameters::fromArray($searchParameters);
    }

    public function toArray(): array
    {
        return [
            'organic' => array_map(fn ($result) => $result->toArray(), $this->organic),
            'searchParameters' => $this->searchParameters->toArray(),
        ];
    }
}
