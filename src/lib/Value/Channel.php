<?php declare(strict_types=1);

namespace MultiRssCombiner\Value;

class Channel
{
    public function __construct(private readonly string $name, private readonly string $url)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
