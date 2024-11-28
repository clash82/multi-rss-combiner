<?php declare(strict_types=1);

namespace MultiRssCombiner\Value;

readonly class Channel
{
    public function __construct(
        private string $id,
        private string $name,
        private string $url,
        private bool $trimContent
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function isTrimContent(): bool
    {
        return $this->trimContent;
    }
}
