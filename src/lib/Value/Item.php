<?php declare(strict_types=1);

namespace MultiRssCombiner\Value;

use DateTime;

class Item
{
    public function __construct(private readonly string $channelName, private readonly string $title, private readonly string $description, private readonly string $link, private readonly string $guid, private readonly ?string $image, private readonly DateTime $pubDate)
    {
    }

    public function getChannelName(): string
    {
        return $this->channelName;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        $description = preg_replace('#<br />(\s*<br />)+#', '<br>', $this->description);

        return preg_replace('#<br>(\s*<br>)+#', '<br>', $description);
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function hasImage(): bool
    {
        return (bool)$this->image;
    }

    public function hasDescription(): bool
    {
        return trim(strip_tags($this->description)) !== '';
    }

    public function getPubDate(): \DateTime
    {
        return $this->pubDate;
    }
}
