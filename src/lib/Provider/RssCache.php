<?php declare(strict_types=1);

namespace MultiRssCombiner\Provider;

use MultiRssCombiner\Value\Item;

class RssCache implements CacheProvider
{
    /** @var Item[] */
    private array $cache = [];

    public function __construct(string $fileName, int $limit)
    {
        $cacheFile = sprintf('%s%s', getcwd(), $fileName);

        if (!file_exists($cacheFile)) {
            return;
        }

        $cache = (string)file_get_contents($cacheFile);

        $xml = simplexml_load_string($cache, 'SimpleXMLElement', LIBXML_NOCDATA);

        $json = json_encode($xml, JSON_THROW_ON_ERROR);
        $cacheContent = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        if (!isset($cacheContent['item'])) {
            return;
        }

        for ($i = 0; $i < $limit; ++$i) {
            if (!isset($cacheContent['item'][$i])) {
                break;
            }

            $item = $cacheContent['item'][$i];

            $date = new \DateTime($item['pubDate']);

            $this->cache[] = new Item(
                $item['channelName'],
                $item['title'],
                $item['description'],
                $item['link'],
                $item['guid'],
                \is_array($item['image']) ? null : $item['image'],
                $date
            );
        }
    }

    /**
     * @return Item[]
     */
    public function get(): array
    {
        return $this->cache;
    }
}
