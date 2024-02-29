<?php

namespace GregPriday\LaravelSerper\Response;

class SearchParameters
{
    use ArrayConstructable;

    /**
     * @var string The search query.
     */
    public readonly string $q;

    /**
     * @var int|null The number of results returned.
     */
    public readonly ?int $num;

    /**
     * SearchParameters constructor.
     */
    public function __construct(
        string $q, int $num
    ) {
        $this->q = $q;
        $this->num = $num;
    }

    public function toArray(): array
    {
        return [
            'q' => $this->q,
            'num' => $this->num,
        ];
    }
}
