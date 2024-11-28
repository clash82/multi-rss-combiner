<?php declare(strict_types=1);

namespace MultiRssCombiner\Value;

use DateTime;

readonly class Item
{
    public function __construct(
        private Channel $channel,
        private string $title,
        private string $description,
        private string $link,
        private string $guid,
        private ?string $image,
        private DateTime $pubDate
    ) {
    }

    public function getChannelId(): string
    {
        return $this->channel->getId();
    }

    public function getChannelName(): string
    {
        return $this->channel->getName();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        $description = $this->description;

        if ($this->channel->isTrimContent()) {
            # remove whitespaces inside HTML tags
            $description = preg_replace('/\s+/', ' ', $description);

            # replace <br /> and redundant <br /> tags
            $description = preg_replace('#<br />(\s*<br />)+#', '<br>', $description);

            # replace redundant <br> tags
            $description = preg_replace('#<br>(\s*<br>)+#', '<br>', $description);

            # remove all HTML tags
            $description = strip_tags($description);
        }

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
