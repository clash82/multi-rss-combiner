<?php declare(strict_types=1);

namespace MultiRssCombiner\Value;

use DateTime;

class Item
{
    private string $channelName;

    private string $title;

    private string $description;

    private string $link;

    private string $guid;

    private DateTime $pubDate;

    private ?string $image = null;

    public function __construct(
        string $channelName,
        string $title,
        string $description,
        string $link,
        string $guid,
        ?string $image,
        \DateTime $pubDate
    ) {
        $this->channelName = $channelName;
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->guid = $guid;
        $this->image = $image;
        $this->pubDate = $pubDate;
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
        return !empty(trim(strip_tags($this->description)));
    }

    public function getPubDate(): \DateTime
    {
        return $this->pubDate;
    }
}
