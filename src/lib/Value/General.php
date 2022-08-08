<?php declare(strict_types=1);

namespace MultiRssCombiner\Value;

use MultiRssCombiner\App;

class General
{
    private string $title;

    private string $description;

    private string $link;

    private string $language;

    private string $copyright;

    private string $icon;

    private int $iconWidth;

    private int $iconHeight;

    private string $dateFormat;

    private int $limit;

    private string $guidPrefix;

    public function __construct(
        string $title,
        string $description,
        string $link,
        string $language,
        string $copyright,
        string $icon,
        int $iconWidth,
        int $iconHeight,
        string $dateFormat,
        int $limit,
        string $guidPrefix
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->language = $language;
        $this->copyright = $copyright;
        $this->icon = $icon;
        $this->iconWidth = $iconWidth;
        $this->iconHeight = $iconHeight;
        $this->dateFormat = $dateFormat;
        $this->limit = $limit;
        $this->guidPrefix = $guidPrefix;
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

    public function getCurrentHostname(): string
    {
        return sprintf(
            '%s://%s',
            isset($_SERVER['HTTPS']) ? 'https' : 'http',
            $_SERVER['SERVER_NAME']
        );
    }
}
