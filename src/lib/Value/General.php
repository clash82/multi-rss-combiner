<?php declare(strict_types=1);

namespace MultiRssCombiner\Value;

use MultiRssCombiner\App;

readonly class General
{
    public function __construct(
        private string $title,
        private string $description,
        private string $link,
        private string $language,
        private string $copyright,
        private string $icon,
        private int $iconWidth,
        private int $iconHeight,
        private string $dateFormat,
        private int $limit,
        private string $guidPrefix,
        private string $feedUrl
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getCopyright(): string
    {
        return $this->copyright;
    }

    public function getIcon(): string
    {
        return sprintf(
            '%s%s%s',
            $this->getCurrentHostname(),
            App::APP_PUBLIC_FILES_DIR,
            $this->icon
        );
    }

    public function getIconWidth(): int
    {
        return $this->iconWidth;
    }

    public function getIconHeight(): int
    {
        return $this->iconHeight;
    }

    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getGuidPrefix(): string
    {
        return $this->guidPrefix;
    }

    public function getFeedUrl(): string
    {
        if ($this->feedUrl !== '') {
            return $this->feedUrl;
        }

        return '/?xml';
    }

    public function getCurrentHostname(): string
    {
        return sprintf(
            '%s://%s',
            isset($_SERVER['HTTPS']) ? 'https' : 'http',
            $_SERVER['SERVER_NAME']
        );
    }
}
