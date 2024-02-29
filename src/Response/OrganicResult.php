<?php

namespace GregPriday\LaravelSerper\Response;

use Exception;

class OrganicResult
{
    use ArrayConstructable;

    /**
     * @var string The title of the result.
     */
    public readonly string $title;

    /**
     * @var string The URL of the result.
     */
    public readonly string $link;

    /**
     * @var SiteLink[]
     */
    public readonly array $sitelinks;

    /**
     * @var string The short snippet of the result.
     */
    public readonly string $snippet;

    /**
     * @var int|null The price information, if given.
     */
    public readonly ?int $price;

    /**
     * @var string|null The currency of the price, if given.
     */
    public readonly ?string $currency;

    /**
     * @var float|null The rating of the result, if given.
     */
    public readonly ?float $rating;

    /**
     * @var int|null The number of reviews, if given.
     */
    public readonly ?int $reviewCount;

    /**
     * @throws Exception
     */
    public function __construct(
        string $title, string $link, string $snippet, array $sitelinks = null,
        int $price = null, string $currency = null, float $rating = null, int $reviewCount = null
    ) {
        $this->title = $title;
        $this->link = $link;
        $this->snippet = $snippet;
        $this->sitelinks = self::buildInstancesFromArray($sitelinks, SiteLink::class);
        $this->price = $price;
        $this->currency = $currency;
        $this->rating = $rating;
        $this->reviewCount = $reviewCount;
    }
}
