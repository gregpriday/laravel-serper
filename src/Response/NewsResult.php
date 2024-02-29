<?php

namespace GregPriday\LaravelSerper\Response;

use Exception;

class NewsResult
{
    use ArrayConstructable;

    /**
     * @var string The title of the news article.
     */
    public readonly string $title;

    /**
     * @var string The URL of the news article.
     */
    public readonly string $link;

    /**
     * @var string The short snippet of the news article.
     */
    public readonly string $snippet;

    /**
     * @var string The publication date of the news article.
     */
    public readonly string $date;

    /**
     * @var string The source of the news article.
     */
    public readonly string $source;

    /**
     * @var ?string The image URL associated with the news article.
     */
    public readonly ?string $imageUrl;

    /**
     * @var int The position of the result in the search.
     */
    public readonly int $position;

    /**
     * @throws Exception
     */
    public function __construct(
        string $title, string $link, string $snippet, string $date, string $source, ?string $imageUrl, int $position
    ) {
        $this->title = $title;
        $this->link = $link;
        $this->snippet = $snippet;
        $this->date = $date;
        $this->source = $source;
        $this->imageUrl = $imageUrl;
        $this->position = $position;
    }
}
