<?php declare(strict_types=1);

namespace MultiRssCombiner\Manager;

use MultiRssCombiner\Value\Item;

class RssCache implements CacheManager
{
    private readonly string $fileName;

    /** @var Item[] */
    private array $cache = [];

    public function __construct(string $fileName)
    {
        $this->fileName = sprintf('%s%s', getcwd(), $fileName);
    }

    public function add(Item $item): void
    {
        $this->cache[] = $item;
    }

    public function save(): void
    {
        $xml = new \SimpleXMLElement('<cache/>');

        foreach ($this->cache as $item) {
            $element = $xml->addChild('item');
            $element->addAttribute('channel', $item->getChannelId());
            $element->addChild('title', $item->getTitle());
            $element->addChild('description', $item->getDescription());
            $element->addChild('link', $item->getLink());
            $element->addChild('guid', $item->getGuid());
            $element->addChild('image', $item->getImage());
            $element->addChild('pubDate', $item->getPubDate()->format('r'));
        }

        file_put_contents($this->fileName, $xml->asXML());
    }
}
