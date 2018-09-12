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

    public function __construct(
        string $channelName,
        string $title,
        string $description,
        string $link,
        string $guid,
        \DateTime $pubDate
    ) {
        $this->channelName = $channelName;
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->guid = $guid;
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

    public function getPubDate(): \DateTime
    {
        return $this->pubDate;
    }
}
