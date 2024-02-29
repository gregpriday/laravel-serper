<?php

namespace GregPriday\LaravelSerper\Response;

class SiteLink
{
    use ArrayConstructable;

    /**
     * @var string The title of the site link.
     */
    public readonly string $title;

    /**
     * @var string The URL for the site link.
     */
    public readonly string $link;

    public function __construct(string $title, string $link)
    {
        $this->title = $title;
        $this->link = $link;
    }
}
