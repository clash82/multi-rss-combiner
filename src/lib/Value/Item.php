<?php

declare(strict_types=1);

namespace MultiRssCombiner\Value;

class Item
{
    /** @var string */
    private $channelName;

    /** @var string */
    private $title;

    /** @var string */
    private $description;

    /** @var string */
    private $link;

    /** @var string */
    private $guid;

    /** @var \DateTime */
    private $pubDate;

    /** @var string */
    private $image;

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
        $description = preg_replace('#<br>(\s*<br>)+#', '<br>', $description);

        return $description;
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
        return $this->image ? true : false;
    }

    public function hasDescription(): bool
    {
        return empty(trim(strip_tags($this->description))) ? false : true;
    }

    public function getPubDate(): \DateTime
    {
        return $this->pubDate;
    }
}
